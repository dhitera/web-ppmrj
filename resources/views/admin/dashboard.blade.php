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
                        @if($role->name === 'admin') bg-red-100 text-red-800 
                        @else bg-green-100 text-green-800 
                        @endif">
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

                @can('manage announcements')
                <a href="{{ route('admin.announcement') }}"
                    class="block w-full text-center bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600 transition">
                    Kelola Pengumuman
                </a>
                @endcan
            </div>
        </div>

        {{-- Permissions Info --}}
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Menu</h2>
            <div class="flex flex-col gap-3">
                @foreach($settings as $setting)
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" data-key="{{ $setting->key }}" class="setting-toggle sr-only peer" {{
                        $setting->getBoolValue() ? 'checked' : '' }}>
                    <div
                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
                    </div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $setting->display_name
                        }}</span>
                </label>
                @if($setting->description)
                <p class="text-xs text-gray-500 ml-14 -mt-1">{{ $setting->description }}</p>
                @endif
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggles = document.querySelectorAll('.setting-toggle');
        
        toggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const key = this.getAttribute('data-key');
                const value = this.checked;
                
                // Show loading state
                const originalLabel = this.nextElementSibling.nextElementSibling.textContent;
                this.nextElementSibling.nextElementSibling.textContent = 'Menyimpan...';
                
                // Send AJAX request
                axios.post('{{ route("admin.settings.toggle") }}', {
                    key: key,
                    value: value,
                    _token: '{{ csrf_token() }}'
                })
                .then(response => {
                    // Restore label and show success message
                    this.nextElementSibling.nextElementSibling.textContent = originalLabel;
                    
                    // Show success notification
                    const successMsg = document.createElement('div');
                    successMsg.className = 'text-sm text-green-500 ml-14 mt-1 success-message';
                    successMsg.textContent = value ? 'Diaktifkan' : 'Dinonaktifkan';
                    
                    const existingMsg = this.parentElement.parentElement.querySelector('.success-message');
                    if (existingMsg) existingMsg.remove();
                    
                    this.parentElement.parentElement.appendChild(successMsg);
                    
                    // Remove message after 3 seconds
                    setTimeout(() => {
                        successMsg.remove();
                    }, 3000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Revert toggle state on error
                    this.checked = !value;
                    this.nextElementSibling.nextElementSibling.textContent = originalLabel;
                    
                    // Show error message
                    const errorMsg = document.createElement('div');
                    errorMsg.className = 'text-sm text-red-500 ml-14 mt-1';
                    errorMsg.textContent = 'Gagal menyimpan pengaturan';
                    
                    const existingMsg = this.parentElement.parentElement.querySelector('.success-message, .error-message');
                    if (existingMsg) existingMsg.remove();
                    
                    errorMsg.classList.add('error-message');
                    this.parentElement.parentElement.appendChild(errorMsg);
                    
                    // Remove message after 3 seconds
                    setTimeout(() => {
                        errorMsg.remove();
                    }, 3000);
                });
            });
        });
    });
</script>
@endsection