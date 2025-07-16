@extends('layouts.main')

@section('container')
<div class=" py-16 text-center text-white bg-gradient-to-r from-lime-400 to-green-800">
    <p class="text-4xl font-bold">About Us</p>
</div>

{{-- Hero Section --}}
<div class="flex flex-col md:flex-row p-6 md:p-10 gap-6 items-center max-h-none md:max-h-96">
    <div class="flex flex-col w-full md:w-3/5 h-full justify-center order-2 md:order-1">
        <p class="text-center text-xl md:text-3xl font-bold mb-4">Tentang PPMRJ</p>
        <p class="text-justify leading-relaxed text-sm md:text-base px-10">Lorem ipsum, dolor sit amet consectetur
            adipisicing
            elit. Deserunt
            tenetur corporis quos veritatis dicta
            perspiciatis culpa quisquam possimus dolores, natus, ea magni soluta porro ullam nihil rem est velit
            laboriosam. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi necessitatibus neque vel, ipsam
            praesentium ab totam similique nihil eveniet asperiores dolores officiis ipsa debitis corrupti fugiat
            expedita mollitia reiciendis. Commodi?</p>
    </div>
    <img src="{{ asset('/img/foto-ppm.jpg') }}" alt=""
        class="w-full md:w-2/5 h-64 md:h-80 object-cover rounded-lg order-1 md:order-2 shadow-xl">
</div>

{{-- Visi Misi Section --}}
<div class="bg-lime-100 py-10">
    <p class="text-center text-2xl md:text-4xl font-semibold py-5 uppercase">Visi dan Misi PPMRJ</p>
    <div class="flex flex-col md:flex-row p-6 md:p-10 text-center gap-6 md:gap-0">
        <div class="w-full md:w-1/2 p-6 bg-lime-200 rounded-lg shadow-lg">
            <h2 class="text-2xl md:text-4xl font-bold mb-4 italic text-lime-700 font-serif">Visi</h2>
            <p class="text-sm md:text-lg font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Asperiores tempore
                itaque error corporis quasi reprehenderit fuga voluptate ducimus ratione quod neque mollitia in nostrum,
                amet numquam quam cumque possimus perspiciatis.</p>
        </div>
        <div class="hidden md:block border-2 border-green-500 opacity-50 rounded-lg mx-5"></div>
        <div class="w-full md:w-1/2 p-6 bg-lime-200 rounded-lg shadow-lg">
            <h2 class="text-2xl md:text-4xl font-bold mb-4 italic text-lime-700 font-serif">Misi</h2>
            <p class="text-sm md:text-lg font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Repudiandae quos
                eaque
                dolorum quidem corporis assumenda sit ex labore in iste aspernatur repellat facilis dolorem atque ab,
                maiores beatae, qui excepturi.</p>
        </div>
    </div>
</div>

{{-- Gallery Section --}}
<div class="bg-green-800 py-16 px-6 md:px-10">
    <div class="text-center mb-12">
        <h2 class="text-2xl md:text-4xl font-bold text-white mb-4">Galeri PPMRJ</h2>
        <p class="text-gray-300 max-w-3xl mx-auto">Berbagai kegiatan dan suasana kehidupan di Pondok Pesantren Mahasiswa
            Roudhotul Jannah</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
        <!-- Item 1 - spans 2 columns on desktop only -->
        <div class="col-span-1 md:col-span-2 aspect-square md:aspect-[2/1] overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('/img/foto-ppm.jpg') }}" alt="PPMRJ Gallery"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <!-- Item 2 -->
        <div class="aspect-square overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('/img/foto-ppm.jpg') }}" alt="PPMRJ Gallery"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <!-- Item 3 -->
        <div class="aspect-square overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('/img/foto-ppm.jpg') }}" alt="PPMRJ Gallery"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <!-- Item 4 -->
        <div class="aspect-square overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('/img/foto-ppm.jpg') }}" alt="PPMRJ Gallery"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <!-- Item 5 - spans 2 columns on desktop only -->
        <div class="col-span-1 md:col-span-2 aspect-square md:aspect-[2/1] overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('/img/foto-ppm.jpg') }}" alt="PPMRJ Gallery"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
        <!-- Item 6 -->
        <div class="aspect-square overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('/img/foto-ppm.jpg') }}" alt="PPMRJ Gallery"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
    </div>
</div>



@endsection