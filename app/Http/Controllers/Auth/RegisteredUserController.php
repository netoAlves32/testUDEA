<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{

    public function index()
    {
        $users = User::get();

        return view('users.index', ['users'=> $users]);
    }


    public function show(User $user)
    {
        return view('users.show',['user' => $user]);
    }


    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);

    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4','max:255'],
            'last_name' => ['required', 'string', 'min:4','max:255'],
            'address' => ['required', 'string', 'min:4','max:255'],
            'email' => ['required', 'string', 'email','min:10','max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::default()],
            'role' => ['required', 'string', 'max:255'],
        ]);

        $user->update([ 'name' => $request->name,
        'last_name'=>$request->last_name,
        'address'=>$request->address,
        'email' => $request->email,
        'password' => bcrypt($request->password), //Has::make($request->password) is the same
        'role' => $request->role,
         ]);


        return to_route('users.show', $user)->with('status', 'User Updated!');

    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index')->with('status', 'User Deleted!');
    }

}
