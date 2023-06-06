@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="container">

        <a href="{{ route('tournament.create') }}" type="button"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">
            +Tambah Data
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($tournaments as $tournament)
                <div x-data="basic" class="border bg-white border-none drop-shadow-lg rounded-md">
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' . $tournament->live_image_url) }}" class="rounded-t-md" width="450" style="min-height: 150px; max-height:170px" alt="">
                    </div>
                    <div class="flex mx-4 mt-5">
                        <p class="font-bold text-md flex mr-2 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-geo-alt mr-1.5" viewBox="0 0 16 16">
                                <path
                                    d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                            {{$tournament->location}}
                        </p>
                    </div>
                    <div class="mx-4 flex justify-between">
                        <p class="font-bold mt-4 text-base text-slate-700">{{ $tournament->name }}</p>
                    </div>
                    <div class="mx-4">
                        <div class="flex my-3">
                            @if ($tournament->is_open_signup == 1)
                            <p class="font-semibold text-md flex mr-2 text-[#CDE990]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" fill="currentColor"
                                    class="bi bi-circle-fill mr-3 text-[#CDE990]" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8" />
                                </svg>
                                Pendaftaran Dibuka
                            </p>
                            @else
                            <p class="font-semibold text-md flex mr-2 text-[#F45050]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16" fill="currentColor"
                                    class="bi bi-circle-fill mr-3 text-[#F45050]" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8" />
                                </svg>
                                Pendaftaran Ditutup
                            </p>
                            @endif
                           
                        </div>
                        
                    </div>
                    <div class="flex justify-between mx-4">
                        <div class="bg-[#FFD93D] px-2 py-1 rounded-md">
                            <p class="font-semibold text-sm text-white">Rp {{ number_format($tournament->registration_fee, 0, ',', '.') }}</p>
                        </div>
                        <div class="">
                            <p class="font-bold text-xl text-slate-700">{{$tournament->slot}} Slot</p>
                        </div>
                    </div>
                    <div class="mx-4 my-2">
                        <p class="font-semibold text-slate-700">{{ date('d F Y', strtotime($tournament->starter_at)) }}</p>
                    </div>
                    <div class="flex justify-center my-2">
                        <div class="bg-[#FF8400] px-3 py-4 rounded-md">
                            <p class="font-bold text-white">Hadiah: Rp {{ number_format($tournament->price_pool, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <div class="border-t-2">
                        <div class="m-5 flex justify-center">
                            <a href="{{ route('tournament.edit', $tournament->id) }}"
                                class="bg-yellow-400 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                            <form onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')" method="POST"
                                action="{{ route('tournament.destroy', $tournament) }}">
                                @method('DELETE')
                                @csrf
                                <button class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-6 rounded ml-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            @empty
                <p>Anda Belum Pernah Membuat Tournament</p>
            @endforelse
        </div>

    </div>
@endsection
