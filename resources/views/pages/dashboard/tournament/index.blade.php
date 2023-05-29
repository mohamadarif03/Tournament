@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="container">

        <a href="{{ route('tournament.create') }}" type="button"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">
            +Tambah Data
        </a>
        <div x-data="basic"
            class="border bg-lightwhite dark:bg-white/5 dark:border-white/10 border-black/10 p-5 rounded-md">

            <div class="mb-5">
                <p class="text-sm font-semibold">Tournament</p>

            </div>
            <div class>
                <table id="Table_Tournament" class="whitespace-nowrap table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Tournament Selesai</th>
                            <th>Slot</th>
                            <th>Hadiah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script src="{{ asset('assets/js/vendor/jquery.dataTables.js') }}"></script>

    <script>
        $(document).ready(function () {
            $("#Table_Tournament").DataTable({
                scrollX: false,
                scrollY: '500px',
                paging: true,
                ordering: true,
                responsive: true,
                pageLength: 50,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: "{{ route('tournament.index') }}",
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'live_image_url',
                        name: 'live_image_url',
                        searchable: false
                    },
                    {
                        data: 'completed_at',
                        name: 'completed_at'
                    },
                    {
                        data: 'slot',
                        name: 'slot'
                    },
                    {
                        data: 'price_pool',
                        name: 'price_pool'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

           

        });
    </script>
@endsection
