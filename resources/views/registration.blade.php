@extends('layouts.main')

@section('container')


<section class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply bg-cover"
    style="background-image: url('{{ $registration->getFirstMediaUrl('registration') ?: asset('/img/blankphoto.jpeg') }}');">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">{{
            $registration->title }}</h1>
        <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">{{
            $registration->description }}</p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="https://{{ parse_url($registration->registration_link, PHP_URL_HOST) ?: $registration->registration_link }}"
                target="_blank"
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-lime-600 hover:bg-lime-700 focus:ring-4 focus:ring-lime-300 dark:focus:ring-lime-900">
                Registrasi disini
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection