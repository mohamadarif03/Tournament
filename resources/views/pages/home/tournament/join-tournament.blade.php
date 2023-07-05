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
        .contact__form-wrap form input[type="password"] {
            width: 100%;
            /* padding: 10px; */
            border-radius: 5px;
            border: 1px solid #ccc;
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
                    <div class="grid grid-cols-12 gap-3">
                        <div class="blog-post-wrapper col-span-4 w-full">
                            <div class="tournament__details-content" style="background-color: #2c3137">
                                <h2 class="title font-bold">{{ $tournament->name }}</h2>
                                <div class="blog-post-meta">
                                    <ul class="list-wrap">
                                        <li>By<a href="#">{{ $tournament->user->name }}</a></li>
                                    </ul>
                                </div>
                                <div class="tournament__details-video position-relative">
                                    <img src="{{ asset('storage/' . $tournament->live_image_url) }}"
                                        alt="live_image_url" srcset="" width="750">
                                </div>
                                <div class="tournament__details-form">
                                    <p>{{ $tournament->description }}</p>

                                </div>
                            </div>
                        </div>
                        <div class="contact__form-wrap col-span-8">
                            <form action="{{ route('register-tournament') }}" method="POST">
                                <div class="center" style="">
                                    <h2 class="title font-bold text-2xl" style="margin-bottom:30px; text-align:center">
                                        Gabung Tournament</h2>
                                    @csrf
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21;">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Teams</h2>
                                        <div class="">
                                            <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama Team
                                            </h1>
                                            <select id="team_id" name="team_id"
                                                class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                style="border: 1px solid #23292f; padding: 15px 30px;">
                                                <option selected>Pilih Team</option>
                                                @foreach ($teams as $team)
                                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="tournament_id" id="tournament_id"
                                                value="{{ $tournament->id }}">
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 1 [Kapten]</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="position[]">
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 2</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="position[]">
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 3</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="position[]">
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 4</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="position[]">
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 5</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 6 [Cadangan]</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 7 [Cadangan]</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 8 [Cadangan]</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 9 [Cadangan]</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card p-6 my-[50px]" style="background-color: #1b1e21; ">
                                        <h2 class="title font-bold text-2xl"
                                            style="margin-bottom:30px; text-align:center">
                                            Pemain 10 [Cadangan]</h2>
                                        <div class="">
                                            <div class="mb-6">
                                                <h1 for="title" style="font-weight: bold; margin-bottom: 5px">Nama
                                                    Pemain
                                                </h1>
                                                <select id="user_id" name="user_id[]"
                                                    class="bg-[#0f161b] text-white text-sm rounded-lg block w-full p-2.5"
                                                    style="border: 1px solid #23292f; padding: 15px 30px;">
                                                    <option selected>Pilih Pemain</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Nick Name
                                                    </h1>
                                                    <input name="nickname" type="text" placeholder="Nick Name">
                                                </div>
                                                <div class="input-grp">
                                                    <h1 for="title" style="font-weight: bold; margin-bottom: 5px">
                                                        Game Id
                                                    </h1>
                                                    <input name="id_game" type="text" placeholder="Game Id">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        type="submit"class="tournament__details-form-btn bg-[#45f882]">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- contact-area-end -->
    </main>
    <!-- main-area-end -->


    @if (session('slotpenuh'))
        <script>
            alert('{{ session('slotpenuh') }}');
        </script>
    @endif


    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>


<!-- Mirrored from themedox.com/demo/mykd/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:18:34 GMT -->

</html>
