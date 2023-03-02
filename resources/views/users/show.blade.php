@extends('layouts.app')


@section('title', $user->name)
@section('meta-description',$user->role)

@section('content')

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">{{ $user->name }}</h1>
<div class="flex flex-col max-w-xl px-4 py-2 mx-auto space-y-4 bg-white rounded shadow dark:bg-slate-800">
    <div>
        <span class="text-xl text-slate-600 dark:text-sky-700 ">
            ID:
        </span>
        <a class="text-l text-slate-600 dark:text-slate-300 ">
            {{ $user->id }}
        </a>
    </div>
    <hr>
    <div>
        <span class="text-xl text-slate-600 dark:text-sky-700 ">
            Name:
        </span>
        <a class="text-l text-slate-600 dark:text-slate-300 ">
            {{ $user->name }}
        </a>
    </div>
    <hr>
    <div>
        <span class="text-xl text-slate-600 dark:text-sky-700 ">
            Last name:
        </span>
        <a class="text-l text-slate-600 dark:text-slate-300 ">
            {{ $user->last_name }}
        </a>
    </div>
    <hr>
    <div>
        <span class="text-xl text-slate-600 dark:text-sky-700 ">
            Address:
        </span>
        <a class="text-l text-slate-600 dark:text-slate-300 ">
            {{ $user->address }}
        </a>
    </div>
    <hr>
    <div>
        <span class="text-xl text-slate-600 dark:text-sky-700 ">
            Email:
        </span>
        <a class="text-l text-slate-600 dark:text-slate-300 ">
            {{ $user->email }}
        </a>
    </div>
    <hr>
    <div>
        <span class="text-xl text-slate-600 dark:text-sky-700 ">
            Role:
        </span>
        <a class="text-l text-slate-600 dark:text-slate-300 ">
            {{ $user->role }}
        </a>
    </div>

        <br>

        <a class="mr-auto text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600
         focus:border-slate-500 focus:outline-none" href="{{ route('users.index') }}">Back</a>
</div>

@endsection
