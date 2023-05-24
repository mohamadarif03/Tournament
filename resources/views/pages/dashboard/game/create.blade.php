@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-7">
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form enctype="multipart/form-data" action="{{ route('game.store') }}" class="theme-form theme-form-2 mega-form"
            method="POST">
            @csrf
            <div class="border border-black/10 dark:border-white/10 p-5 rounded-md">
                <div class="mb-5">
                    <p class="text-sm font-semibold">Input Group</p>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px">
                        <input
                            class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                            placeholder="Nama" type="text" id="name" name="name" value="{{ old('name') }}" />
                    </label>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px">
                        <input
                            class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                            placeholder="Username" type="file" id="logo" name="logo" />
                    </label>
                </div>

                <a href="{{ route('game.index') }}" type="button"
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
