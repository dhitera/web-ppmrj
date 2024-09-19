@extends('admin.layouts.adminMain')

@section('container')
<p class="text-2xl font-semibold py-5">Data Aktivitas PPM</p>
<a href="{{ route('activity.add') }}"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Tambahkan
    Aktivitas</a>
<br><br>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Foto
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activity as $data)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img src=@isset($data->image_url) {{ asset('storage/' . $data->image_url) }} @else {{
                    asset('/img/blankphoto.jpeg') }} @endisset
                    class="w-28" alt="{{ $data->title }}">
                </th>
                <td class="px-6 py-4">
                    {{ $data->title }}
                </td>
                <td class="px-6 py-4 text-sm md:text-base">
                    {!! Str::limit($data->description, 150, '...') !!}
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