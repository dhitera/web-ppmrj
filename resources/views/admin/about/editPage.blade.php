@extends('admin.layouts.adminMain')

@section('container')
<br>
<a href="{{ route('admin.about') }}"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Kembali</a>

<p class="text-2xl font-semibold py-5">Ubah Halaman About</p>

<form method="POST" action="{{ route('about.updatePage') }}" enctype="multipart/form-data">
    @csrf
    <div class="md:w-1/3 bg-gray-200 border p-4 rounded-lg">
        <div class="mb-3">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                PPMRJ</label>
            <textarea id="description" name="description" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Tuliskan deskripsi" required>{{ $about->description }}</textarea>

        </div>
        <div class="mb-3">
            <label for="vision" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi PPMRJ</label>
            <textarea id="vision" name="vision" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Tuliskan Visi" required>{{ $about->vision }}</textarea>

        </div>
        <div class="mb-3">
            <label for="mission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Misi PPMRJ</label>
            <textarea id="mission" name="mission" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Tuliskan Misi" required>{{ $about->mission }}</textarea>

        </div>
        <div class="mb-3">
            <label for="galleryTitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                Galeri</label>
            <input type="text" id="galleryTitle" name="galleryTitle"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="title" value="{{ $about->galleryTitle }}" required />
        </div>
        <div class="mb-3">
            <label for="galleryDescription"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Galeri</label>
            <textarea id="galleryDescription" name="galleryDescription" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Desc" required>{{ $about->galleryDescription }}</textarea>

        </div>
        <div class="mb-3">
            <img src="{{ $about->getFirstMediaUrl('images') ?: asset('/img/blankphoto.jpeg') }}"
                class="w-28 border-white border-4 rounded" alt="{{ $about->header }}">
            <p class="text-sm text-gray-800 italic">foto sebelumnya</p>
        </div>
        <div class="mb-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="file_input" type="file" name="file_input">
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <p class="mt-1 text-sm text-red-600" id="file_input_help">{{ $error }}
                </p>
                @endforeach
            </ul>
            @else
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, JPG, PNG, WebP (MAX.
                10MB).
                @endif
            </p>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>

@endsection