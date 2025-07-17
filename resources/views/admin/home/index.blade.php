@extends('admin.layouts.adminMain')

@section('container')
<div class="flex flex-row justify-between items-center">
    <p class="text-2xl font-semibold py-5">Data Page Home</p>
    <a href="{{ route('home.edit') }}"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
        Edit Data
    </a>
</div>

<div class="w-full mb-5">
    <img src="{{ $home->getFirstMediaUrl('images') ?: asset('/img/blankphoto.jpeg') }}"
        class="w-full h-full max-w-full object-cover rounded-lg shadow-lg" alt="{{ $home->header }}">
</div>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Pesan
                        Notifikasi</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $home->notificationMsg }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Header</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $home->header }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Sub
                        Header</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $home->subheader }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Deskripsi</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $home->description }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Total
                        Dewan Guru</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $home->guruCount }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Total
                        Mahasiswa</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $home->studentCount }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Total
                        Alumni</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $home->alumniCount }}</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection