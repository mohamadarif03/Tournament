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
                        <a href="javaScript:;" @click="activeunderTab = 'settings'"
                            :class="activeunderTab === 'settings' ?
                                'text-black border-b-2 border-black dark:text-white dark:border-white' :
                                'text-black/40 dark:text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-black dark:hover:text-white hover:border-black dark:hover:border-white'"
                            class="inline-block p-4">
                            Settings
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
                                <a href="{{ route('open-trial', $team->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded ml-3">
                                    Buka Pendaftaran
                                </a>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="my-5">
                                <p class="my-3"><b>Deskripsi:</b> {!! $openTrials->desc !!}</p>
                                <p class="my-3"><b>Pendaftaran Ditutup:
                                    </b>{{ date('d F Y H:i', strtotime($openTrials->close_registration)) }}</p>
                                <p class="my-3"><b>Lokasi: </b>{{ $openTrials->location }}</p>
                                <p class="my-3"><b>Gaji:
                                    </b>{{ 'Rp ' . number_format($openTrials->salary, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="my-5">
                                @foreach ($openTrialQuestions as $openTrialQuestion)
                                    <p>{{ $openTrialQuestion->question }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div x-show="activeunderTab === 'settings'" class>
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                            roots in a piece of classical Latin literature from 45 BC, making it over
                            2000 years old. Richard McClintock, a Latin
                            professor at Hampden-Sydney College in Virginia, looked up one of the more
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
