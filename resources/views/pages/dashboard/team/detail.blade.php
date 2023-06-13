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
                            Terima Pengguna
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
                                        <td><a href="{{ asset('storage/' . $teamOpenTrial->cv) }}" target="_blank"><button
                                                    type="button"
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
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-800 text-white mr-3 font-bold py-2 px-4 rounded mb-5 cursor-pointer">
                                                    Tolak
                                                </button>
                                            </form>
                                            {{-- <button type="button" data-modal-target="staticModal" onclick="show{{$teamOpenTrial->id}}" id="btn-show-{{$teamOpenTrial->id}}"
                                                data-modal-toggle="staticModal"
                                                class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded mb-5 cursor-pointer ">
                                                Detail
                                            </button> --}}
                                            {{-- <a href="{{ route('detail-join-open-trial', $openTrials->id) }}"
                                                onclick="show{{ $openTrials->id }}" id="btn-show-{{ $openTrials->id }}"
                                                class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded mb-5 cursor-pointer ">
                                                Detail
                                            </a> --}}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Main modal -->
                    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Static modal
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="staticModal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        With less than a month to go before the European Union enacts new consumer privacy
                                        laws for its citizens, companies around the world are updating their terms of
                                        service agreements to comply.
                                    </p>
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">

                                    </p>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="staticModal" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                        accept</button>
                                    <button data-modal-hide="staticModal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        function show(id) {
            var question = $('#btn-show-' + id).data('question');
            $('#show-question').text(question);
            $('#show-id').val(id);
            showQuestion(id); // Panggil fungsi untuk menampilkan deskripsi
        }

        function showQuestion(id) {
            $.ajax({
                url: '/detail-join-open-trial/' + id,
                type: 'GET',
                success: function(response) {
                    $('#staticModal .text-xl').text(response.title);
                    $('#staticModal .text-gray-500:eq(0)').text(response.description1);
                    $('#staticModal .text-gray-500:eq(1)').text(response.description2);
                    $('#staticModal').show();
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
@endsection
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
@endsection
