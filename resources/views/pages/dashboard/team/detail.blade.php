@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="container">

        <div class="border border-black/10 dark:border-white/10 p-5 rounded-md">
            <div class="mb-4">
                <p class="text-sm font-semibold">Team: {{ $team->name }}</p>
            </div>
            <div x-data="{ activeunderTab: 'detail' }">
                <ul
                    class="flex flex-wrap -mb-px text-sm text-center text-black/50 dark:text-white/50 border-b border-gray-200">
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeunderTab = 'detail'"
                            :class="activeunderTab === 'detail' ?
                                'text-black border-b-2 border-black dark:text-white dark:border-white' :
                                'text-black/40 dark:text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-black dark:hover:text-white hover:border-black dark:hover:border-white'"
                            class="inline-block p-4">
                            Detail
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeunderTab = 'pendaftaran'"
                            :class="activeunderTab === 'pendaftaran' ?
                                'text-black border-b-2 border-black dark:text-white dark:border-white' :
                                'text-black/40 dark:text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-black dark:hover:text-white hover:border-black dark:hover:border-white'"
                            class="inline-block p-4">
                            Pendaftaran
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeunderTab = 'acc_user'"
                            :class="activeunderTab === 'acc_user' ?
                                'text-black border-b-2 border-black dark:text-white dark:border-white' :
                                'text-black/40 dark:text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-black dark:hover:text-white hover:border-black dark:hover:border-white'"
                            class="inline-block p-4">
                            Terima User
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeunderTab = 'contacts'"
                            :class="activeunderTab === 'contacts' ?
                                'text-black border-b-2 border-black dark:text-white dark:border-white' :
                                'text-black/40 dark:text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-black dark:hover:text-white hover:border-black dark:hover:border-white'"
                            class="inline-block p-4">
                            Contacts
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-3 text-[13px]">
                    <div x-show="activeunderTab === 'detail'" class>
                        <div class="flex">
                            <div class="">
                                <img src="{{ asset('storage/' . $team->logo) }}" width="150" alt="">
                            </div>
                            <div class="" style="margin-left: 30px">
                                <p>{{ $team->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div x-show="activeunderTab === 'pendaftaran'" class>
                        <div class="flex justify-between mx-3 my-3">
                            <div class=""></div>
                            <div class="">
                                @if ($openTrials != null)
                                    <a href="{{ route('edit-open-trial', $openTrials->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded ml-3">
                                        Edit Pendaftaran
                                    </a>
                                @else
                                    <a href="{{ route('open-trial', $team->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded ml-3">
                                        Buka Pendaftaran
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            @if ($openTrials == null)
                            @else
                                <div class="my-5 col-span-1">
                                    <p class="my-3"><b>Deskripsi:</b> {!! $openTrials->desc !!}</p>
                                    <p class="my-3"><b>Pendaftaran Ditutup:
                                        </b>{{ date('d F Y H:i', strtotime($openTrials->close_registration)) }}</p>
                                    <p class="my-3"><b>Lokasi: </b>{{ $openTrials->location }}</p>
                                    <p class="my-3"><b>Gaji:
                                        </b>{{ 'Rp ' . number_format($openTrials->salary, 0, ',', '.') }}
                                    </p>
                                </div>
                            @endif
                            <div class="my-5 col-span-1">
                                @foreach ($openTrialQuestions as $index => $openTrialQuestion)
                                    <div class="">
                                        <h1 class="font-bold my-3">Pertanyaan ke-{{ $index + 1 }}</h1>
                                        <p>{{ $openTrialQuestion->question }}</p>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div x-show="activeunderTab === 'acc_user'" class>
                        <p>
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor HP</th>
                                    <th>CV</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teamOpenTrials as $teamOpenTrial)
                                    <tr>
                                        <td>{{ $teamOpenTrial->name }}</td>
                                        <td>{{ $teamOpenTrial->email }}</td>
                                        <td>{{ $teamOpenTrial->phone_number }}</td>
                                        <td><a href="{{ asset('storage/' . $teamOpenTrial->cv) }}" target="_blank"><button type="button"
                                            class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-2 px-4 mr-3 rounded mb-5 cursor-pointer">
                                            Lihat CV
                                        </button></a></td>
                                        <td class="flex">
                                            <form onsubmit="return confirm('Yakin Ingin Menerima Player Ini?')"
                                                method="POST" action="{{ route('acc-player-join-team') }}">
                                                @csrf
                                                <input type="hidden" name="team_id" value="{{ $teamOpenTrial->team_id }}">
                                                <input type="hidden" name="user_id" value="{{ $teamOpenTrial->user_id }}">
                                                <button type="submit"
                                                    class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 mr-3 rounded mb-5 cursor-pointer">
                                                    Terima
                                                </button>
                                            </form>
                                            <form onsubmit="return confirm('Yakin Ingin Menolak Player Ini?')"
                                                method="POST"
                                                action="{{ route('reject-player-join-team', $teamOpenTrial->id) }}">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="status" value="0">
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-800 text-white mr-3 font-bold py-2 px-4 rounded mb-5 cursor-pointer">
                                                    Tolak
                                                </button>
                                            </form>
                                            <button type="button"
                                                class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded mb-5 cursor-pointer ">
                                                Detail
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </p>
                    </div>
                    <div x-show="activeunderTab === 'contacts'" class>
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the
                            majority have suffered alteration in some form, by injected humour, or
                            randomised words which don't look even slightly
                            believable.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('js')
    
@endsection
