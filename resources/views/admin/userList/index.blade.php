@extends('admin.layouts.adminMain')

@section('container')
<div class="flex justify-between items-center py-5">
    <div>
        <p class="text-2xl font-semibold">Data User</p>
        <p class="text-gray-600 text-sm mt-1">Total: {{ $userData->count() }} user(s)</p>
    </div>
    <a href="{{ route('admin.userAdd') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Tambah User
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    {{ session('error') }}
</div>
@endif

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
                <td class="px-6 py-4 text-sm md:text-base text-center">
                    @if($data->roles->isNotEmpty())
                    @php $role = $data->roles->first() @endphp
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                            @if($role->name === 'Admin') 
                                bg-red-100 text-red-800 
                            @elseif($role->name === 'Divisi IT') 
                                bg-blue-100 text-blue-800 
                            @elseif($role->name === 'Panitia') 
                                bg-green-100 text-green-800 
                            @else 
                                bg-purple-100 text-purple-800 
                            @endif">
                        {{ ucfirst($role->name) }}
                    </span>
                    @else
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
                <td class="px-6 py-4 text-center">
                    <div class="flex gap-2 justify-end">
                        <a href="{{ route('admin.userEdit', $data->id) }}"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-3 rounded text-sm">
                            Edit
                        </a>
                        @if($data->id !== Auth::id())
                        <form action="{{ route('admin.userDelete', $data->id) }}" method="POST"
                            class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-sm delete-btn"
                                data-user-name="{{ $data->name }}">
                                Delete
                            </button>
                        </form>
                        @else
                        <span class="text-gray-400 text-sm">Current User</span>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const userName = this.dataset.userName;
            const form = this.closest('.delete-form');
            
            if (confirm(`Apakah Anda yakin ingin menghapus user "${userName}"? Tindakan ini tidak dapat dibatalkan.`)) {
                form.submit();
            }
        });
    });
});
</script>
@endsection