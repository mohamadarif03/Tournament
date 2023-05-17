@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="relative mb-4 w-20">
        <select class="form-select font-semibold text-sm px-2 dark:bg-black dark:text-white">
            <option class="px-2" value="today">Today</option>
            <option class="px-2" value="week">Week</option>
            <option class="px-2" value="month">Month</option>
        </select>
    </div>
    <div class="flex flex-col gap-7">
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-7">
            <div class="bg-lightblue-100 rounded-2xl p-6">
                <p class="text-sm font-semibold text-black mb-2">Views</p>
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl leading-9 font-semibold text-black">721K</h2>
                    <div class="flex items-center gap-1">
                        <p class="text-xs leading-[18px] text-black">+11.01%</p>
                        <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.45488 5.60777L14 4L12.6198 9.6061L10.898 7.9532L8.12069 10.8463C8.02641 10.9445 7.89615 11 7.76 11C7.62385 11 7.49359 10.9445 7.39931 10.8463L5.36 8.72199L2.36069 11.8463C2.16946 12.0455 1.85294 12.0519 1.65373 11.8607C1.45453 11.6695 1.44807 11.3529 1.63931 11.1537L4.99931 7.65373C5.09359 7.55552 5.22385 7.5 5.36 7.5C5.49615 7.5 5.62641 7.55552 5.72069 7.65373L7.76 9.77801L10.1766 7.26067L8.45488 5.60777Z"
                                fill="#1C1C1C" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-lightpurple-100 rounded-2xl p-6">
                <p class="text-sm font-semibold text-black mb-2">Visits</p>
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl leading-9 font-semibold text-black">367K</h2>
                    <div class="flex items-center gap-1">
                        <p class="text-xs leading-[18px] text-black">+9.15%</p>
                        <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.45488 5.60777L14 4L12.6198 9.6061L10.898 7.9532L8.12069 10.8463C8.02641 10.9445 7.89615 11 7.76 11C7.62385 11 7.49359 10.9445 7.39931 10.8463L5.36 8.72199L2.36069 11.8463C2.16946 12.0455 1.85294 12.0519 1.65373 11.8607C1.45453 11.6695 1.44807 11.3529 1.63931 11.1537L4.99931 7.65373C5.09359 7.55552 5.22385 7.5 5.36 7.5C5.49615 7.5 5.62641 7.55552 5.72069 7.65373L7.76 9.77801L10.1766 7.26067L8.45488 5.60777Z"
                                fill="#1C1C1C" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-lightblue-100 rounded-2xl p-6">
                <p class="text-sm font-semibold text-black mb-2">New Users</p>
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl leading-9 font-semibold text-black">1,156</h2>
                    <div class="flex items-center gap-1">
                        <p class="text-xs leading-[18px] text-black">-0.56%</p>
                        <svg width="16" height="16" class="rotate-180" viewbox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.45488 5.60777L14 4L12.6198 9.6061L10.898 7.9532L8.12069 10.8463C8.02641 10.9445 7.89615 11 7.76 11C7.62385 11 7.49359 10.9445 7.39931 10.8463L5.36 8.72199L2.36069 11.8463C2.16946 12.0455 1.85294 12.0519 1.65373 11.8607C1.45453 11.6695 1.44807 11.3529 1.63931 11.1537L4.99931 7.65373C5.09359 7.55552 5.22385 7.5 5.36 7.5C5.49615 7.5 5.62641 7.55552 5.72069 7.65373L7.76 9.77801L10.1766 7.26067L8.45488 5.60777Z"
                                fill="#1C1C1C" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-lightpurple-100 rounded-2xl p-6">
                <p class="text-sm font-semibold text-black mb-2">Active Users</p>
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl leading-9 font-semibold text-black">239K</h2>
                    <div class="flex items-center gap-1">
                        <p class="text-xs leading-[18px] text-black">-1.48%</p>
                        <svg width="16" height="16" class="rotate-180" viewbox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8.45488 5.60777L14 4L12.6198 9.6061L10.898 7.9532L8.12069 10.8463C8.02641 10.9445 7.89615 11 7.76 11C7.62385 11 7.49359 10.9445 7.39931 10.8463L5.36 8.72199L2.36069 11.8463C2.16946 12.0455 1.85294 12.0519 1.65373 11.8607C1.45453 11.6695 1.44807 11.3529 1.63931 11.1537L4.99931 7.65373C5.09359 7.55552 5.22385 7.5 5.36 7.5C5.49615 7.5 5.62641 7.55552 5.72069 7.65373L7.76 9.77801L10.1766 7.26067L8.45488 5.60777Z"
                                fill="#1C1C1C" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-7">
            <div class="md:col-span-3 bg-lightwhite dark:bg-white/5 p-6 rounded-2xl">
                <div class="flex justify-between gap-3 items-start md:items-center mb-4">
                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <ul id="tabs" class="inline-flex gap-1 text-sm font-normal">
                            <li class="px-1.5 py-1 text-black dark:text-white font-semibold"><a href="javaScript:;">Total
                                    Users</a></li>
                            <li class="px-1.5 py-1 text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white">
                                <a href="javaScript:;">Total Projects</a>
                            </li>
                            <li class="px-1.5 py-1 text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white">
                                <a href="javaScript:;">Operating Status</a>
                            </li>
                        </ul>
                        <p class="hidden md:block">|</p>
                        <div class="flex gap-4 items-center flex-none">
                            <div class="flex items-center">
                                <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 8C11 9.65685 9.65685 11 8 11C6.34315 11 5 9.65685 5 8C5 6.34315 6.34315 5 8 5C9.65685 5 11 6.34315 11 8Z"
                                        fill="#1C1C1C" />
                                </svg>
                                <p class="text-xs">Current Week</p>
                            </div>
                            <div class="flex items-center">
                                <svg width="16" height="16" viewbox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11 8C11 9.65685 9.65685 11 8 11C6.34315 11 5 9.65685 5 8C5 6.34315 6.34315 5 8 5C9.65685 5 11 6.34315 11 8Z"
                                        fill="#A8C5DA" />
                                </svg>
                                <p class="text-xs">Previous Week</p>
                            </div>
                        </div>
                    </div>
                    <div x-data="{ dropdown: false }" class="dropdown ml-auto">
                        <a href="javaScript:;" class="text-black dark:text-white" @click="dropdown = !dropdown"
                            @keydown.escape="dropdown = false">
                            <svg width="28" height="28" viewbox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9 12.75C9.69036 12.75 10.25 13.3096 10.25 14C10.25 14.6904 9.69036 15.25 9 15.25C8.30964 15.25 7.75 14.6904 7.75 14C7.75 13.3096 8.30964 12.75 9 12.75Z"
                                    fill="currentColor" />
                                <path
                                    d="M14 12.75C14.6904 12.75 15.25 13.3096 15.25 14C15.25 14.6904 14.6904 15.25 14 15.25C13.3096 15.25 12.75 14.6904 12.75 14C12.75 13.3096 13.3096 12.75 14 12.75Z"
                                    fill="currentColor" />
                                <path
                                    d="M20.25 14C20.25 13.3096 19.6904 12.75 19 12.75C18.3096 12.75 17.75 13.3096 17.75 14C17.75 14.6904 18.3096 15.25 19 15.25C19.6904 15.25 20.25 14.6904 20.25 14Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                        <ul x-show="dropdown" @click.away="dropdown = false" x-transition x-transition.duration.300ms
                            class="right-0 whitespace-nowrap">
                            <li><a href="javascript:;">Weekly</a></li>
                            <li><a href="javascript:;">Monthly</a></li>
                            <li><a href="javascript:;">Yearly</a></li>
                        </ul>
                    </div>
                </div>
                <div x-ref="userchart" class="text-black dark:text-white"></div>
            </div>
            <div class="bg-lightwhite dark:bg-white/5 p-6 rounded-2xl">
                <h2 class="text-sm font-semibold text-black dark:text-white mb-4">Traffic by Website
                </h2>
                <div class="flex flex-col gap-[18px]">
                    <div class="flex gap-4 items-center group">
                        <p class="w-16 flex-none">Google</p>
                        <div
                            class="w-full h-[6px] relative bg-black/10 dark:bg-white/10 group-hover:bg-black dark:group-hover:bg-white rounded-tr-[4px] rounded-br-[4px] after:h-3 after:w-[1px] after:bg-black/10 dark:after:bg-white/20 group-hover:after:bg-black dark:group-hover:after:bg-white after:absolute after:left-0 after:-top-[3px]">
                        </div>
                    </div>
                    <div class="flex gap-4 items-center group">
                        <p class="w-16 flex-none">Yourtube</p>
                        <div
                            class="w-1/2 h-[6px] relative bg-black/10 dark:bg-white/10 group-hover:bg-black dark:group-hover:bg-white rounded-tr-[4px] rounded-br-[4px] after:h-3 after:w-[1px] after:bg-black/10 dark:after:bg-white/20 group-hover:after:bg-black dark:group-hover:after:bg-white after:absolute after:left-0 after:-top-[3px]">
                        </div>
                    </div>
                    <div class="flex gap-4 items-center group">
                        <p class="w-16 flex-none">Instagram</p>
                        <div
                            class="w-10/12 h-[6px] relative bg-black/10 dark:bg-white/10 group-hover:bg-black dark:group-hover:bg-white rounded-tr-[4px] rounded-br-[4px] after:h-3 after:w-[1px] after:bg-black/10 dark:after:bg-white/20 group-hover:after:bg-black dark:group-hover:after:bg-white after:absolute after:left-0 after:-top-[3px]">
                        </div>
                    </div>
                    <div class="flex gap-4 items-center group">
                        <p class="w-16 flex-none">Pinterest</p>
                        <div
                            class="w-2/5 h-[6px] relative bg-black/10 dark:bg-white/10 group-hover:bg-black dark:group-hover:bg-white rounded-tr-[4px] rounded-br-[4px] after:h-3 after:w-[1px] after:bg-black/10 dark:after:bg-white/20 group-hover:after:bg-black dark:group-hover:after:bg-white after:absolute after:left-0 after:-top-[3px]">
                        </div>
                    </div>
                    <div class="flex gap-4 items-center group">
                        <p class="w-16 flex-none">Facebook</p>
                        <div
                            class="w-3/5 h-[6px] relative bg-black/10 dark:bg-white/10 group-hover:bg-black dark:group-hover:bg-white rounded-tr-[4px] rounded-br-[4px] after:h-3 after:w-[1px] after:bg-black/10 dark:after:bg-white/20 group-hover:after:bg-black dark:group-hover:after:bg-white after:absolute after:left-0 after:-top-[3px]">
                        </div>
                    </div>
                    <div class="flex gap-4 items-center group">
                        <p class="w-16 flex-none">Twitter</p>
                        <div
                            class="w-2/5 h-[6px] relative bg-black/10 dark:bg-white/10 group-hover:bg-black dark:group-hover:bg-white rounded-tr-[4px] rounded-br-[4px] after:h-3 after:w-[1px] after:bg-black/10 dark:after:bg-white/20 group-hover:after:bg-black dark:group-hover:after:bg-white after:absolute after:left-0 after:-top-[3px]">
                        </div>
                    </div>
                    <div class="flex gap-4 items-center group">
                        <p class="w-16 flex-none">Tumblr</p>
                        <div
                            class="w-3/5 h-[6px] relative bg-black/10 dark:bg-white/10 group-hover:bg-black dark:group-hover:bg-white rounded-tr-[4px] rounded-br-[4px] after:h-3 after:w-[1px] after:bg-black/10 dark:after:bg-white/20 group-hover:after:bg-black dark:group-hover:after:bg-white after:absolute after:left-0 after:-top-[3px]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-7">
            <div class="bg-lightwhite dark:bg-white/5 rounded-2xl p-6">
                <h2 class="text-sm font-semibold text-black dark:text-white mb-4">Traffic by Device
                </h2>
                <div x-ref="trafficdevice" class="text-black dark:text-white"></div>
            </div>
            <div class="bg-lightwhite dark:bg-white/5 rounded-2xl p-6">
                <h2 class="text-sm font-semibold text-black dark:text-white mb-4">Traffic by Location
                </h2>
                <div x-ref="trafficlocation" class="text-black dark:text-white"></div>
            </div>
        </div>
    </div>
@endsection
