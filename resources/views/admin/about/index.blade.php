@extends('admin.layouts.adminMain')

@section('container')
<div class="flex flex-row justify-between items-center">
    <p class="text-2xl font-semibold py-5">Data Page About</p>
    <div class="flex gap-2">
        <a href="{{ route('about.editPage') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
            Edit Data
        </a>
        <a href="{{ route('about.editGallery') }}"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">
            Edit Gallery
        </a>
    </div>
</div>


<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Deskripsi
                        Tentang</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $about->description }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Visi</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $about->vision }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Misi</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $about->mission }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Judul
                        Galeri</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $about->galleryTitle }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Deskripsi
                        Galeri</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $about->galleryDescription }}</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>

{{-- Gallery Images Section --}}
<div class="mt-8">
    <div class="flex flex-row justify-between items-center mb-4">
        <p class="text-xl font-semibold">Foto Galeri</p>
    </div>

    @php
    $galleryImages = $about->getMedia('gallery');
    @endphp

    @if($galleryImages->count() > 0)
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach($galleryImages as $index => $image)
        <div class="relative group">
            <img src="{{ $image->getUrl() }}" alt="Gallery Image {{ $index + 1 }}"
                class="w-full h-32 object-cover rounded-lg shadow-sm group-hover:shadow-lg transition-shadow duration-200">
            <div class="absolute top-2 left-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded">
                {{ $index + 1 }}
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-8 bg-gray-50 rounded-lg">
        <svg class="w-12 h-12 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
            </path>
        </svg>
        <p class="text-gray-500 text-sm">No gallery images uploaded yet</p>
        <p class="text-gray-400 text-xs mt-1">Upload exactly 6 images for the gallery</p>
    </div>
    @endif
</div>

@endsection