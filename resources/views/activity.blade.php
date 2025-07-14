@extends('layouts.main')

@section('container')
<div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-5">
    @foreach ($activity as $data)
    <div>
        <figure class="relative max-w-full" data-modal-target="modal-{{ $data->id }}"
            data-modal-toggle="modal-{{ $data->id }}">
            <a href="#">
                <img class="rounded-lg w-full h-64 object-cover object-center"
                    src="{{ $data->getFirstMediaUrl('images') ?: asset('/img/blankphoto.jpeg') }}"
                    alt="{{ $data->title }}">
            </a>
            <figcaption
                class="absolute px-4 py-2 w-full text-lg text-white bottom-0 rounded-b-lg bg-black bg-opacity-65">
                <p class="uppercase font-semibold">{{ $data->title }}</p>
            </figcaption>
        </figure>
    </div>

    <!-- Modal for each activity -->
    <div id="modal-{{ $data->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $data->title }}
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal-{{ $data->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5 space-y-4">
                    <img class="w-full h-64 object-cover object-center rounded-lg"
                        src="{{ $data->getFirstMediaUrl('images') ?: asset('/img/blankphoto.jpeg') }}"
                        alt="{{ $data->title }}">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400 trix-content">
                        {!! $data->description !!}
                    </p>
                </div>
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="modal-{{ $data->id }}" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection