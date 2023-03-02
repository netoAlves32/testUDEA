@extends('layouts.app')


@section('title', $product->name)
@section('meta-description',$product->body)

@section('content')

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">{{ $product->name }}</h1>
<div class="flex flex-col max-w-xl px-4 py-2 mx-auto space-y-4 bg-white rounded shadow dark:bg-slate-800">
    <div>
        <span class="text-xl text-slate-600 dark:text-sky-700 ">
            Description:
        </span>
        <a class="text-l text-slate-600 dark:text-slate-300 ">
            {{ $product->description }}
        </a>
    </div>
    <hr>
    <div>
        <span class="text-xl text-slate-600 dark:text-sky-700 ">
            Price:
        </span>
        <a class="text-l text-slate-600 dark:text-slate-300 ">
            {{ $product->price }} USD
        </a>
    </div>

        <br>

        <a class="mr-auto text-sm font-semibold underline border-2 border-transparent rounded dark:text-slate-300 text-slate-600
         focus:border-slate-500 focus:outline-none" href="{{ route('products.index') }}">Back</a>
</div>

@endsection
