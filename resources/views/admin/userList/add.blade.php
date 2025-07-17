@extends('admin.layouts.adminMain')

@section('container')
<div class="flex justify-between items-center py-5">
    <p class="text-2xl font-semibold">Tambah User</p>
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
    <form action="{{ route('admin.userStore') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                Nama *
            </label>
            <input type="text" name="name" id="name" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                Email *
            </label>
            <input type="email" name="email" id="email" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                Password *
            </label>
            <input type="password" name="password" id="password" required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Role (Pilih satu)
            </label>
            <div class="space-y-3 bg-gray-50 p-4 rounded-lg">
                @foreach($roles as $role)
                <div class="flex items-center">
                    <input type="radio" name="role" value="{{ $role->name }}" id="role_{{ $role->id }}"
                        class="mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" {{
                        old('role')==$role->name ? 'checked' : '' }}>
                    <label for="role_{{ $role->id }}" class="text-gray-700 font-medium">
                        {{ ucfirst($role->name) }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
            <a href="{{ route('admin.userList') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection