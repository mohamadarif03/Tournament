<!DOCTYPE html>
<html x-data="main" class :class="[$store.app.mode]">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Tailwind CSS Admin & Dashboard Template" />
    <meta name="author" content="ThemesBoss" />

    <title>Snow - Tailwind CSS Admin & Dashboard Template</title>

    <link rel="shortcut icon" href="{{ asset('dashboard_assets/images/favicon.ico') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_assets/css/style.css') }}" />

    @yield('css')
</head>

<body x-data="main"
    class="antialiased relative font-inter bg-white dark:bg-black text-black dark:text-white text-sm font-normal overflow-x-hidden vertical"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.rightsidebar ? 'right-sidebar' : '', $store.app.menu, $store
        .app.layout
    ]">

    <div x-cloak class="fixed inset-0 bg-[black]/60 z-40 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        @click="$store.app.toggleSidebar()"></div>


    <div x-cloak class="fixed inset-0 bg-[black]/60 z-50 2xl:hidden" :class="{ 'hidden': !$store.app.rightsidebar }"
        @click="$store.app.rightSidebar()"></div>


    <div class="main-container navbar-sticky flex" :class="[$store.app.navbar]">

        <nav
            class="sidebar fixed top-0 bottom-0 z-40 flex-none w-[212px] border-r border-black/10 dark:border-white/10 transition-all duration-300">
            @include('pages.dashboard.layouts.sidebar')
        </nav>


        <div class="main-content flex-1">

            <div class="border-b border-black/10 dark:border-white/10 py-[22px] px-7 flex items-center justify-between">
                @include('pages.dashboard.layouts.topbar')
            </div>


            <div class="h-[calc(100vh-73px)] overflow-y-auto overflow-x-hidden">
                <div x-data="sales" class="p-4 sm:p-7 min-h-[calc(100vh-145px)]">
                    @yield('content')
                </div>

                <footer
                    class="p-7 bg-white dark:bg-black flex flex-wrap items-center justify-center sm:justify-between gap-3">
                    @include('pages.dashboard.layouts.footer')
                </footer>

            </div>

        </div>


        <div
            class="right-sidebar fixed right-0 bg-white dark:bg-black bottom-0 z-50 w-[280px] border-l border-black/10 dark:border-white/10 transition-all duration-300">
            <div class="flex flex-col gap-9 px-6 py-[22px] h-screen overflow-y-auto overflow-x-hidden">
                <div>
                    <h4 class="font-semibold text-black dark:text-white mb-5">Notifications</h4>
                    <div class="flex flex-col gap-4">
                        <div class="flex gap-2">
                            <div class="h-6 w-6 flex-none p-1 text-black bg-lightblue-100 rounded-lg">
                                <svg width="32" height="32" class="w-4 h-4" viewbox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6 13C6 13 6 10.9662 6.78626 9.10724C6.78626 9.10724 7.54538 7.31249 8.92893 5.92893C8.92893 5.92893 10.3125 4.54538 12.1072 3.78626C12.1072 3.78626 13.9662 3 16 3C16 3 18.0338 3 19.8928 3.78626C19.8928 3.78626 21.6875 4.54538 23.0711 5.92893C23.0711 5.92893 24.4546 7.31249 25.2137 9.10724C25.2137 9.10724 26 10.9662 26 13V19C26 19 26 21.0338 25.2137 22.8928C25.2137 22.8928 24.4546 24.6875 23.0711 26.0711C23.0711 26.0711 21.6875 27.4546 19.8928 28.2137C19.8928 28.2137 18.0338 29 16 29C16 29 13.9662 29 12.1072 28.2137C12.1072 28.2137 10.3125 27.4546 8.92893 26.0711C8.92893 26.0711 7.54538 24.6875 6.78626 22.8928C6.78626 22.8928 6 21.0338 6 19V13ZM8 13V19C8 19 8 22.3137 10.3431 24.6569C10.3431 24.6569 12.6863 27 16 27C16 27 19.3137 27 21.6569 24.6569C21.6569 24.6569 24 22.3137 24 19V13C24 13 24 9.68629 21.6569 7.34315C21.6569 7.34315 19.3137 5 16 5C16 5 12.6863 5 10.3431 7.34315C10.3431 7.34315 8 9.68629 8 13Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M25 18H28C28.5523 18 29 17.5523 29 17C29 16.4477 28.5523 16 28 16H25C24.4477 16 24 16.4477 24 17C24 17.5523 24.4477 18 25 18Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M4 18H7C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16H4C3.44772 16 3 16.4477 3 17C3 17.5523 3.44772 18 4 18Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M4 22H7.225C7.77728 22 8.225 21.5523 8.225 21C8.225 20.4477 7.77728 20 7.225 20H4C3.44772 20 3 20.4477 3 21C3 21.5523 3.44772 22 4 22Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M4 14H28C28.5523 14 29 13.5523 29 13C29 12.4477 28.5523 12 28 12H4C3.44772 12 3 12.4477 3 13C3 13.5523 3.44772 14 4 14Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M15 17V28C15 28.5523 15.4477 29 16 29C16.5523 29 17 28.5523 17 28V17C17 16.4477 16.5523 16 16 16C15.4477 16 15 16.4477 15 17Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M24.775 22H28C28.5523 22 29 21.5523 29 21C29 20.4477 28.5523 20 28 20H24.775C24.2227 20 23.775 20.4477 23.775 21C23.775 21.5523 24.2227 22 24.775 22Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M6.2989 4.22515L9.2739 7.05015C9.45973 7.22661 9.70622 7.325 9.96249 7.325L9.96437 7.325L9.98834 7.32467C10.2535 7.31781 10.505 7.20591 10.6876 7.01359C10.8641 6.82776 10.9625 6.58127 10.9625 6.325L10.9625 6.32312L10.9622 6.29915C10.9553 6.03402 10.8434 5.78247 10.6511 5.59985L7.67608 2.77485C7.49024 2.59839 7.24376 2.5 6.98749 2.5L6.96163 2.50033C6.69651 2.50719 6.44496 2.61909 6.26234 2.81141C6.08587 2.99724 5.98749 3.24373 5.98749 3.5L5.98782 3.52585C5.99468 3.79098 6.10658 4.04253 6.2989 4.22515Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M24.299 2.77477L21.3365 5.58727C21.1442 5.76988 21.0322 6.02141 21.0254 6.28653L21.025 6.3125L21.0253 6.33458C21.0308 6.58313 21.1286 6.82071 21.2998 7.00101C21.4824 7.19335 21.7339 7.30528 21.9991 7.31216L22.025 7.3125L22.0471 7.31226C22.2957 7.30677 22.5332 7.20889 22.7135 7.03773L25.676 4.22523C25.8684 4.04262 25.9803 3.79109 25.9872 3.52596L25.9875 3.5L25.9873 3.47791C25.9818 3.22937 25.8839 2.99179 25.7128 2.81149C25.5301 2.61915 25.2786 2.50722 25.0135 2.50034L24.9875 2.5L24.9654 2.50024C24.7169 2.50573 24.4793 2.60361 24.299 2.77477Z"
                                        fill="currentcolor" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p
                                    class="whitespace-nowrap overflow-hidden text-ellipsis w-[200px] text-black dark:text-white">
                                    You have a bug that needs to be fixed.</p>
                                <p class="text-xs text-black/40 dark:text-white/40">5m ago</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    @include('pages.dashboard.layouts.plugin')
</body>

<!-- Mirrored from webonzer.com/snow/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2023 04:27:49 GMT -->

</html>
