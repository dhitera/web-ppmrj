@extends('layouts.main')

@section('container')

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
<div id="about"></div>
<div>
    <p class="text-center text-4xl font-semibold py-5 mt-16 uppercase">About Us</p>
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



{{-- Activity Section --}}

<p class="text-center text-4xl font-semibold uppercase py-3">
    Aktivitas Terbaru</p>
<div class="p-4 flex flex-row justify-around overflow-x-auto gap-2 snap-mandatory snap-x">


    <div class="w-full md:w-1/2 xl:w-80 bg-white border border-gray-200 rounded-lg shadow flex-none snap-center">
        <a href="#">
            <img class="rounded-t-lg" src="img/bakar1.jpg" alt="" />
        </a>
        <div class="p-5">
            <h5 class="mb-2 text-xl md:text-2xl font-bold tracking-tight text-gray-900 ">Makan Bersama</h5>
            <p class="mb-3 text-xs font-normal text-gray-700">bakar-bakar setelah qurban
                merupakan tradisi yang selalu dinantikan oleh masyarakat, terutama pada hari raya Idul Adha. Setelah
                proses penyembelihan hewan qurban dan pembagian daging selesai, keluarga dan tetangga berkumpul di
                halaman rumah atau di tempat terbuka untuk membakar daging qurban bersama-sama.</p>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-80 bg-white border border-gray-200 rounded-lg shadow flex-none snap-center">
        <a href="#">
            <img class="rounded-t-lg" src="img/bakar1.jpg" alt="" />
        </a>
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Makan Bersama</h5>
            <p class="mb-3 text-xs font-normal text-gray-700 ">bakar-bakar setelah qurban
                merupakan tradisi yang selalu dinantikan oleh masyarakat, terutama pada hari raya Idul Adha. Setelah
                proses penyembelihan hewan qurban dan pembagian daging selesai, keluarga dan tetangga berkumpul di
                halaman rumah atau di tempat terbuka untuk membakar daging qurban bersama-sama.</p>

        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-80 bg-white border border-gray-200 rounded-lg shadow flex-none snap-center">
        <a href="#">
            <img class="rounded-t-lg" src="img/bakar1.jpg" alt="" />
        </a>
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Makan Bersama</h5>
            <p class="mb-3 text-xs font-normal text-gray-700 ">bakar-bakar setelah qurban
                merupakan tradisi yang selalu dinantikan oleh masyarakat, terutama pada hari raya Idul Adha. Setelah
                proses penyembelihan hewan qurban dan pembagian daging selesai, keluarga dan tetangga berkumpul di
                halaman rumah atau di tempat terbuka untuk membakar daging qurban bersama-sama.</p>

        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-80 bg-white border border-gray-200 rounded-lg shadow flex-none snap-center">
        <a href="#">
            <img class="rounded-t-lg" src="img/bakar1.jpg" alt="" />
        </a>
        <div class="p-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Makan Bersama</h5>
            <p class="mb-3 text-xs font-normal text-gray-700 ">bakar-bakar setelah qurban
                merupakan tradisi yang selalu dinantikan oleh masyarakat, terutama pada hari raya Idul Adha. Setelah
                proses penyembelihan hewan qurban dan pembagian daging selesai, keluarga dan tetangga berkumpul di
                halaman rumah atau di tempat terbuka untuk membakar daging qurban bersama-sama.</p>

        </div>
    </div>
</div>
<div class="flex justify-center">
    <button type="button"
        class="text-white bg-gradient-to-r from-green-600 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-full text-base px-5 py-2.5 text-center my-3">Info
        Kegiatan Lainnya
    </button>
</div>


@endsection