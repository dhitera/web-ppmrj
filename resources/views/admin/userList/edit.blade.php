@extends('admin.layouts.adminMain')

@section('container')
<div class="flex justify-between items-center py-5">
    <p class="text-2xl font-semibold">Edit User</p>
    <a href="{{ route('admin.userList') }}"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Kembali
    </a>
</div>

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.userUpdate', $editUser->id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                Nama *
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $editUser->name) }}" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                Email *
            </label>
            <input type="email" name="email" id="email" value="{{ old('email', $editUser->email) }}" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                Password (kosongkan jika tidak ingin mengubah)
            </label>
            <input type="password" name="password" id="password"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Role (Pilih satu)
            </label>
            @if($editUser->id === Auth::id())
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-yellow-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-yellow-800 font-medium">
                        Anda tidak dapat mengubah role untuk akun Anda sendiri
                    </span>
                </div>
                <div class="mt-3">
                    @if($editUser->roles->isNotEmpty())
                    @php $role = $editUser->roles->first() @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                @if($role->name === 'admin') 
                                    bg-red-100 text-red-800 
                                @elseif($role->name === 'it') 
                                    bg-blue-100 text-blue-800 
                                @elseif($role->name === 'panitia') 
                                    bg-green-100 text-green-800 
                                @else 
                                    bg-purple-100 text-purple-800 
                                @endif">
                        Role saat ini: {{ ucfirst($role->name) }}
                    </span>
                    @else
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                        Role saat ini: Tidak ada role
                    </span>
                    @endif
                </div>
                <input type="hidden" name="role" value="{{ $editUser->roles->first()?->name ?? '' }}">
            </div>
            @else
            <div class="space-y-3 bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center">
                    <input type="radio" name="role" value="" id="role_none"
                        class="mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('role',
                        $editUser->roles->first()?->name ?? '') == '' ? 'checked' : '' }}>
                    <label for="role_none" class="text-gray-700 font-medium">
                        Tidak ada role
                    </label>
                </div>
                @foreach($roles as $role)
                <div class="flex items-center">
                    <input type="radio" name="role" value="{{ $role->name }}" id="role_{{ $role->id }}"
                        class="mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{ old('role',
                        $editUser->roles->first()?->name ?? '') == $role->name ? 'checked' : '' }}>
                    <label for="role_{{ $role->id }}" class="text-gray-700 font-medium">
                        {{ ucfirst($role->name) }}
                    </label>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update
            </button>
            <a href="{{ route('admin.userList') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection