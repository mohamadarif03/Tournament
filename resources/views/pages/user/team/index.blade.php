@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="container">

        <a href="{{ route('team.create') }}" type="button"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">
            +Tambah Data
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($teams as $team)
                <div x-data="basic" class="border bg-white border-none drop-shadow-lg rounded-md">
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/' . $team->logo) }}" class="rounded-full mt-4" width="130"
                            height="130" style="min-height: 130px; min-width:130px; max-height: 130px; max-height:130px;"
                            alt="">
                    </div>
                    <div class="mx-4 flex justify-center my-2">
                        <p class="font-bold mt-1 text-2xl text-slate-800">{{ $team->name }}</p>
                    </div>
                    <div class="">
                        <div class="flex justify-center my-1 bg-[#F9c400]">
                            <p class="font-semibold text-md flex mr-2 text-white py-2">
                                Kategori: {{ $team->game->name }}
                            </p>
                        </div>
                    </div>
                    <div class="mx-4">
                        <div class="flex my-6">
                            <p class="font-base text-md flex mr-2">
                                {{ $team->description }}
                            </p>
                        </div>
                    </div>
                    <div class="border-t-2">
                        <div class="m-5 flex justify-center">
                            <a href="{{ route('team.show', $team->id) }}"
                                class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-6 rounded mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>
                            </a>
                            <a href="{{ route('team.edit', $team->id) }}"
                                class="bg-[#F9c400] hover:bg-[#d6a800] text-white font-bold py-2 px-6 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </a>
                            <form onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')" method="POST"
                                action="{{ route('team.destroy', $team) }}">
                                @method('DELETE')
                                @csrf
                                <button class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-6 rounded ml-3">
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
                <p>Tidak Ada Team Yang Pernah Anda Buat</p>
            @endforelse
        </div>

    </div>
@endsection
