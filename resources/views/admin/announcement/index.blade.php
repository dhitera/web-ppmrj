@extends('admin.layouts.adminMain')

@section('container')
<p class="text-2xl font-semibold py-5">Edit Halaman Pengumuman</p>
<p class="text-xl font-semibold my-2">Gelombang 1: <span
        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">{{
        $santri->where('gelombang',
        'gelombang1')->count()
        }}</span></p>
<p class="text-xl font-semibold my-2">Gelombang 1: <span
        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">{{
        $santri->where('gelombang',
        'gelombang2')->count()
        }}</span></p>
<p class="text-xl font-semibold my-2">Total Calon Santri: <span
        class="bg-green-100 text-green-800 me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">{{
        $santri->count()
        }}</span></p>

<div class="sm:hidden">
    <label for="tabs" class="sr-only">Pilih Tab</label>
    <select id="tabs"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        onchange="changeTab(this.value)">
        <option value="Gelombang 1">List Santri</option>
        {{-- <option value="Gelombang 2">Gelombang 2</option> --}}
        <option value="info">Informasi Tambahan</option>
    </select>
</div>
<ul
    class="hidden text-sm font-medium text-center text-gray-500 rounded-lg shadow-sm sm:flex dark:divide-gray-700 dark:text-gray-400">
    <li class="w-full focus-within:z-10">
        <a href="#" onclick="changeTab('listSantri'); return false;"
            class="inline-block w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 dark:border-gray-700 rounded-s-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white tab-link active"
            aria-current="page" data-tab="listSantri">List Santri</a>
    </li>
    {{-- <li class="w-full focus-within:z-10">
        <a href="#" onclick="changeTab('Gelombang 2'); return false;"
            class="inline-block w-full p-4 bg-white border-r border-gray-200 dark:border-gray-700 hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700 tab-link"
            data-tab="Gelombang 2">Gelombang 2</a>
    </li> --}}
    <li class="w-full focus-within:z-10">
        <a href="#" onclick="changeTab('info'); return false;"
            class="inline-block w-full p-4 bg-white border-s-0 border-gray-200 dark:border-gray-700 rounded-e-lg hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700 tab-link"
            data-tab="info">Informasi Tambahan</a>
    </li>
</ul>

<!-- Tab Content: List Santri -->
<div id="listSantri-tab" class="tab-content active">
    <div class="flex justify-between items-center my-4">
        <h2 class="text-xl font-semibold">Daftar Calon Santri</h2>
        <a href="{{ route('announcement.addSantri') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
            Santri</a>
    </div>

    <div class="flex flex-wrap gap-4 items-center my-3">
        <div class="flex items-center max-w-sm">
            <label for="search-santri" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                </div>
                <input type="text" id="search-santri" oninput="searchSantri()"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari nama santri..." />
            </div>
            <button type="button" onclick="clearSearch()"
                class="p-2.5 ms-2 text-sm font-medium text-white bg-gray-500 rounded-lg hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="sr-only">Clear</span>
            </button>
        </div>

        <div class="max-w-sm">
            <label for="filter-gelombang" class="sr-only">Filter Gelombang</label>
            <select id="filter-gelombang" onchange="filterGelombang()"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="all" selected>Semua Gelombang</option>
                <option value="gelombang1">Gelombang 1</option>
                <option value="gelombang2">Gelombang 2</option>
            </select>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Calon Santri
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kota Asal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gelombang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($santri as $data)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $data->student_name }}
                    </td>
                    <td class="px-6 py-4 text-sm md:text-base">
                        {{ $data->student_city }}
                    </td>
                    <td class="px-6 py-4 text-sm md:text-base">
                        {{ $data->gelombang }}
                    </td>
                    <td class="px-6 py-4 text-right flex gap-5">
                        <a href="{{ route('announcement.editSantri', $data->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('announcement.deleteSantri', $data->id ) }}" method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus santri ini?');">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Tab Content: Informasi Tambahan -->
<div id="info-tab" class="tab-content hidden">
    <div class="flex justify-between items-center my-4">
        <h2 class="text-xl font-semibold">Informasi Tambahan</h2>
        <a href="{{ route('announcement.addInfo') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
            Informasi</a>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Informasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($informasi as $info)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 text-sm md:text-base">
                        {{ $info->info }}
                    </td>
                    <td class="px-6 py-4 text-right flex gap-5">
                        <a href="{{ route('announcement.editInfo', $info->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('announcement.deleteInfo', $info->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus informasi ini?');">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function changeTab(tabId) {
        // Hide all tab contents
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(content => content.classList.add('hidden'));
        tabContents.forEach(content => content.classList.remove('active'));
        
        // Remove active class from all tab links
        const tabLinks = document.querySelectorAll('.tab-link');
        tabLinks.forEach(link => {
            link.classList.remove('text-gray-900', 'bg-gray-100', 'dark:bg-gray-700', 'dark:text-white', 'active');
            link.classList.add('bg-white', 'hover:text-gray-700', 'hover:bg-gray-50', 'dark:bg-gray-800', 'dark:hover:bg-gray-700');
        });
        
        // Show the selected tab content
        const selectedTab = document.getElementById(tabId + '-tab');
        selectedTab.classList.remove('hidden');
        selectedTab.classList.add('active');
        
        // Add active class to the clicked tab link
        const activeTabLink = document.querySelector(`[data-tab="${tabId}"]`);
        activeTabLink.classList.remove('bg-white', 'hover:text-gray-700', 'hover:bg-gray-50', 'dark:bg-gray-800', 'dark:hover:bg-gray-700');
        activeTabLink.classList.add('text-gray-900', 'bg-gray-100', 'dark:bg-gray-700', 'dark:text-white', 'active');
    }
</script>

<style>
    .tab-content.active {
        display: block;
    }

    .tab-content.hidden {
        display: none;
    }
</style>

<script>
    function searchSantri() {
        // Get the search input value
        const searchValue = document.getElementById('search-santri').value.toLowerCase();
        
        // Get all table rows
        const rows = document.querySelectorAll('#listSantri-tab table tbody tr');
        
        // Get gelombang filter value
        const gelombangFilter = document.getElementById('filter-gelombang').value;
        
        // Loop through rows and hide/show based on search and filter
        rows.forEach(row => {
            const studentName = row.querySelector('td:first-child').textContent.toLowerCase();
            const gelombang = row.querySelector('td:nth-child(3)').textContent.trim();
            
            // Check search criteria
            const matchesSearch = studentName.includes(searchValue);
            
            // Check gelombang filter
            const matchesGelombang = gelombangFilter === 'all' || gelombang === gelombangFilter;
            
            // Show row only if it matches both search and filter criteria
            if (matchesSearch && matchesGelombang) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    
    function filterGelombang() {
        // Call searchSantri to apply both filters
        searchSantri();
    }
    
    function clearSearch() {
        // Clear search field
        document.getElementById('search-santri').value = '';
        // Reset gelombang filter to "all"
        document.getElementById('filter-gelombang').value = 'all';
        // Apply filters (which will now show all rows)
        searchSantri();
    }
</script>
@endsection