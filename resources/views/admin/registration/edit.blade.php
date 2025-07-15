@extends('admin.layouts.adminMain')

@section('container')
<br>
<a href="{{ route('admin.registration') }}"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Kembali</a>

<p class="text-2xl font-semibold py-5">Ubah Halaman Registrasi</p>

<form method="POST" action="{{ route('registration.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="md:w-1/3 bg-gray-200 border p-4 rounded-lg">
        <div class="mb-3">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
            <input type="text" id="title" name="title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Title" value="{{ $registration->title }}" required />
        </div>
        <div class="mb-3">
            <label for="description"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
            <input type="text" id="description" name="description"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Deskripsi" value="{{ $registration->description }}" required />
        </div>
        <div class="mb-3">
            <label for="registration_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                Form PMB</label>
            <input type="text" id="registration_link" name="registration_link"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Link PMB" value="{{ $registration->registration_link }}" required />
        </div>
        <div class="mb-3">
            <img src="{{ $registration->getFirstMediaUrl('registration') ?: asset('/img/blankphoto.jpeg') }}"
                class="w-28 border-white border-4 rounded" alt="{{ $registration->title }}">
            <p class="text-sm text-gray-800 italic">banner sebelumnya</p>
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
                5MB).
                @endif
            </p>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>

@endsection