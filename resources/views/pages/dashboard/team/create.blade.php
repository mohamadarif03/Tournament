@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-7">
        <form enctype="multipart/form-data" action="{{ route('team.store') }}" class="theme-form theme-form-2 mega-form"
            method="POST">
            @csrf
            <div class="border border-black/10 dark:border-white/10 p-5 rounded-md">
                <div class="mb-5">
                    <p class="text-sm font-bold">Team</p>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-semibold">Nama</label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Nama" type="text" id="name" name="name" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-semibold">Logo</label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Username" type="file" id="logo" name="logo" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-bold">Deskripsi</label>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Deskripsi"></textarea>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-bold">Game</label>
                    <select id="countries" name="game_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih Game</option>
                        @foreach ($games as $game)
                            <option value="{{$game->id}}">{{$game->name}}</option>
                        @endforeach
                    </select>

                </div>

                <a href="{{ route('team.index') }}" type="button"
                    class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mb-5">
                    <span>Back</span>
                </a>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-5">
                    <span>Kirim</span>
                </button>
            </div>
        </form>

    </div>
@endsection
