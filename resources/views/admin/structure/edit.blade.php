@extends('admin.layouts.adminMain')

@section('container')
<br>
<a href="{{ route('admin.structure') }}"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Kembali</a>

<p class="text-2xl font-semibold py-5">Ubah Data Struktur</p>

<form method="POST" action="{{ route('structure.update', $structure->id) }}" enctype="multipart/form-data">
    @csrf
    <div class="md:w-1/3 bg-gray-200 border p-4 rounded-lg">
        <div class="mb-3">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
            <input type="text" id="nama" name="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="John" value="{{ $structure->name }}" required />
        </div>
        <div class="mb-3">
            <label for="jobdesk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dapukan</label>
            <input type="text" id="jobdesk" name="jobdesk"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $structure->jobdesk }}" readonly>
        </div>
        <div class="mb-3">
            <img src="{{ $structure->getFirstMediaUrl('images') ?: asset('/img/blankprofile.jfif') }}"
                class="w-28 border-white border-4 rounded" alt="{{ $structure->name }}">
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
                5MB).
                @endif
            </p>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>

@endsection