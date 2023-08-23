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
                    <div class="blog-post-wrapper" style="width: 100%">
                        <div class="tournament__details-content">
                            <div class="">
                                <div class="tournament__details-video flex flex-col">
                                    <img src="{{ asset('assets/img/others/about_tab01.png') }}"
                                        class="rounded-full my-1 mx-auto" width="100" alt="" srcset="">
                                    <h2 class="title font-bold mx-auto my-1">{{ $user->name }}</h2>
                                    <div class="flex justify-center">
                                        <div class="my-3 flex flex-col" style="margin: 2rem">
                                            <h1 class="text-4xl mx-auto text-center">71</h1>
                                            <h6 class="mx-auto">Penampilan</h6>
                                        </div>
                                        <div class="my-3 flex flex-col" style="margin: 2rem">
                                            <h1 class="text-4xl mx-auto text-center">51</h1>
                                            <h6 class="mx-auto">3 Besar</h6>
                                        </div>
                                        <div class="my-3 flex flex-col" style="margin: 2rem">
                                            <h1 class="text-4xl mx-auto text-center">21</h1>
                                            <h6 class="mx-auto">Juara 1</h6>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-6 gap-2 my-3">
                                        <a href="" class="flex flex-col">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                class="mx-auto" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M2 20V4h20v16H2Zm10-7L4 8v10h16V8l-8 5Zm0-2l8-5H4l8 5ZM4 8V6v2Z" />
                                            </svg>
                                            <span class="mx-auto my-2">mohamadarif@gmail.com</span>
                                        </a>
                                        <a href="" class="flex flex-col">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                class="mx-auto" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z" />
                                            </svg>
                                            <span class="mx-auto my-2">Mohamad Arif</span>
                                        </a>
                                        <a href="" class="flex flex-col">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                class="mx-auto" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z" />
                                            </svg>
                                            <span class="mx-auto my-2">Mohamad Arif</span>
                                        </a>
                                        <a href="" class="flex flex-col">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                class="mx-auto" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2">
                                                    <path
                                                        d="M4 8a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4z" />
                                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 1 0-6 0m7.5-4.5v.01" />
                                                </g>
                                            </svg>
                                            <span class="mx-auto my-2">mohamadarif03</span>
                                        </a>
                                        <a href="" class="flex flex-col">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                class="mx-auto" viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="M234.33 69.52a24 24 0 0 0-14.49-16.4C185.56 39.88 131 40 128 40s-57.56-.12-91.84 13.12a24 24 0 0 0-14.49 16.4C19.08 79.5 16 97.74 16 128s3.08 48.5 5.67 58.48a24 24 0 0 0 14.49 16.41C69 215.56 120.4 216 127.34 216h1.32c6.94 0 58.37-.44 91.18-13.11a24 24 0 0 0 14.49-16.41c2.59-10 5.67-28.22 5.67-58.48s-3.08-48.5-5.67-58.48Zm-72.11 61.81l-48 32A4 4 0 0 1 108 160V96a4 4 0 0 1 6.22-3.33l48 32a4 4 0 0 1 0 6.66Z" />
                                            </svg>
                                            <span class="mx-auto my-2">Mohamad Arif</span>
                                        </a>
                                        <a href="" class="flex flex-col">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                class="mx-auto" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z" />
                                            </svg>
                                            <span class="mx-auto my-2">08658389797</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="tournament__details-form bg-[#1c242f] rounded-md p-12">
                                    <div x-data="{ activeunderTab: 'team' }">
                                        <ul
                                            class="flex flex-wrap -mb-px text-sm text-center text-white/50 dark:text-white/50 border-b border-gray-200">
                                            <li class="mr-2">
                                                <a href="javaScript:;" @click="activeunderTab = 'team'"
                                                    :class="activeunderTab === 'team' ?
                                                        'text-white border-b-2 border-white' :
                                                        'text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-[#ffbe18]'"
                                                    class="inline-block p-4">
                                                    Team
                                                </a>
                                            </li>
                                            <li class="mr-2">
                                                <a href="javaScript:;" @click="activeunderTab = 'perjalanan'"
                                                    :class="activeunderTab === 'perjalanan' ?
                                                        'text-white border-b-2 border-white' :
                                                        'text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-[#ffbe18]'"
                                                    class="inline-block p-4">
                                                    Perjalanan Karir
                                                </a>
                                            </li>
                                            <li class="mr-2">
                                                <a href="javaScript:;" @click="activeunderTab = 'pencapaian'"
                                                    :class="activeunderTab === 'pencapaian' ?
                                                        'text-white border-b-2 border-white' :
                                                        'text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-[#ffbe18]'"
                                                    class="inline-block p-4">
                                                    Pencapaian
                                                </a>
                                            </li>
                                            <li class="mr-2">
                                                <a href="javaScript:;" @click="activeunderTab = 'galery'"
                                                    :class="activeunderTab === 'galery' ?
                                                        'text-white border-b-2 border-white' :
                                                        'text-white/40 border-b-2 border-transparent rounded-t-lg hover:text-[#ffbe18]'"
                                                    class="inline-block p-4">
                                                    Galeri
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-3 text-[13px]">
                                            <div x-show="activeunderTab === 'team'" class>
                                                <div class="team grid grid-col-1 lg:grid-cols-4">
                                                    <!-- Konten tim -->

                                                    <a href="" class="loopTeam">
                                                        <div class="team__item">
                                                            <div class="team__thumb">
                                                                <div class="flex justify-center"><img src="{{asset('assets/img/blog/rc_post02.jpg')}}" height="190"
                                                                        width="190" style="min-width: 190px; min-height:190px; max-width: 190px; max-height: 190px"
                                                                        alt="img"></div>
                                                            </div>
                                                            <div class="team__content">
                                                                <h4 class="name">
                                                                    <div>
                                                                        okoko
                                                                    </div>
                                                                </h4>
                                                                <span class="designation"> epep</span>
                                                            </div>
                                                            <div class=" flex justify-around text-center gap-3 mt-2" >
                                                                <span class=" w-full text-base"> Penampilan <br> 30</span>
                                                                <span class=" w-full text-base"> 3 Besar <br> 29</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div x-show="activeunderTab === 'perjalanan'" class>
                                                <div class="perjalanan">

                                                </div>
                                            </div>
                                            <div x-show="activeunderTab === 'pencapaian'" class>
                                                <div class="pencapaian"></div>
                                            </div>
                                            <div x-show="activeunderTab === 'galery'" class>
                                                <div class="galery"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="tournament__details-form">

                            </div>
                        </div>
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

    <script src="{{ asset('dashboard_assets/js/alpine-collaspe.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/alpine-persist.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/alpine.min.js') }}" defer></script>

    <script>
        function showCard() {
            var card = document.getElementById("card");
            card.classList.remove("hidden");
            card.classList.add("opacity-100");
        }

        function hideCard() {
            var card = document.getElementById("card");
            card.classList.remove("opacity-100");
            card.classList.add("hidden");
        }
    </script>

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
