@extends('layouts.app')

@section('title', 'Home')
@section('meta-description', 'Home meta-description')


@section('content')

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">testUDEA</h1>

@auth
<div class="flex flex-col max-w-xl px-4 py-2 mx-auto space-y-4 bg-white rounded shadow dark:bg-slate-800">
    <p class="text-l text-slate-600 dark:text-slate-200 ">
        Welcome {{ $user->name }} !
    </p>
</div>
@endauth



@endsection

