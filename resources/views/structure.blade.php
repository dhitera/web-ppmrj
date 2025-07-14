@extends('layouts.main')

@section('container')

<div class="py-10 bg-gray-100">
    <div class="flex items-center gap-5 w-full justify-between px-5 py-5">
        <hr class="w-2/3 border-gray-500 border-2 " />
        <p class=" w-1/3 text-center font-bold text-lg md:text-2xl uppercase">Pengurus PPM</p>
        <hr class="w-2/3 border-gray-500 border-2 " />
    </div>

    @foreach ($structures as $jobdesk => $data)
    @if($jobdesk == 'Pembina PPM')
    @foreach($data as $structure)
    <x-profile-card image="{{ $structure->getFirstMediaUrl('images') ?: asset('/img/blankprofile.jfif') }}"
        name="{{ $structure->name }}" jabatan="{{ $structure->jobdesk }}"></x-profile-card>
    @endforeach
    @endif
    @endforeach

    <div class="flex-none md:flex">
        @foreach ($structures as $jobdesk => $data)
        @if($jobdesk == 'Pinisepuh' || $jobdesk == 'Ketua PPM')
        @foreach($data as $structure)
        <x-profile-card image="{{ $structure->getFirstMediaUrl('images') ?: asset('/img/blankprofile.jfif') }}"
            name="{{ $structure->name }}" jabatan="{{ $structure->jobdesk }}"></x-profile-card>
        @endforeach
        @endif
        @endforeach
    </div>

    <div class="flex items-center gap-5 w-full justify-between px-5 py-5">
        <hr class="w-2/3 border-gray-500 border-2 " />
        <p class=" w-1/3 text-center font-bold text-lg md:text-2xl uppercase">Dewan Guru</p>
        <hr class="w-2/3 border-gray-500 border-2 " />
    </div>

    <div class="flex-none md:flex">
        @foreach ($structures as $jobdesk => $data)
        @if($jobdesk == 'Dewan Guru')
        @foreach($data as $structure)
        <x-profile-card image="{{ $structure->getFirstMediaUrl('images') ?: asset('/img/blankprofile.jfif') }}"
            name="{{ $structure->name }}" jabatan="{{ $structure->jobdesk }}"></x-profile-card>
        @endforeach
        @endif
        @endforeach
    </div>

    <div class="flex items-center gap-5 w-full justify-between px-5 py-5">
        <hr class="w-2/3 border-gray-500 border-2 " />
        <p class=" w-1/3 text-center font-bold text-lg md:text-2xl uppercase">Koordinator Mahasiswa</p>
        <hr class="w-2/3 border-gray-500 border-2 " />
    </div>

    @foreach ($structures as $jobdesk => $data)
    @if($jobdesk == 'Ketua Mahasiswa')
    @foreach($data as $structure)
    <x-profile-card image="{{ $structure->getFirstMediaUrl('images') ?: asset('/img/blankprofile.jfif') }}"
        name="{{ $structure->name }}" jabatan="{{ $structure->jobdesk }}"></x-profile-card>
    @endforeach
    @endif
    @endforeach

    <div class="flex-none md:flex">
        @foreach ($structures as $jobdesk => $data)
        @if(in_array($jobdesk, ['Wakil 1', 'Wakil 2', 'Wakil 3', 'Wakil 4']))
        @foreach($data as $structure)
        <x-profile-card image="{{ $structure->getFirstMediaUrl('images') ?: asset('/img/blankprofile.jfif') }}"
            name="{{ $structure->name }}" jabatan="{{ $structure->jobdesk }}"></x-profile-card>
        @endforeach
        @endif
        @endforeach
    </div>
</div>

@endsection