@extends('layouts.main')

@section('container')

<div class="py-10 bg-gray-100">
    <p class="text-2xl font-bold px-5 text-center">Struktur Kepengurusan PPM Roudhotul Jannah</p>

    <div class="flex items-center gap-5 w-full justify-between px-5 py-5">
        <hr class="w-2/3 border-gray-500 border-2 " />
        <p class=" w-1/3 text-center font-bold text-lg md:text-2xl uppercase">Pengurus PPM</p>
        <hr class="w-2/3 border-gray-500 border-2 " />
    </div>

    <div class="flex-none md:flex">
        <x-profile-card image="img/pakyayat.jpeg" name="Yayat Hernawan" jabatan="Pembina PPM"></x-profile-card>
        <x-profile-card image="img/pakyayat.jpeg" name="Muhammad Yusuf" jabatan="Ketua PPM"></x-profile-card>
    </div>

    <div class="flex items-center gap-5 w-full justify-between px-5 py-5">
        <hr class="w-2/3 border-gray-500 border-2 " />
        <p class=" w-1/3 text-center font-bold text-lg md:text-2xl uppercase">Koordinator Mahasiswa</p>
        <hr class="w-2/3 border-gray-500 border-2 " />
    </div>

    <x-profile-card image="img/alva.jpeg" name="Maulana Siddiq" jabatan="Ketua Mahasiswa"></x-profile-card>

    <div class="flex-none md:flex">
        <x-profile-card image="img/ari.jpeg" name="Muhammad Rifqi Ashari" jabatan="Wakil 1"></x-profile-card>
        <x-profile-card image="img/alva.jpeg" name="Rifky Awwala Adriano" jabatan="Wakil 2"></x-profile-card>
        <x-profile-card image="img/ikhwan.jpeg" name="Muhammad Ikhwan Maulana" jabatan="Wakil 3"></x-profile-card>
        <x-profile-card image="img/ari.jpeg" name="Hifdzi Khomisa Palestina Kusuma" jabatan="Wakil 4"></x-profile-card>
    </div>
</div>

@endsection