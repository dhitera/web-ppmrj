@extends('layouts.main')

@section('container')
@inject('settingsService', 'App\Services\SettingsService')

@if($settingsService->getBool('show_registration_notification', true))
<div id="sticky-banner" tabindex="-1"
    class="fixed top-24 start-0 z-50 flex justify-between w-full p-3 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 opacity-80">
    <div class="flex items-center mx-auto">
        <p class="flex items-center text-base font-normal text-gray-900">
            <span class="inline-flex p-1 me-3 bg-[#333] rounded-full w-7 h-7 items-center justify-center flex-shrink-0">
                <svg class="w-4 h-4 text-lime-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 18 19">
                    <path
                        d="M15 1.943v12.114a1 1 0 0 1-1.581.814L8 11V5l5.419-3.871A1 1 0 0 1 15 1.943ZM7 4H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2v5a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2V4ZM4 17v-5h1v5H4ZM16 5.183v5.634a2.984 2.984 0 0 0 0-5.634Z" />
                </svg>
                <span class="sr-only">Light bulb</span>
            </span>
            <span>Pendaftaran Mahasiswa Baru telah dibuka! Silahkan daftar <a href="{{ route('registration') }}"
                    class="inline font-medium text-blue-600 underline dark:text-blue-500 underline-offset-2 decoration-600 dark:decoration-500 decoration-solid hover:no-underline">disini!</a></span>
        </p>
    </div>
    <div class="flex items-center">
        <button data-dismiss-target="#sticky-banner" type="button"
            class="flex-shrink-0 inline-flex justify-center w-7 h-7 items-center text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close banner</span>
        </button>
    </div>
</div>
@endif

{{-- Hero Section --}}
<div class="bg-auto bg-center bg-no-repeat bg-gray-500 bg-blend-multiply md:h-[150vh] md:bg-cover"
    style="background-image: url('img/foto-ppm.jpg')">
    <div class="px-4 mx-5 md:mx-20 md:text-left py-40 w-1/2">
        <h1 class="mb-4 text-3xl font-extrabold text-white md:text-4xl lg:text-5xl">
            PPMRJ</h1>
        <h1 class="mb-4 text-xl font-bold text-white lg:text-2xl">
            Bandung Selatan</h1>
        <p class="mb-4 text-base font-normal text-left text-gray-300 md:text-xl">Pondok Pesantren Mahasiswa
            Roudhotul Jannah (PPMRJ) Bandung Selatan menyediakan lingkungan yang kondusif
            untuk belajar dan berkembang, menggabungkan
            pendidikan agama dengan studi akademis.</p>
        <a href="#"
            class="inline-flex py-3 px-10 text-base font-medium text-center text-white rounded-lg bg-lime-700 hover:bg-lime-800 ">
            Registrasi
        </a>
    </div>
</div>

{{-- About Section --}}
<div>
    <p class="text-center text-4xl font-semibold py-5 mt-16 uppercase">Tentang Kami</p>
    <p class="mx-10 md:mx-24 text-center font-semibold text-gray-600 text-lg md:text-2xl">Pondok Pesantren Mahasiswa
        Roudhotul
        Jannah atau
        <mark class="px-2 text-white bg-gradient-to-r from-green-600 to-lime-500 rounded">PPMRJ</mark> adalah tempat
        untuk mahasiswa mempelajari ilmu
        agama dan akademis dengan lingkungan yang kondusif.
    </p>
    <div class="flex flex-wrap justify-center my-12 gap-5 md:gap-20">
        <div
            class="size-64 bg-cover bg-center flex flex-wrap justify-center rounded-lg bg-gradient-to-r from-green-600 to-lime-500 group transition-all duration-300 ease-in-out opacity-90 hover:scale-105 hover:opacity-100 hover:shadow-xl">
            <img src="img/icons/book.svg" alt="Book Icon"
                class="w-14 h-auto text-white scale-125 translate-y-3/4 transition-all duration-300 ease-in-out group-hover:scale-105 group-hover:translate-y-0">
            <p
                class="text-white font-semibold transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100 text-center mx-3">
                Kurikulum yang sudah diatur sehingga dapat mempelajari ilmu agama sembari melaksanakan
                perkuliahan di kampus</p>
        </div>
        <div
            class="size-64 bg-cover bg-center flex flex-wrap justify-center rounded-lg bg-gradient-to-r from-green-600 to-lime-500 group transition-all duration-300 ease-in-out opacity-90 hover:scale-105 hover:opacity-100 hover:shadow-xl">
            <img src="img/icons/community.svg" alt="Community Icon"
                class="w-14 h-auto text-white scale-150 translate-y-3/4 transition-all duration-300 ease-in-out group-hover:scale-110 group-hover:translate-y-0">
            <p
                class="text-white font-semibold transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100 text-center mx-3">
                Terdapat organisasi dan komunitas yang dapat membuat mahasiswa meningkatkan skill-nya baik soft skill
                maupun hard skill</p>
        </div>
        <div
            class="size-64 bg-cover bg-center flex flex-wrap justify-center rounded-lg bg-gradient-to-r from-green-600 to-lime-500 group transition-all duration-300 ease-in-out opacity-90 hover:scale-105 hover:opacity-100 hover:shadow-xl">
            <img src="img/icons/fire.svg" alt="Fire Icon"
                class="w-14 h-auto text-white scale-150 translate-y-3/4 transition-all duration-300 ease-in-out group-hover:scale-110 group-hover:translate-y-0">
            <p
                class="text-white font-semibold transition-all duration-300 ease-in-out opacity-0 group-hover:opacity-100 text-center mx-3">
                Tidak hanya mengaji, beragam kegiatan dan juga acara sering dilaksanakan oleh PPM, baik dilakukan
                didalam maupun diluar PPM</p>
        </div>

    </div>
</div>

{{-- Data Section --}}
<div class="bg-green-700 my-5 p-6 md:p-10">
    <div class="flex flex-row justify-around text-center text-white font-semibold">
        <div class="flex flex-col gap-1 md:gap-2">
            <p class="text-lg md:text-2xl rounded-full underline underline-offset-4">4</p>
            <p class="text-sm md:text-xl">Dewan Guru</p>
        </div>
        <div class="flex flex-col gap-1 md:gap-2">
            <p class="text-lg md:text-2xl rounded-full underline underline-offset-4">20</p>
            <p class="text-sm md:text-xl">Mahasiswa</p>
        </div>
        <div class="flex flex-col gap-1 md:gap-2">
            <p class="text-lg md:text-2xl rounded-full underline underline-offset-4">150</p>
            <p class="text-sm md:text-xl">Alumni</p>
        </div>
    </div>
</div>



{{-- Activity Section --}}

<p class="text-center text-4xl font-semibold uppercase py-3">
    Aktivitas Terbaru</p>
<div class="p-4 flex flex-row justify-around overflow-x-auto gap-2 snap-mandatory snap-x">

    @foreach ($activity as $data)
    <div class="w-full md:w-1/2 xl:w-80 bg-white border border-gray-200 rounded-lg shadow flex-none snap-center">
        <img class="rounded-t-lg w-full h-48 object-cover"
            src="{{ $data->getFirstMediaUrl('images') ?: asset('/img/blankphoto.jpeg') }}" alt="{{ $data->title }}" />
        <div class="p-5">
            <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900">{{ $data->title }}</h5>
            <p class="mb-3 text-xs font-normal text-gray-700 trix-content">{!!
                Str::limit(strip_tags($data->description), 250, '...')
                !!}</p>
        </div>
    </div>
    @endforeach
</div>
<div class="flex justify-center">
    <a href="{{ route('activities.index') }}"
        class="text-white bg-gradient-to-r from-green-600 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-full text-lg px-5 py-2.5 text-center my-3">Info
        Kegiatan Lainnya
    </a>
</div>


@endsection