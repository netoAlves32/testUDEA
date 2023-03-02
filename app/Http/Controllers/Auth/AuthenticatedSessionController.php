<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthenticatedSessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

        $user = Auth::user();
        $json = response()->json([
            'status' => 'You are logged in',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
            ]);
        session()->flash('status', 'You are logged in !');

        return view('welcome',compact('user'));

    }

    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'min:4','max:255'],
            'last_name' => ['required', 'string', 'min:4','max:255'],
            'address' => ['required', 'string', 'min:4','max:255'],
            'email' => ['required', 'string', 'email','min:10','max:255', 'unique:users'],
            'password' => ['required', 'confirmed','min:6', Rules\Password::default()],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name'=>$request->last_name,
            'address'=>$request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password), //Has::make($request->password) is the same
            'role' => $request->role,
        ]);

        $token = Auth::login($user);
        response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
        return to_route('login')->with('status','User created!');
    }

    public function logout()
    {
        Auth::logout();
        response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
        return to_route('home')->with('status', 'You are logged out!');

    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

       /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return auth()->user();
    }

}
