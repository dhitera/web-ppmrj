@extends('layouts.main')

@section('container')
<div class="bg-gradient-to-r from-lime-400 to-green-800">
    <div class="py-10 text-center text-white">
        <p class="text-4xl font-bold">Pengumuman Seleksi</p>
        <p class="text-xl my-3">Selamat kepada peserta yang telah lolos seleksi santri baru PPMRJ!</p>
        <div class="bg-white/10 p-3 rounded-lg shadow-lg mt-5 w-2/3 lg:w-1/3 mx-auto">
            <p class="text-base lg:text-lg">📢 Seleksi Gelombang 2 sudah diumumkan!!</p>
        </div>
    </div>

    <div class="bg-white p-10">
        <p class="text-3xl font-bold text-center underline underline-offset-4">Pengumuman Seleksi Gelombang 1</p>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-300 dark:bg-gray-800 text-center">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3 text-center bg-gray-50">
                            Asal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Muhammad Rifqi Ashari
                        </th>
                        <td class="px-6 py-4">
                            Tangerang
                        </td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Aris Muhammad Rozaq
                        </th>
                        <td class="px-6 py-4">
                            Sumedang
                        </td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Muhammad Ilman Nafian Alvalery
                        </th>
                        <td class="px-6 py-4">
                            Cianjur
                        </td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Aswangga Pandita Sadu
                        </th>
                        <td class="px-6 py-4">
                            Kediri
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Arga Ulya Abdurrohman
                        </th>
                        <td class="px-6 py-4">
                            Karanganyar
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="text-3xl font-bold text-center underline underline-offset-4">Pengumuman Seleksi Gelombang 2</p>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-300 dark:bg-gray-800 text-center">
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3 text-center bg-gray-50">
                            Asal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Muhammad Rifqi Ashari
                        </th>
                        <td class="px-6 py-4">
                            Tangerang
                        </td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Aris Muhammad Rozaq
                        </th>
                        <td class="px-6 py-4">
                            Sumedang
                        </td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Muhammad Ilman Nafian Alvalery
                        </th>
                        <td class="px-6 py-4">
                            Cianjur
                        </td>
                    </tr>
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Aswangga Pandita Sadu
                        </th>
                        <td class="px-6 py-4">
                            Kediri
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 dark:text-white dark:bg-gray-800">
                            Arga Ulya Abdurrohman
                        </th>
                        <td class="px-6 py-4">
                            Karanganyar
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-gray-100/50 p-7 rounded-lg shadow-lg mt-5">
            <div class="flex flex-row gap-2 my-2">
                <span
                    class="inline-flex items-center justify-center w-8 h-8 me-2 text-sm font-semibold text-lime-600 bg-white rounded-full">
                    <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Icon description</span>
                </span>
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">Informasi Tambahan:</h2>
            </div>
            <ul class="space-y-1 text-gray-500 list-disc list-outside mx-7 marker:text-green-600">
                <li>
                    Bagi Pendaftar yang dinyatakan lulus tahap seleksi wajib untuk mengikuti kegiatan Orientasi Santri
                    (Informasi akan diberikan lebih lanjut).
                </li>
                <li>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut nesciunt pariatur inventore in fuga?
                    Dolorem repellat aut eum accusamus, animi harum, hic non perferendis quia rem obcaecati, eaque
                    explicabo libero.
                </li>
            </ul>
        </div>

    </div>
</div>

@endsection