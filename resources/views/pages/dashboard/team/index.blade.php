@extends('pages.dashboard.layouts.main')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('team.create') }}" type="button"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">
            +Tambah Data
        </a>
        <div x-data="basic"
            class="border bg-lightwhite dark:bg-white/5 dark:border-white/10 border-black/10 p-5 rounded-md">

            <div class="mb-5">
                <p class="text-sm font-semibold">Team</p>

            </div>
            <div class>
                <table id="Table_Team" class="whitespace-nowrap table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Nama</th>
                            <th>Game</th>
                            <th>Pembuat</th>
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
        $(document).ready(function() {
            // Datatables Responsive
            $("#Table_Team").DataTable({
                scrollX: false,
                scrollY: '500px',
                paging: true,
                ordering: true,
                responsive: true,
                pageLength: 50,
                processing: true,
                serverSide: true,
                searching: true,
                ajax: "{{ route('team.index') }}",
                columns: [{
                        data: 'logo',
                        name: 'logo',
                        searchable: false

                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'game.name',
                        name: 'game.name',
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
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
