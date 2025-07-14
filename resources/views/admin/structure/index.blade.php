@extends('admin.layouts.adminMain')

@section('container')
<p class="text-2xl font-semibold py-5">Data Struktur Anggota PPM</p>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Foto
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Lengkap
                </th>
                <th scope="col" class="px-6 py-3">
                    Dapukan
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($structures as $data)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img src="{{ $data->getFirstMediaUrl('images') ?: asset('/img/blankprofile.jfif') }}" class="w-28"
                        alt="{{ $data->name }}">
                </th>
                <td class="px-6 py-4">
                    {{ $data->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $data->jobdesk }}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('structure.edit', $data->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection