@php
    use Carbon\Carbon;
@endphp
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
        <!-- tournament-area -->
        <section class="tournament-area section-pt-120 section-pb-90">
            <div class="container">
                <div class="tournament__wrapper">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-7 col-md-10">
                            <div class="section__title text-center mb-6">
                                <span class="sub-title tg__animate-text">our tournament</span>
                                <h3 class="title">play to earn games</h3>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-5 gap-3">
                        <div class="border-r-0 md:border-r-0 lg:border-r-2 border-slate-200 px-4">
                            <div class="py-3">
                                <div class="flex justify-between">
                                    <p class="font-bold text-xs mb-4 text-white">Pengaturan</p>
                                    <a href="{{ route('tournaments') }}"
                                        class="mb-4 text-xs cursor-pointer text-[#45f882] hover:text-[#ffbe18]"
                                        id="">
                                        Hapus Filter</a>
                                </div>
                                <div class="">
                                    <button type="button" id="setFilter"
                                        class="font-bold text-white bg-[#45f882] hover:bg-[#ffbe18] font-medium rounded-lg text-sm w-full px-4 py-2.5 text-center">Update
                                        Filter</button>
                                </div>
                            </div>
                            <div class="">
                                <p class="font-bold text-md my-2 text-white">Urutkan Berdasarkan</p>
                                <div class="flex my-2">
                                    <input id="orderByDate" type="radio" value="date" name="orderBy"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="orderByDate"
                                        class="font-bold ml-2 text-sm font-medium text-white">Tanggal Terbaru</label>
                                </div>
                                <div class="flex my-2">
                                    <input id="orderByPrice" type="radio" value="price" name="orderBy"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="orderByPrice"
                                        class="font-bold ml-2 text-sm font-medium text-white">Hadiah Tertinggi</label>
                                </div>

                            </div>
                            <div class="">
                                <p class="font-bold text-md my-2 text-white">Game</p>
                                @foreach ($games as $game)
                                    <div class="flex my-2">
                                        <input id="default-checkbox" type="checkbox" value="{{ $game->id }}"
                                            name="gameFilter"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                                        <label for="default-checkbox"
                                            class="font-bold ml-2 text-sm font-medium text-white">{{ $game->name }}</label>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="col-span-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 m-2 gap-12 md:ml-2 lg:ml-2">
                            @foreach ($tournamentlist as $tournament)
                                <a href="{{ route('tournament-detail', $tournament->id) }}" class="loopTournament row justify-content-center">
                                    <div class="tournament__box-wrap" style="padding-bottom: 30px">
                                        <svg class="main-bg" x="0px" y="0px" viewBox="0 0 357 533"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.00021 63H103C103 63 114.994 62.778 128 50C141.006 37.222 168.042 13.916 176 10C183.958 6.084 193 1.9 213 2C233 2.1 345 1 345 1C347.917 1.66957 350.51 3.33285 352.334 5.70471C354.159 8.07658 355.101 11.0093 355 14C355.093 25.1 356 515 356 515C356 515 357.368 529.61 343 530C328.632 530.39 15.0002 532 15.0002 532C15.0002 532 0.937211 535.85 1.00021 522C1.06321 508.15 2.00021 63 2.00021 63Z"
                                                fill="#19222B" stroke="#4C4C4C" stroke-width="0.25" />
                                        </svg>
                                        <svg class="price-bg" viewBox="0 0 166 56" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M0.00792892 55V11C0.00792892 11 -0.729072 0.988 12.0079 1C24.7449 1.012 160.008 0 160.008 0C160.008 0 172.491 1.863 161.008 10C148.995 18.512 115.008 48 115.008 48C115.008 48 110.021 55.238 90.0079 55C69.9949 54.762 0.00792892 55 0.00792892 55Z"
                                                fill="currentcolor" />
                                        </svg>
                                        <div class="tournament__box-price">
                                            <span class="sub">Slot</span>
                                            <span>{{ $tournament->slot }}</span>
                                        </div>
                                        <div class="tournament__box-countdown">
                                            <div class="coming-time font-bold text-xs">
                                                {{ \Carbon\Carbon::parse($tournament->starter_at)->format('d F Y H:i') }}
                                            </div>


                                        </div>
                                        <div class="tournament__box-caption">
                                            <h4 class="title" style="font-size: 20px">{{ $tournament->name }}
                                            </h4>
                                        </div>
                                        <ul class="tournament__box-list list-wrap mb-3">
                                            <li class="flex justify-center">
                                                <img src="{{ asset('storage/' . $tournament->live_image_url) }}"
                                                    style="min-height: 50px; min-width:100px; max-height:100px; max-width: 200px"
                                                    alt="img">
                                            </li>
                                        </ul>
                                        <div class="tournament__box-prize" style="height: 20px">
                                            <i class="fas fa-trophy"></i>
                                            <span class="text-sm">Rp.
                                                {{ number_format($tournament->price_pool, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="font-bold text-sm flex justify-center mb-2">
                                            <span
                                                class="cursor-pointer bg-[#ffbe18] text-sm font-medium px-2.5 py-0.5 rounded"
                                                style="color: white">By: {{ $tournament->user->name }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                            <div id="next-products"></div>
                            <div id="next-cursor" style="display: none">{{ $nextCursor }}</div>
                            @if ($nextCursor)
                                <div class="row" id="loadMoreContainer">
                                    <button id="btnLoadMore"
                                        class="text-center rounded-pill mt-3 btn theme-bg-color btn-sm text-white fw-bold mt-md-4 mt-2 mend-auto">
                                        Tampilkan Lebih Banyak..
                                    </button>
                                </div>
                            @endif
                        </div>



                    </div>
                </div>
            </div>
        </section>
        <!-- tournament-area-end -->
    </main>
    <!-- main-area-end -->


    <!-- footer-area-start -->
    <footer class="footer-style-two has-footer-animation">
        @include('pages.home.layouts.footer')
    </footer>
    <!-- footer-start-end -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('button[data-bs-toggle="tab"]').on('click', function() {
                var target = $(this).data('bs-target');
                $('.tab-pane').removeClass('show active');
                $(target).addClass('show active');
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#delete-filter').on('click', function() {
                location.reload();
            });
        });
    </script> --}}
    <script>
        $(document).ready(() => {

            let url = window.location.href
            let games = []
            let orderBy = []
            let search = $('#inputSearch').val() || null

            const displaySearchLabel = (search) => {
                $('#searchLabelContainer').css('display', 'block')
                $('#searchLabel').text('Kata Kunci Pencarian: ' + search)
            }

            if (search) {
                displaySearchLabel(search)
            }

            const infiniteLoadMore = (nextCursor) => {
                search = $('#inputSearch').val() || null

                if (search) {
                    displaySearchLabel(search)
                } else {
                    $('#searchLabelContainer').css('display', 'none')
                }

                $.ajax({
                    url: url + "?cursor=" + nextCursor,
                    responseType: "json",
                    method: 'get',
                    data: {
                        nextCursor: nextCursor,
                        games: games,
                        orderBy: orderBy[0],
                        search: search
                    },
                    success: (response) => {
                        document.getElementById('next-products').insertAdjacentHTML('beforebegin',
                            response.data.html)
                        document.getElementById('next-cursor').innerHTML = response.data.nextCursor

                        if (response.data.nextCursor == null || Object.keys(response.data
                                .nextCursor).length === 0) {
                            $('#loadMoreContainer').css('display', 'none')
                        } else {
                            $('#loadMoreContainer').css('display', 'block')
                        }
                    },
                    error: (err) => {
                        console.log(err)
                    }
                })
            }

            $('#btnLoadMore').on('click', function(e) {
                e.preventDefault()
                let nextCursor = document.getElementById('next-cursor').innerHTML || null
                if (nextCursor) infiniteLoadMore(nextCursor);

            })

            $('#setFilter').on('click', function(e) {
                e.preventDefault()

                games = []
                orderBy = []
                search = $('#inputSearch').val() || null

                if (search) {
                    displaySearchLabel(search)
                } else {
                    $('#searchLabelContainer').css('display', 'none')
                }

                let gameCheck = document.querySelectorAll('input[name=gameFilter]:checked')

                for (let i = 0; i < gameCheck.length; i++) {
                    if (gameCheck[i].value !== "on") {
                        games.push(gameCheck[i].value)
                        console.log(gameCheck);
                    }
                }

                let orderCheck = document.querySelectorAll('input[name=orderBy]:checked')

                for (let i = 0; i < orderCheck.length; i++) {
                    if (orderCheck[i].value == "date") {
                        orderBy.push(orderCheck[i].value)
                    } else if (orderCheck[i].value == "price") {
                        orderBy.push(orderCheck[i].value)
                    }
                }

                $.ajax({
                    url: url,
                    responseType: "json",
                    method: 'get',
                    data: {
                        games: games,
                        orderBy: orderBy[0],
                        search: search,
                    },
                    success: (response) => {
                        $('.loopTournament').remove()
                        document.getElementById('next-products').insertAdjacentHTML(
                            'beforebegin', response.data.html)
                        document.getElementById('next-cursor').innerHTML = response.data
                            .nextCursor

                        if (response.data.nextCursor == null || Object.keys(response.data
                                .nextCursor).length === 0) {
                            $('#loadMoreContainer').css('display', 'none')
                        } else {
                            $('#loadMoreContainer').css('display', 'block')
                        }
                    },
                    error: (err) => {
                        console.log(err.responseText)
                    }
                })
            })
        })
    </script>
</body>


<!-- Mirrored from themedox.com/demo/mykd/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:18:20 GMT -->

</html>
