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
    @vite('resources/css/app.css')
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
        .ellipsis{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 150px; /* Atur lebar sesuai kebutuhan */
        }
    </style>
    <!-- Page-Revealer -->
    <script src="{{ asset('assets/js/tg-page-head.js') }}"></script>
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

        <!-- slider-area -->
        <section class="slider__area slider__bg p-5" data-background="assets/img/slider/slider_bg.jpg">
            <div class="slider-activee">
                <div class="single-slider">
                    <div class="container custom-container">
                        <div class="row justify-content-between">
                            <div class="col-lg-6 mb-5">
                                <div class="slider__content">
                                    <h6 class="sub-title wow fadeInUp sm:hidden" data-wow-delay=".1s">Detail Team</h6>
                                    <p class="wow fadeInUp" data-wow-delay=".1s">Tournament 17 Agustus </p>
                                    <div class="slider__btn wow fadeInUp" data-wow-delay="1.2s">
                                        <a href="contact.html" class="tg-btn-1"><span>Daftar</span></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="slider__shapes">
                <img src="{{asset('assets/img/slider/slider_shape01.png')}}" alt="shape">
                <img src="{{asset('assets/img/slider/slider_shape02.png')}}" alt="shape">
                <img src="{{asset('assets/img/slider/slider_shape03.png')}}" alt="shape">
                <img src="{{asset('assets/img/slider/slider_shape04.png')}}" alt="shape">
            </div>

        </section>
        <!-- slider-area-end -->
        <!-- match-result-area -->
        <section class="match__result-area">
            <div class="match__result-bg" data-background="assets/img/bg/result_bg.png"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-md-10">
                        <div class="section__title text-center mb-55">
                            <span class="sub-title tg__animate-text">slot 16/24</span>
                            <h3 class="title">tim yang terdaftar</h3>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        <h4 class="match__winner-title">Premier league</h4>
                    </div>
                </div> --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    {{-- <div class="col-xl-5 col-sm-6">
                    </div> --}}

                    @foreach ($tourteam as $item )
                        {{-- @dd($item) --}}
                        <div class="match__winner-wrap " style="display: flex;flex-direction: row;flex-wrap: nowrap;align-content: center;justify-content: space-between;align-items: center;">



                            <div class="match__winner-info " >
                                <h4 class="name  ellipsis" >{!!$tourteam->competitors[0]->id  !!}</h4>
                                <span class="price-amount  ellipsis">nama kapten</span>
                            </div>
                            <div class="match__winner-img tg-svg">
                                <div class="team-logo-img">
                                    <a href="team-details.html"><img src="{{asset('assets/img/others/win01.png')}}"
                                            alt="img"></a>
                                </div>
                                <div class="svg-icon" id="svg-3" data-svg-icon="assets/img/icons/win_shape.svg">
                                </div>
                                {{-- <h3 class="match__winner-place">win</h3> --}}
                            </div>
                        </div>
                    @endforeach
                    {{-- @dd($tourteam) --}}





                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="grand__final">
                            <h6 class="grand__final-date">December 19, 2021 | 9:50 am</h6>
                            <span class="grand__final-place">grand dubai</span>
                            <div class="grand__final-button">
                                <a href="contact.html" class="tg-btn-3 tg-svg mx-auto">
                                    <div class="svg-icon" id="svg-5" data-svg-icon="assets/img/icons/shape.svg">
                                    </div>
                                    <span>read more</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- match-result-area-end -->
    </main>
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



    <!-- Mirrored from themedox.com/demo/mykd/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:18:20 GMT -->

</html>
