@extends('pages.dashboard.layouts.main')

@section('content')
    <style>
        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.faster {
            -webkit-animation-duration: 500ms;
            animation-duration: 500ms;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>
    <div class="container">

        <a href="{{ route('tournament.create') }}" type="button"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">
            +Tambah Data
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($tournaments as $tournament)
            <div class="relative mx-auto w-full">
                <a href="#" class="relative inline-block w-full transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                  <div class="rounded-lg bg-white p-4 shadow">
                    <div class="relative flex h-52 justify-center overflow-hidden rounded-lg">
                      <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                        <div class="absolute inset-0 bg-black bg-opacity-80">
                          <img src="{{ asset('storage/' . $tournament->live_image_url) }}"  alt="" />
                        </div>
                      </div>
                    </div>

                    <div class="mt-4">
                      <h2 class="line-clamp-1 text-2xl font-medium text-gray-800 md:text-lg truncate" title="Mpl seson 78 loremshjdsdjfjdfjdbfjbdfjdjf">{{ $tournament->name }}</h2>
                      <div class="grid grid-cols-2  items-center mt-2">
                          <div class=" ">
                              <p class="font-bold text-md flex mr-2 text-slate-500 ">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                      class="bi bi-geo-alt mr-1.5" viewBox="0 0 16 16">
                                      <path
                                          d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                      <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                  </svg>
                                  <span class=" truncate w-1/2">
                                      {{ $tournament->location }}
                                  </span>
                              </p>
                          </div>
                          <div class="mx-0">
                              <div class="flex my-3  ">
                                  @if ($tournament->is_open_signup == 1)
                                      <p class="font-semibold text-sm flex mr-1 text-[#CDE990]">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16"
                                              fill="currentColor" class="bi bi-circle-fill mr-2 text-[#CDE990]"
                                              viewBox="0 0 16 16">
                                              <circle cx="8" cy="8" r="8" />
                                          </svg>
                                          Pendaftaran Dibuka
                                      </p>
                                  @else
                                      <p class="font-semibold text-md flex mr-2 text-[#F45050]">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="10" height="16"
                                              fill="currentColor" class="bi bi-circle-fill  text-[#F45050]"
                                              viewBox="0 0 16 16">
                                              <circle cx="8" cy="8" r="8" />
                                          </svg>
                                          Pendaftaran Ditutup
                                      </p>
                                  @endif

                              </div>

                          </div>
                      </div>

                    </div>
                    <div class=" flex justify-between px-1">
                      <div class=" font-semibold">Slot : 16/{{ $tournament->slot }}</div>
                      <div class="font-semibold">Harga : {{ number_format($tournament->registration_fee, 0, ',', '.') }}</div>
                    </div>
                    <div class=" absolute top-1 right-1 justify-center my-1">
                      <div class="bg-[#0e75e3] px-2 py-2 rounded-md">
                          <p class="font-semibold text-white">Hadiah: Rp
                              {{ number_format($tournament->price_pool, 0, ',', '.') }}</p>
                      </div>
                  </div>

                    <div class="mt-8 grid grid-cols-2">
                      <div class=" items-center text-xs">
                           Mulai : {{ date('d F Y', strtotime($tournament->starter_at)) }}
                      </div>

                      <div class="grid grid-cols-3">
                        <span class="">
                            <button class="rounded-md bg-[#0174E1] py-1 px-3 text-2xl text-white" id="buttonId" data-tournament-id="{{ $tournament->id }}" onclick="openModal()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20"><path fill="currentColor" d="M11.18 14.356c0-1.451 1.1-2.254 2.894-3.442C16.268 9.458 19 7.649 19 3.354a.703.703 0 0 0-.709-.699h-3.43C14.377 1.759 12.932.8 10 .8c-2.934 0-4.377.959-4.862 1.855H1.707A.703.703 0 0 0 1 3.354c0 4.295 2.73 6.104 4.926 7.559c1.794 1.188 2.894 1.991 2.894 3.442v1.311c-1.884.209-3.269.906-3.269 1.736c0 .994 1.992 1.799 4.449 1.799s4.449-.805 4.449-1.799c0-.83-1.385-1.527-3.269-1.736v-1.31zM13.957 9.3c.566-1.199 1.016-2.826 1.088-5.246h2.51c-.24 2.701-1.862 4.064-3.598 5.246zM10 2.026c2.732-.002 3.799 1.115 3.798 1.529c0 .418-1.066 1.533-3.798 1.535c-2.732-.001-3.799-1.116-3.799-1.534C6.2 3.142 7.268 2.024 10 2.026zM2.445 4.054h2.509c.073 2.42.521 4.047 1.089 5.246c-1.736-1.182-3.359-2.545-3.598-5.246z"/></svg>
                            </button>
                        </span>

                          <a href="{{ route('tournament.edit', $tournament->id) }}">
                              <button class="rounded-md bg-[#0174E1] py-1 px-3 text-2xl text-white transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20"><path fill="currentColor" d="M17.561 2.439c-1.442-1.443-2.525-1.227-2.525-1.227L8.984 7.264L2.21 14.037L1.2 18.799l4.763-1.01l6.774-6.771l6.052-6.052c-.001 0 .216-1.083-1.228-2.527zM5.68 17.217l-1.624.35a3.71 3.71 0 0 0-.69-.932a3.742 3.742 0 0 0-.932-.691l.35-1.623l.47-.469s.883.018 1.881 1.016c.997.996 1.016 1.881 1.016 1.881l-.471.468z"/></svg>
                              </button>
                          </a>
                          <form onsubmit="return confirm('Yakin Ingin Menghapus Data Ini?')" method="POST"
                                  action="{{ route('tournament.destroy', $tournament) }}">
                                  @method('DELETE')
                                  @csrf
                                  <button class="rounded-md bg-[#0174E1] py-1 px-3 text-2xl text-white transform transition-transform duration-300 ease-in-out hover:-translate-y-2">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 20 20"><path fill="currentColor" d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979c3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318c.248.301 2.111 2.522 2.111 2.522h-1.7z"/></svg>
                                  </button>

                          </form>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
                <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                    style="background: rgba(0,0,0,.7);display:none;">
                    <div
                        class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                        <div class="modal-content py-4 text-left px-6">
                            <!--Title-->
                            <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Pemenang</p>
                                <div class="modal-close cursor-pointer z-50">
                                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                        height="18" viewBox="0 0 18 18">
                                        <path
                                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <!--Body-->
                            <div class="my-5">
                                <select name="person" id="teamSelect">

                                </select>
                                input
                            </div>
                            <!--Footer-->
                            <div class="flex justify-end pt-2">
                                <button
                                    class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                                <button
                                    class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    const modal = document.querySelector('.main-modal');
                    const closeButton = document.querySelectorAll('.modal-close');

                    const modalClose = () => {
                        modal.classList.remove('fadeIn');
                        modal.classList.add('fadeOut');
                        setTimeout(() => {
                            modal.style.display = 'none';
                        }, 500);
                    }

                    const openModal = () => {
                        modal.classList.remove('fadeOut');
                        modal.classList.add('fadeIn');
                        modal.style.display = 'flex';
                    }

                    for (let i = 0; i < closeButton.length; i++) {
                        const elements = closeButton[i];
                        elements.onclick = (e) =>
                            modalClose();

                        modal.style.display = 'none';

                        window.onclick = function(event) {
                            if (event.target == modal) modalClose();
                        }
                    }

                    $('#buttonId').on('click', function() {
                        var tournamentId = $(this).data('tournament-id');
                        $.ajax({
                            url: 'tournament/' + tournamentId,
                            type: 'GET',
                            success: function(response) {
                                var tourteam = response.tourteam;
                                var competitors = tourteam.competitors;

                                // Select element to populate with team names
                                var selectElement = $('#teamSelect');

                                console.log(tourteam);
                                selectElement.empty();

                                competitors.forEach(function(competitor) {
                                    var option = $('<option>', {
                                        value: competitor.id,
                                        text: competitor.team.name // Accessing team name
                                    });
                                    console.log(competitor.team.name);
                                    selectElement.append(option);
                                });
                            },
                            error: function(error) {

                                console.log(error);
                            }
                        });
                    });
                </script>
            @empty
                <p>Anda Belum Pernah Membuat Tournament</p>
            @endforelse
        </div>

        <div class="grid w-full grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

        </div>

    </div>
@endsection
