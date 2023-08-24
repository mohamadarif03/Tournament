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
        .contact__form-wrap form input[type="password"] {
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
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <section class="gallery__area fix section-pb-130">
                            <div class="gallery__slider">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-lg-10 col-md-11">
                                            <div class="swiper-container gallery-active">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="gallery__item ">
                                                            <div class="about__funFact-images">

                                                                <a  href="assets/img/gallery/gallery02.jpg" data-cursor="-theme" data-cursor-text="View <br> Image" class="popup-image flex items-center" style="background-image: url('assets/img/gallery/gallery02.jpg'); background-size: cover; background-position: center; height: 500px;" title="Assassin's Creed">
                                                                   
                                                                </a>
                                                            </div>
                                                            <div class="gallery__content mt-5">
                                                                <h3 class="title">Assassin's Creed</h3>
                                                                <span class="rate">rate 65%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="gallery__item ">
                                                            <div class="about__funFact-images">

                                                                <a  href="assets/img/gallery/gallery02.jpg" data-cursor="-theme" data-cursor-text="View <br> Image" class="popup-image flex items-center" style="background-image: url('assets/img/gallery/gallery02.jpg'); background-size: cover; background-position: center; height: 500px;" title="Assassin's Creed">
                                                                   
                                                                </a>
                                                            </div>
                                                            <div class="gallery__content mt-5">
                                                                <h3 class="title">Assassin's Creed</h3>
                                                                <span class="rate">rate 65%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="gallery__item ">
                                                            <div class="about__funFact-images">

                                                                <a  href="assets/img/gallery/gallery02.jpg" data-cursor="-theme" data-cursor-text="View <br> Image" class="popup-image flex items-center" style="background-image: url('assets/img/gallery/gallery02.jpg'); background-size: cover; background-position: center; height: 500px;" title="Assassin's Creed">
                                                                   
                                                                </a>
                                                            </div>
                                                            <div class="gallery__content mt-5">
                                                                <h3 class="title">Assassin's Creed</h3>
                                                                <span class="rate">rate 65%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="gallery__item ">
                                                            <div class="about__funFact-images">

                                                                <a  href="assets/img/gallery/gallery02.jpg" data-cursor="-theme" data-cursor-text="View <br> Image" class="popup-image flex items-center" style="background-image: url('assets/img/gallery/gallery02.jpg'); background-size: cover; background-position: center; height: 500px;" title="Assassin's Creed">
                                                                   
                                                                </a>
                                                            </div>
                                                            <div class="gallery__content mt-5">
                                                                <h3 class="title">Assassin's Creed</h3>
                                                                <span class="rate">rate 65%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="gallery__item ">
                                                            <div class="about__funFact-images">

                                                                <a  href="assets/img/gallery/gallery02.jpg" data-cursor="-theme" data-cursor-text="View <br> Image" class="popup-image flex items-center" style="background-image: url('assets/img/gallery/gallery02.jpg'); background-size: cover; background-position: center; height: 500px;" title="Assassin's Creed">
                                                                   
                                                                </a>
                                                            </div>
                                                            <div class="gallery__content mt-5">
                                                                <h3 class="title">Assassin's Creed</h3>
                                                                <span class="rate">rate 65%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="gallery__item ">
                                                            <div class="about__funFact-images">

                                                                <a  href="assets/img/gallery/gallery02.jpg" data-cursor="-theme" data-cursor-text="View <br> Image" class="popup-image flex items-center" style="background-image: url('assets/img/gallery/gallery02.jpg'); background-size: cover; background-position: center; height: 500px;" title="Assassin's Creed">
                                                                   
                                                                </a>
                                                            </div>
                                                            <div class="gallery__content mt-5">
                                                                <h3 class="title">Assassin's Creed</h3>
                                                                <span class="rate">rate 65%</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- scrollbar -->
                                                <div class="swiper-scrollbar"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <div class="contact__form-wrap">
                            <div class="center" style="margin-top: 70px">
                                <h2 class="font-bold text-2xl" style="margin-bottom:30px; text-align:center">Masuk</h2>
                                <form action="{{ route('login') }}" method="POST" style="height: 345px;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-grp">
                                                <input name="email" type="email" value="{{ old('email') }}"
                                                    placeholder="Masukkan Email Anda">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-grp">
                                                <input name="password" type="password" placeholder="Password">
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
                                            <p style="font-size: 15px; margin:0;">Belum Punya Akun? <a
                                                    href="{{ Route('register') }}">Daftar</a></p>
                                            @if (Route::has('password.request'))
                                                <p style="font-size: 15px; margin:0;">Lupa Kata Sandi? <a
                                                        href="{{ route('password.request') }}">Reset Kata Sandi</a></p>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-sm-6" style="display:flex; justify-content: end">
                                            <button type="submit" class="submit-btn">Masuk</button>
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
