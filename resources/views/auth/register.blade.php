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
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Page-Revealer -->
    <script src="assets/js/tg-page-head.js"></script>
    <style>
        .contact-area {
            /* height: 150vh; */
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
        .contact__form-wrap form input[type="password"],
        .contact__form-wrap form input[type="text"],
        .contact__form-wrap form input[type="number"] {
            width: 100%;
            padding: 10px;
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
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row justify-content-center">

                    <div class="col-lg-6 col-md-10">
                        <img src="assets/img/gallery/gallery05.jpg" style="height: 790px; border-radius:5px"
                            alt="">
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="contact__form-wrap">
                            <div class="center" style="margin-top: 70px">
                                <h2 class="font-bold text-xl text-white" style="margin-bottom:30px; text-align:center">Daftar</h2>
                                <form action="{{ route('register') }}" method="POST" style="height: 590px;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-grp">
                                                <input name="name" type="text" value="{{ old('name') }}"
                                                    placeholder="Nama">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-grp">
                                                <input name="email" type="email" value="{{ old('email') }}"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-grp">
                                                <input name="password" type="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-grp">
                                                <input name="password_confirmation" type="password"
                                                    placeholder="Konfirmasi Password">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-grp">
                                                <input name="phone_number" type="number" placeholder="Nomor HP"
                                                    value="{{ old('phone_number') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <p class="font-bold text-xl text-white">Daftar Sebagai</p>
                                            <div class="col-md-4 mb-3">
                                                <input name="role" value="organizer"
                                                    class="checkbox_animated check-box @error('role') is-invalid @enderror"
                                                    type="radio" id="flexCheckDefault"
                                                    {{ old('role') == 'organizer' ? 'checked' : '' }}>
                                                <label for="role">Organizer</label>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <input name="role" value="member"
                                                    class="checkbox_animated check-box @error('role') is-invalid @enderror"
                                                    type="radio" id="flexCheckDefault"
                                                    {{ old('role') == 'member' ? 'checked' : '' }}>
                                                <label for="role">Member</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="">
                                                {!! htmlFormSnippet() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" style="display: flex">
                                        <div class="col-sm-6">
                                            <p style="font-size: 15px; margin:0;">Sudah Punya Akun? <a
                                                    href="{{ Route('login') }}">Masuk</a></p>
                                        </div>
                                        <div class="col-sm-6" style="display:flex; justify-content: end">
                                            <button type="submit" class="submit-btn">Daftar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- contact-area-end -->
    </main>
    <!-- main-area-end -->



    <!-- JS here -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>


<!-- Mirrored from themedox.com/demo/mykd/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:18:34 GMT -->

</html>
