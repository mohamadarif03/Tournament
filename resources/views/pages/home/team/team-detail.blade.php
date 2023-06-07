<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themedox.com/demo/mykd/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:18:12 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MYKD - eSports and Gaming NFT Template</title>
    <meta name="description" content="eSports and Gaming NFT Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Page-Revealer -->
    <script src="{{ asset('assets/js/tg-page-head.js') }}"></script>
    @vite('resources/css/app.css')

</head>

<body>


    <!-- scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="flaticon-right-arrow"></i>
    </button>
    <!-- scroll-top-end-->

    <!-- header-area -->
    <header>
        @include('pages.home.layouts.header')
    </header>
    <!-- header-area-end -->



    <!-- main-area -->
    <main class="main--area">

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb__hide-img" data-background="assets/img/bg/breadcrumb_bg01.jpg">
            <div class="container">
                <div class="breadcrumb__wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb__content">
                                <h2 class="title">Tournament Details</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Tournament Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- tournament-details-area -->
        <section class="tournament__details-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="blog-post-wrapper">

                        <div class="tournament__details-content">
                            <h2 class="title font-bold">{{$team->name}}</h2>
                            <div class="blog-post-meta">
                                <ul class="list-wrap">
                                    <li>Kapten Tim : {{$team->user->name}}</li>
                                </ul>
                            </div>
                            <div class="tournament__details-video position-relative">
                                <img src="{{ asset('storage/' . $team->logo) }}" alt="live_image_url"
                                    srcset="" width="550">
                            </div>
                            <div class="tournament__details-form">
                                <p>{{$team->description}}</p>

                            </div>
                            <div class="tournament__details-form">
                                <a href="{{ route('join-team', $team->id) }}" class="tournament__details-form-btn">Gabung Tim</a>
                            </div>
                            <div class="blog-details-bottom">
                                <div class="row">
                                    <div class="col-xl-6 col-md-7">
                                        <div class="tg-post-tags">
                                            <h5 class="tags-title">kategori : {{$team->game->name}}</h5>
                                            <ul class="list-wrap d-flex flex-wrap align-items-center m-0">
                                                <li><a href=""></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-5">
                                        <div class="blog-post-share justify-content-start justify-content-md-end">
                                            <h5 class="share">share :</h5>
                                            <ul class="list-wrap">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-post-sidebar">
                        <aside class="blog-sidebar tournament__sidebar">
                            {{-- <div class="shop__widget">
                                <h4 class="shop__widget-title font-bold">Tournament Lainnya</h4>
                                <div class="shop__widget-inner">
                                    @foreach ($tournamentmore as $tournament)
                                        <div class="trending__matches-list">
                                            <div class="trending__matches-item">
                                                <div class="trending__matches-thumb">
                                                    <a href="#"><img
                                                            src="{{ asset('storage/' . $tournament->live_image_url) }}"
                                                            style="min-width: 30px min-height:20px; max-width:60px; max-height:70"
                                                            alt="img"></a>
                                                </div>
                                                <div class="trending__matches-content">
                                                    <div class="info">
                                                        <h5 class="title font-bold"><a
                                                                href="#">{{ $tournament->name }}</a></h5>
                                                        <span class="price">Rp.
                                                            {{ number_format($tournament->price_pool, 0, ',', '.') }}</span>
                                                    </div>
                                                    <div class="play">
                                                        <a href="https://www.youtube.com/watch?v=a3_o4SpV1vI"
                                                            class="popup-video"><i class="far fa-play-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                            </div> --}}
                    </div>
                        </aside>
                </div>
            </div>
            </div>
        </section>
        <!-- tournament-details-area-end -->

    </main>
    <!-- main-area-end -->


    <!-- footer-area-start -->
    <footer class="footer-style-two has-footer-animation">
        @include('pages.home.layouts.footer')
    </footer>
    <!-- footer-start-end -->



    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Add the following JavaScript code -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.streamers__pagination', {
            navigation: {
                nextEl: '.slider-button-next',
                prevEl: '.slider-button-prev',
            },
            pagination: {
                el: '.streamers__pagination-dots',
                clickable: true,
            },
        });
    </script>
    <script>
        $(document).ready(function() {
            $('button[data-bs-toggle="tab"]').on('click', function() {
                var target = $(this).data('bs-target');
                $('.tab-pane').removeClass('show active');
                $(target).addClass('show active');
            });
        });
    </script>
</body>


<!-- Mirrored from themedox.com/demo/mykd/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:18:20 GMT -->

</html>
