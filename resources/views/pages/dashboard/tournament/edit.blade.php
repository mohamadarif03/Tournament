@php
    use App\Enums\UserRoleEnum;
    use App\Helpers\UserHelper;
@endphp
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
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form enctype="multipart/form-data" action="{{ route('tournament.update', $tournament) }}"
            class="theme-form theme-form-2 mega-form" method="POST">
            @csrf
            @method('PUT')
            <div class="border border-black/10 dark:border-white/10 p-5 rounded-md">
                <div class="mb-5">
                    <p class="text-sm font-semibold">Input Group</p>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px">
                        <input
                            class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                            placeholder="Nama" type="text" id="name" name="name"
                            value="{{ $tournament->name }}" />
                    </label>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px">
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Deskripsi" value="{{ $tournament->description }}">{{ $tournament->description }}</textarea>
                    </label>
                </div>
                <div class="mb-4">
                    @if ($tournament->live_image_url)
                        <img src="{{ asset('storage/' . $tournament->live_image_url) }}" alt="logo" width="150"
                            srcset="">
                    @endif
                    <label class="mt-1.5 flex -space-x-px">
                        <input
                            class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                            placeholder="" type="file" id="live_image_url" name="live_image_url" />
                    </label>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px">
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                        placeholder="" type="datetime-local" id="" name="starter_at"
                        value="{{ $tournament->starter_at }}" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px">
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                        placeholder="" type="datetime-local" id="" name="completed_at"
                        value="{{ $tournament->completed_at }}" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px">
                        <select id="countries" name="slot"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option>Pilih Slot</option>
                            <option value="8" <?php if ($tournament->slot == 8) {
                                echo 'selected';
                            } ?>>8 Slot</option>
                            <option value="16" <?php if ($tournament->slot == 16) {
                                echo 'selected';
                            } ?>>16 Slot</option>
                            <option value="32" <?php if ($tournament->slot == 32) {
                                echo 'selected';
                            } ?>>32 Slot</option>
                            <option value="64" <?php if ($tournament->slot == 64) {
                                echo 'selected';
                            } ?>>64 Slot</option>
                            <option value="128" <?php if ($tournament->slot == 128) {
                                echo 'selected';
                            } ?>>128 Slot</option>
                        </select>

                    </label>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px">
                        <input
                            class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                            placeholder="Hadiah" type="number" id="price_pool" name="price_pool"
                            value="{{ $tournament->price_pool }}" />
                    </label>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-bold">Game</label>
                    <select id="countries" name="game_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih Game</option>
                        @foreach ($games as $game)
                            <option value="{{ $game->id }}" <?php if ($tournament->game_id == $game->id) {
                                echo 'selected';
                            } ?>>{{ $game->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 font-bold">Lokasi</label>
                    <select id="locationdrop" onchange="handleLocationChange" name="location"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih Lokasi</option>
                        <option value="Online" <?php if ($tournament->location == 'Online') {
                            echo 'selected';
                        } ?>>Online</option>
                        <option value="Offline" <?php if ($tournament->location != 'Online') {
                            echo 'selected';
                        } ?>>Offline</option>
                    </select>
                </div>
                @if ($tournament->location != 'Online')
                <div class="mb-4" id="address" style="display: block">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Pilih Alamat</label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Alamat" type="text" id="inputaddress" value="{{$tournament->location}}" name="address" />
                </div>
                @else
                <div class="mb-4" id="address" style="display: none">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Pilih Alamat</label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Alamat" type="text" id="inputaddress" value="{{$tournament->location}}" name="address" />
                </div>
                    
                @endif
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Biaya Pendaftaran
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Biaya" type="number" id="registration_fee" name="registration_fee" value="{{$tournament->registration_fee}}" />
                </div>
                @if ($tournament->is_open_signup == 1)
                    <div class="mb-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="0" class="sr-only peer" name="is_open_signup">
                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Tutup Pendaftaran</span>
                        </label>
                    </div>
                @else
                    <div class="mb-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="1" class="sr-only peer" name="is_open_signup">
                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Buka Pendaftaran</span>
                        </label>
                    </div>
                @endif

                @if (UserHelper::getUserRole() === UserRoleEnum::ADMIN->value)
                    <a href="{{ route('tournament.index') }}" type="button"
                        class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mb-5">
                        <span>Back</span>
                    </a>
                @else
                    <a href="{{ route('tournament-organizer.index') }}" type="button"
                        class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded mb-5">
                        <span>Back</span>
                    </a>
                @endif
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-5">
                    <span>Kirim</span>
                </button>
            </div>
        </form>

    </div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#locationdrop").change(function() {
                var selectedValue = $(this).val();
                var addressDiv = $("#address");
                var inputAddress = $("#inputaddress");

                if (selectedValue === "Offline") {
                    addressDiv.show();
                    inputAddress.attr("name", "location");
                    $("#locationdrop option[value='Offline']").text("Offline");
                } else {
                    addressDiv.hide();
                    inputAddress.attr("name", "address");
                    $("#locationdrop option[value='Offline']").text("Offline");
                }
            });
        });
    </script>
@endsection