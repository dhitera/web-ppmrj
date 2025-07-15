@extends('admin.layouts.adminMain')

@section('container')
<div class="flex flex-row justify-between items-center">
    <p class="text-2xl font-semibold py-5">Data Page Registrasi</p>
    <a href="{{ route('registration.edit') }}"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
        Edit Registrasi
    </a>
</div>

<div class="w-full mb-5">
    <img src="{{ $registration->getFirstMediaUrl('registration') ?: asset('/img/blankphoto.jpeg') }}"
        class="w-full h-64 max-w-full object-cover rounded-lg shadow-lg" alt="{{ $registration->title }}">
</div>

<div class="flex flex-col space-y-4">
    <p class="text-2xl font-sans font-semibold"><span
            class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Title</span>
        : {{ $registration->title }}</p>

    <p class="text-2xl font-sans font-semibold"><span
            class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Deskripsi</span>
        : {{ $registration->description }}</p>

    <a href="https://{{ parse_url($registration->registration_link, PHP_URL_HOST) ?: $registration->registration_link }}"
        target="_blank" class="text-2xl font-sans font-semibold"><span
            class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Link
            PMB</span>
        : {{ parse_url($registration->registration_link, PHP_URL_HOST) ?: $registration->registration_link }}</a>
</div>

@endsection