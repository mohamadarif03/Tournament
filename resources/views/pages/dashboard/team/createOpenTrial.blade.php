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
        <form enctype="multipart/form-data" action="{{ route('create-open-trial') }}" class="theme-form theme-form-2 mega-form"
            method="POST">
            @csrf
            <div class="border border-black/10 dark:border-white/10 p-5 rounded-md" id="detail">
                <div class="mb-5">
                    <p class="text-xl font-bold">Tambahkan Detail</p>
                </div>

                <div class="mb-4" id="address">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Lokasi</label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Lokasi" type="text" id="" name="location" value="{{ old('location') }}" />
                    <input type="hidden" name="team_id" value="{{ $team->id }}">
                </div>
                <div class="mb-4" id="salary">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Gaji</label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                        placeholder="Gaji" type="number" id="" name="salary" value="{{ old('salary') }}" />
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Pendaftaran Berakhir
                    </label>
                    <input
                        class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                        type="datetime-local" name="close_registration" id=""
                        value="{{ old('close_registration') }}">
                </div>
                <div class="mb-4">
                    <label class="mt-1.5 flex -space-x-px font-semibold">Deskripsi
                    </label>
                    <textarea id="desc" name="desc"></textarea>
                </div>
                <div class="flex justify-between">
                    <div class=""></div>
                    <div class="">
                        <button type="button" id="btn-next"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-5">
                            <span>Selanjutnya</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="border border-black/10 dark:border-white/10 p-5 rounded-md hidden" id="question">
                <div class="mb-5">
                    <p class="text-xl font-bold">Tambahkan Pertanyaan</p>
                </div>
                <div id="question-container">
                    <div class="mb-4" id="address_1">
                        <label class="mt-1.5 flex -space-x-px font-semibold">Pertanyaan ke-1</label>
                        <input
                            class="form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                            placeholder="Pertanyaan" type="text" id="question_1" name="question[]"
                            value="{{ old('question[]') }}" />
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="">
                        <button type="button" id="btn-question" data-count="1"
                            class="bg-white hover:bg-slate-100 border-2 border-slate-700 font-bold py-2 px-3.5 rounded mb-5">
                            <span>+ Tambah Pertanyaan</span>
                        </button>
                    </div>
                    <div class="">
                        <button type="button" id="btn-back"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mb-5">
                            <span>Kembali</span>
                        </button>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-5">
                            <span>Kirim</span>
                        </button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#desc' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        $('#btn-next').click(function() {
            $('#detail').addClass('hidden');
            $('#question').removeClass('hidden');
        })
        $('#btn-back').click(function() {
            $('#question').addClass('hidden');
            $('#detail').removeClass('hidden');
        })


        $(document).ready(function() {
            let questionCount = 1;

            $("#btn-question").click(function() {
                questionCount++;

                const newQuestionDiv = $("<div>").addClass("mb-4").attr("id", "address_" + questionCount);
                const questionLabel = $("<label>").addClass("mt-1.5 flex -space-x-px font-semibold").text(
                    "Pertanyaan ke-" + questionCount);
                const questionInput = $("<input>").addClass(
                    "form-input w-full rounded-lg border border-black/10 bg-transparent px-3 py-2.5 placeholder:text-black/60"
                ).attr({
                    "type": "text",
                    "id": "question_" + questionCount,
                    "name": "question[]",
                    "placeholder": "Pertanyaan"
                });

                newQuestionDiv.append(questionLabel, questionInput);
                $("#question-container").append(newQuestionDiv);
            });
        });
    </script>
@endsection

@section('css')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
@endsection
