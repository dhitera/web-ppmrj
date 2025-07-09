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
                    Permissions
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
                    @foreach($data->roles as $role)
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                            @if($role->name === 'admin') bg-red-100 text-red-800 @else bg-green-100 text-green-800 @endif">
                        {{ ucfirst($role->name) }}
                    </span>
                    @endforeach
                    @if($data->roles->isEmpty())
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        No Role
                    </span>
                    @endif
                </td>
                <td class="px-6 py-4 text-xs">
                    @foreach($data->getAllPermissions() as $permission)
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1 mb-1">
                        {{ $permission->name }}
                    </span>
                    @endforeach
                </td>
                <td class="px-6 py-4 text-right flex gap-5">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection