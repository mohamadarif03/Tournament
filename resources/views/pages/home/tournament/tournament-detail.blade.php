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
                            <h2 class="title font-bold">{{ $tournament->name }}</h2>
                            <div class="blog-post-meta">
                                <ul class="list-wrap">
                                    <li>By<a href="#">{{ $tournament->user->name }}</a></li>
                                    <li>
                                        <i class="far fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($tournament->completed_at)->format('d F Y H:i') }}
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" style="color: #45f882" class="bi bi-gift"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z" />
                                        </svg><a
                                            href="#">{{ number_format($tournament->price_pool, 0, ',', '.') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tournament__details-video position-relative">
                                <img src="{{ asset('storage/' . $tournament->live_image_url) }}" alt="live_image_url"
                                    srcset="" width="750">
                            </div>
                            <div class="tournament__details-form">
                                <div class="flex">
                                    <div class="font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-geo-alt mr-2" viewBox="0 0 16 16">
                                            <path
                                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                            <path
                                                d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        </svg>
                                    </div>
                                    <div class="font-bold">
                                        {{ $tournament->location }}
                                    </div>
                                </div>
                            </div>
                            <div class="tournament__details-form">
                                <p>{{ $tournament->description }}</p>
                            </div>
                            @if ($countTournament->competitor_count <= $countTournament->slot)
                                <div class="tournament__details-form">
                                    <a href="{{ route('join-tournament', $tournament->id) }}"
                                        class="tournament__details-form-btn">Gabung Tournament</a>
                                </div>
                            @else
                            <a href="{{ route('join-tournament', $tournament->id) }}"
                                class="tournament__details-form-btn">Gabung Tournament</a>
                            <div class="tournament__details-form">
                                <button class="tournament__details-form-btn" disabled style="cursor: not-allowed; background-color:red; color:white;">Slot Sudah Penuh</button>
                            </div>
                            @endif
                            <div class="blog-details-bottom">
                                <div class="row">
                                    <div class="col-xl-6 col-md-7">
                                        <div class="tg-post-tags">
                                            <h5 class="tags-title">kategori :</h5>
                                            <ul class="list-wrap d-flex flex-wrap align-items-center m-0">
                                                <li><a href="">{{ $tournament->game->name }}</a></li>
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
                            <div class="shop__widget">
                                <h4 class="shop__widget-title font-bold">Tournament Lainnya</h4>
                                <div class="shop__widget-inner">
                                    <div class="trending__matches-list">
                                        @foreach ($tournamentmore as $tournament)
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
                                </div>
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
