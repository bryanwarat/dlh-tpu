@extends('layouts.admin.app')

@section('title', 'Dashboard - Reservations')
@section('meta_description', 'Data dari tabel reservations')
@section('meta_author', 'Admin')

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Daftar Reservasi Pemakaman</h4>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <table id="reservationsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Alm</th>
                        <th>Nama Ahli Waris</th>
                        <th>Agama</th>
                        <th>Jenis Pemakaman</th>
                        <th>Lokasi TPU</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- jQuery & DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <script>
        $(document).ready(function() {
            $('#reservationsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.reservation.data') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'deceased_name',
                        name: 'deceased_name'
                    },
                    {
                        data: 'heir_name',
                        name: 'heir_name'
                    },
                    {
                        data: 'religion_name',
                        name: 'religion_name'
                    },
                    {
                        data: 'burial_type',
                        name: 'burial_type'
                    },
                    {
                        data: 'cemetery_name',
                        name: 'cemetery_name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data) {
                            if (data == 1) {
                                return '<span class="badge bg-success">Disetujui</span>';
                            } else if (data == 2) {
                                return '<span class="badge bg-warning text-dark">Menunggu</span>';
                            } else {
                                return '<span class="badge bg-danger">Ditolak</span>';
                            }
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: "›",
                        previous: "‹"
                    },
                }
            });
        });
    </script>
@endpush
