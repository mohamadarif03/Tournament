<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themedox.com/demo/mykd/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:18:34 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MYKD - eSports and Gaming NFT Template</title>
    <meta name="description" content="eSports and Gaming NFT Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Page-Revealer -->
    <script src="{{ asset('assets/js/tg-page-head.js') }}"></script>
    <style>
        .contact-area {
            /* padding: 13px 0px; */
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact__form-wrap {
            background-color: #2c3137;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact__form-wrap form {
            margin-top: 20px;
        }

        .contact__form-wrap form .row {
            margin-bottom: 20px;
        }

        .contact__form-wrap form .input-grp {
            position: relative;
        }

        .contact__form-wrap form input[type="email"],
        .contact__form-wrap form input[type="text"],
        .contact__form-wrap form input[type="number"],
        .contact__form-wrap form input[type="file"] {
            width: 100%;
            border-radius: 5px;
            outline: none;
        }

        .contact__form-wrap form button.submit-btn {
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        @media (max-width: 991px) {
            .col-lg-6 img {
                display: none;
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body>

    <!-- header-area -->
    <header>
        @include('pages.home.layouts.header')
    </header>
    <!-- header-area-end -->

    <!-- main-area -->
    <main class="main--area">
        <!-- contact-area -->


        <section class="contact-area">
            <div class="container">
                @if (session('status'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <ul data-te-stepper-init
                        class="relative m-0 flex list-none justify-between overflow-hidden p-0 transition-[height] duration-200 ease-in-out">
                        <!--First item-->

                        <li data-te-stepper-step-ref class="w-[4.5rem] flex-auto">
                            <div data-te-stepper-head-ref id="div-stepper-1"
                                class="flex cursor-pointer items-center leading-[1.3rem] no-underline before:mr-2 before:h-px before:w-full before:flex-1 before:bg-[#e0e0e0] before:content-[''] after:ml-2 after:h-px after:w-full after:flex-1 after:bg-[#e0e0e0] after:content-['']">
                                <span data-te-stepper-head-icon-ref id="stepper-1"
                                    class="my-6 mr-2 flex h-[55px] w-[55px] items-center justify-center rounded-md bg-[#ffbe18] text-sm font-bold text-white">
                                    1
                                </span>
                            </div>
                        </li>
                        <li data-te-stepper-step-ref class="w-[4.5rem] flex-auto">
                            <div data-te-stepper-head-ref id="div-stepper-2"
                                class="flex cursor-pointer items-center leading-[1.3rem] no-underline before:mr-2 before:h-px before:w-full before:flex-1 before:bg-[#e0e0e0] before:content-[''] after:ml-2 after:h-px after:w-full after:flex-1 after:bg-[#e0e0e0] after:content-['']">
                                <span data-te-stepper-head-icon-ref id="stepper-2"
                                    class="my-6 mr-2 flex h-[55px] w-[55px] items-center justify-center rounded-md bg-[#ffbe18] text-sm font-bold text-white">
                                    2
                                </span>
                            </div>
                        </li>


                    </ul>
                    <form action="{{ route('register-join-team') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="">
                            <div class="contact__form-wrap col-span-8" id="biodata">
                                <div class="center" style="">
                                    <h2 class="title font-bold text-2xl" style="margin-bottom:30px; text-align:center">
                                        Gabung Team</h2>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21;">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Biodata</h2>
                                        <div class="">
                                            <input type="hidden" name="team_id" value="{{$team->id}}">
                                            <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                            </h1>
                                            <div class="input-grp">
                                                <input name="name" type="text" value="{{ old('name') }}"
                                                    placeholder="Masukkan Nama Anda" style="border: 1px solid #ccc;">
                                            </div>
                                        </div>
                                        <div class="">
                                            <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Alamat
                                                Email
                                            </h1>
                                            <div class="input-grp">
                                                <input name="email" type="email" value="{{ old('email') }}"
                                                    placeholder="Masukkan Email Anda" style="border: 1px solid #ccc;">
                                            </div>
                                        </div>
                                        <div class="">
                                            <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nomor HP
                                            </h1>
                                            <div class="input-grp">
                                                <input name="phone_number" type="number"
                                                    value="{{ old('phone_number') }}" placeholder="Masukkan Nomor HP"
                                                    style="border: 1px solid #ccc;">
                                            </div>
                                        </div>
                                        <div class="">
                                            <h1 for="title" style="font-weight: bold; margin-bottom: 5px">CV
                                            </h1>
                                            <div class="input-grp">
                                                <input
                                                    class="form-input w-full rounded-lg border border-black/10 dark:border-white/10 bg-transparent px-3 py-2.5 placeholder:text-black/60 dark:placeholder:text-white/60 hover:z-10 hover:border-black dark:hover:border-white focus:z-10 focus:border-black dark:focus:border-white"
                                                    placeholder="CV" type="file" id="cv" name="cv" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="">
                                        </div>
                                        <div class="">
                                            <button type="button" id="next_biodata"
                                                class="tournament__details-form-btn bg-[#45f882] text-white">Selanjutnya</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact__form-wrap col-span-8 hidden" id="interview">
                                <div class="center" style="">
                                    <h2 class="title font-bold text-2xl" style="margin-bottom:30px; text-align:center">
                                        Gabung Tim</h2>
                                    @foreach ($openTrials->openTrialQuestions as $openTrial)
                                        <div class="">
                                            <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                {{ $openTrial->question }}
                                            </h1>
                                            <div class="input-grp">
                                                <input name="answer[]" type="text" value=""
                                                    placeholder="{{ $openTrial->question }}"
                                                    style="border: 1px solid #ccc;">
                                                <input type="hidden" name="open_trial_question_id[]"
                                                    value="{{ $openTrial->id }}">
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="flex justify-between">
                                        <div class=""></div>
                                        <div class="">
                                            <button type="button" id="back_interview"
                                                class="tournament__details-form-btn bg-[#ffbe18] text-white hover:bg-[#FF8400] mr-4">Kembali</button>
                                            <button type="submit"
                                                class="tournament__details-form-btn bg-[#45f882] text-white">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </section>


        <!-- contact-area-end -->
    </main>
    <!-- main-area-end -->



    <!-- JS here -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        $('#next_biodata').click(function() {
            $('#biodata').addClass('hidden');
            $('#interview').removeClass('hidden');
            $('#stepper-1').addClass('bg-[#45f882]');
            $('#stepper-1').removeClass('bg-[#ffbe18]');
        })
        $('#div-stepper-1').click(function() {
            $('#interview').addClass('hidden');
            $('#biodata').removeClass('hidden');
            $('#stepper-1').addClass('bg-[#ffbe18]');
            $('#stepper-1').removeClass('bg-[#45f882]');
        })
        $('#div-stepper-2').click(function() {
            $('#biodata').addClass('hidden');
            $('#interview').removeClass('hidden');
            $('#stepper-1').addClass('bg-[#45f882]');
            $('#stepper-1').removeClass('bg-[#ffbe18]');
        })
        $('#back_interview').click(function() {
            $('#interview').addClass('hidden');
            $('#biodata').removeClass('hidden');
            $('#stepper-1').addClass('bg-[#ffbe18]');
            $('#stepper-1').removeClass('bg-[#45f882]');
        })
    </script>
</body>


<!-- Mirrored from themedox.com/demo/mykd/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:18:34 GMT -->

</html>
