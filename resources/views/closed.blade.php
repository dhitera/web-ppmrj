@extends('layouts.main')

@section('container')
<div class="text-center bg-gradient-to-r from-lime-400 to-green-800">
    <div class="py-10 text-center text-white">
        <p class="text-4xl font-bold">{{ $title }}</p>
        <p class="text-xl my-3">{{ $message }}</p>
    </div>
</div>

@endsection