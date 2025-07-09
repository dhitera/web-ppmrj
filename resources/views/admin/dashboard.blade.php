@extends('admin.layouts.adminMain')

@section('container')
<div class="p-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        {{-- Welcome Card --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-2">Selamat Datang!</h2>
            <p class="text-gray-600">{{ $user->name }}</p>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
            <div class="mt-3">
                @foreach($user->roles as $role)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                        @if($role->name === 'admin') bg-red-100 text-red-800 @else bg-green-100 text-green-800 @endif">
                    {{ ucfirst($role->name) }}
                </span>
                @endforeach
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Aksi Cepat</h2>
            <div class="space-y-2">
                @can('manage activities')
                <a href="{{ route('activity.add') }}"
                    class="block w-full text-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                    Tambah Aktivitas
                </a>
                @endcan

                @can('manage structure')
                <a href="{{ route('admin.structure') }}"
                    class="block w-full text-center bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition">
                    Kelola Struktur
                </a>
                @endcan

                @can('manage users')
                <a href="{{ route('admin.userList') }}"
                    class="block w-full text-center bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600 transition">
                    Kelola User
                </a>
                @endcan
            </div>
        </div>

        {{-- Permissions Info --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Izin Akses Anda</h2>
            <div class="space-y-1">
                @foreach($user->getAllPermissions() as $permission)
                <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1 mb-1">
                    {{ $permission->name }}
                </span>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Statistics (if admin) --}}
    @can('manage users')
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Statistik Sistem</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="text-center">
                <div class="text-2xl font-bold text-blue-600">{{ \App\Models\User::count() }}</div>
                <div class="text-sm text-gray-600">Total User</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-green-600">{{ \App\Models\Activity::count() }}</div>
                <div class="text-sm text-gray-600">Total Aktivitas</div>
            </div>
            <div class="text-center">
                <div class="text-2xl font-bold text-purple-600">{{ \App\Models\Structure::count() }}</div>
                <div class="text-sm text-gray-600">Total Struktur</div>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection