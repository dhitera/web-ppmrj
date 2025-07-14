@extends('admin.layouts.adminMain')

@section('container')
<br>
<a href="{{ route('admin.announcement') }}"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Kembali</a>

<p class="text-2xl font-semibold py-5">Tambah Informasi Pengumuman</p>
<form method="POST" action="{{ route('announcement.storeInfo') }}" enctype="multipart/form-data">
    @csrf
    <div class="md:w-3/4 bg-gray-200 border p-4 rounded-lg">
        <div class="mb-3">
            <label for="info" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi</label>
            <input type="text" id="info" name="info"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Informasi Tambahan Lengkap" required />
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
</form>
@endsection