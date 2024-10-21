@extends('admin.layouts.adminMain')

@section('container')
<p class="text-2xl font-semibold py-5">Data User</p>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userData as $data)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 font-bold">
                    {{ $data->name }}
                </td>
                <td class="px-6 py-4 text-sm md:text-base">
                    {{ $data->email }}
                </td>
                <td class="px-6 py-4 text-sm md:text-base">
                    {{ $data->role }}
                </td>
                <td class="px-6 py-4 text-right flex gap-5">
                    <a href="{{ route('activity.edit', $data->id) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('activity.delete', $data->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                            onclick="return confirm('Are you sure you want to delete this activity?');">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection