@extends('layouts.main')

@section('container')

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

    {{-- <div class="w-80 h-96 bg-gray-200 border border-gray-200 rounded-lg shadow">
        <a href="#">
            <img class="rounded-t-lg" src="img/bakar1.jpg" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-md md:text-md md:text-xl font-bold tracking-tight text-gray-900 ">
                    Makan Bersama</h5>
            </a>
            <p class="mb-3 text-xs font-normal text-gray-700  text-wrap">Acara
                bakar-bakar setelah qurban
                merupakan tradisi yang selalu dinantikan oleh masyarakat, terutama pada hari raya Idul Adha. Setelah
                proses penyembelihan hewan qurban dan pembagian daging selesai, keluarga dan tetangga berkumpul di
                halaman rumah atau di tempat terbuka untuk membakar daging qurban bersama-sama.</p>
        </div>
    </div>
    <div class="w-80 h-96 bg-gray-200 border border-gray-200 rounded-lg shadow">
        <a href="#">
            <img class="rounded-t-lg" src="img/bakar1.jpg" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-md md:text-xl font-bold tracking-tight text-gray-900 ">Makan Bersama
                </h5>
            </a>
            <p class="mb-3 text-xs font-normal text-gray-700  text-wrap">Acara
                bakar-bakar setelah qurban
                merupakan tradisi yang selalu dinantikan oleh masyarakat, terutama pada hari raya Idul Adha. Setelah
                proses penyembelihan hewan qurban dan pembagian daging selesai, keluarga dan tetangga berkumpul di
                halaman rumah atau di tempat terbuka untuk membakar daging qurban bersama-sama.</p>
        </div>
    </div>
    <div class="w-80 h-96 bg-gray-200 border border-gray-200 rounded-lg shadow">
        <a href="#">
            <img class="rounded-t-lg" src="img/bakar1.jpg" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-md md:text-xl font-bold tracking-tight text-gray-900 ">Makan Bersama
                </h5>
            </a>
            <p class="mb-3 text-xs font-normal text-gray-700  text-wrap">Acara
                bakar-bakar setelah qurban
                merupakan tradisi yang selalu dinantikan oleh masyarakat, terutama pada hari raya Idul Adha. Setelah
                proses penyembelihan hewan qurban dan pembagian daging selesai, keluarga dan tetangga berkumpul di
                halaman rumah atau di tempat terbuka untuk membakar daging qurban bersama-sama.</p>
        </div>
    </div>
    <div class="w-80 h-96 bg-gray-200 border border-gray-200 rounded-lg shadow">
        <a href="#">
            <img class="rounded-t-lg" src="img/bakar1.jpg" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-md md:text-xl font-bold tracking-tight text-gray-900 ">Makan Bersama
                </h5>
            </a>
            <p class="mb-3 text-xs font-normal text-gray-700  text-wrap">Acara
                bakar-bakar setelah qurban
                merupakan tradisi yang selalu dinantikan oleh masyarakat, terutama pada hari raya Idul Adha. Setelah
                proses penyembelihan hewan qurban dan pembagian daging selesai, keluarga dan tetangga berkumpul di
                halaman rumah atau di tempat terbuka untuk membakar daging qurban bersama-sama.</p>
        </div> --}}
    </div>



</div>

{{-- <div class="container-portal-berita">
    <div class="container-card">
        <div class="card">
            <div class="image-card">
                <img src="img/bakar1.jpg" alt="">
            </div>
            <div class="title-card">
                <h3>Makan Bersama</h3>
            </div>
            <div class="deskription-card">
                <p>Acara makan-makan setelah qurban merupakan momen yang selalu dinantikan oleh masyarakat,
                    khususnya di
                    hari raya Idul Adha. Setelah proses penyembelihan hewan qurban selesai, daging yang telah
                    dibagikan
                    ke seluruh warga, keluarga dan tetangga berkumpul untuk menikmati hidangan lezat bersama-sama.
                </p>
            </div>
        </div>
        <div class="card">
            <div class="image-card">
                <img src="img/bakar2.jpg" alt="">
            </div>
            <div class="title-card">
                <h3>Bakar Bakar</h3>
            </div>
            <div class="deskription-card">
                <p>Acara bakar-bakar setelah qurban merupakan tradisi yang selalu dinantikan oleh masyarakat,
                    terutama
                    pada hari raya Idul Adha. Setelah proses penyembelihan hewan qurban dan pembagian daging
                    selesai,
                    keluarga dan tetangga berkumpul di halaman rumah atau di tempat terbuka untuk membakar daging
                    qurban
                    bersama-sama.</p>
            </div>
        </div>
        <div class="card">
            <div class="image-card">
                <img src="img/bakar3.jpg" alt="">
            </div>
            <div class="title-card">
                <h3>Acara Bakar Bakar</h3>
            </div>
            <div class="deskription-card">
                <p>Acara bakar-bakar setelah qurban merupakan tradisi yang selalu dinantikan oleh masyarakat,
                    terutama
                    pada hari raya Idul Adha. Setelah proses penyembelihan hewan qurban dan pembagian daging
                    selesai,
                    keluarga dan tetangga berkumpul di halaman rumah atau di tempat terbuka untuk membakar daging
                    qurban
                    bersama-sama.</p>
            </div>
        </div>
        <div class="card">
            <div class="image-card">
                <img src="img/bakar4.jpg" alt="">
            </div>
            <div class="title-card">
                <h3>Photoboot</h3>
            </div>
            <div class="deskription-card">
                <p>Acara bakar-bakar setelah qurban merupakan tradisi yang selalu dinantikan oleh masyarakat,
                    terutama
                    pada hari raya Idul Adha. Setelah proses penyembelihan hewan qurban dan pembagian daging
                    selesai,
                    keluarga dan tetangga berkumpul di halaman rumah atau di tempat terbuka untuk membakar daging
                    qurban
                    bersama-sama.</p>
            </div>
        </div>
    </div>
    <div class="activity-button">
        <a href="/activity"><button>Info Kegiatan Lainnya</button></a>
    </div>
</div> --}}
@endsection