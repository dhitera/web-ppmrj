@extends('admin.layouts.adminMain')

@section('container')
<div class="flex flex-row justify-between items-center">
    <p class="text-2xl font-semibold py-5">Data Page Registrasi</p>
    <a href="{{ route('registration.edit') }}"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
        Edit Registrasi
    </a>
</div>

<div class="w-full mb-5">
    <img src="{{ $registration->getFirstMediaUrl('registration') ?: asset('/img/blankphoto.jpeg') }}"
        class="w-full h-64 max-w-full object-fill rounded-lg shadow-lg" alt="{{ $registration->title }}">
</div>



<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Title</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $registration->title }}</p>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Deskripsi</span>
                </th>
                <td class="px-6 py-4">
                    <p>{{ $registration->description }}</p>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span
                        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Link
                        PMB</span>
                </th>
                <td class="px-6 py-4">
                    <a class="text-blue-600 hover:underline"
                        href="{{ parse_url($registration->registration_link, PHP_URL_HOST) ?: $registration->registration_link }}">{{
                        parse_url($registration->registration_link, PHP_URL_HOST) ?: $registration->registration_link
                        }}</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection