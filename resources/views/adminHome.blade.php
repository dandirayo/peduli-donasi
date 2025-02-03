@extends('layouts.app')

@section('content')
    <div class="backgroundPrimary py-5">
        <div class="container p-1">
            <h1 style="color: white">Admin Dashboard</h1>
        </div>
    </div>

    <div class="py-5 container">
        <table id="tbYayasan" class="table table-hover table-responsive" style="outline-width: 1px; outline-color: grey">
            <thead>
            <tr>
                <th scope="col">Nama Staff</th>
                <th scope="col">Nama Yayasan</th>
                <th scope="col">Kota</th>
                <th scope="col">Alamat</th>
                <th scope="col"></th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('topScript')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
@endsection
@section('topStyle')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {
            var yayasanTable = $('#tbYayasan').DataTable({
                processing: true,
                ajax: {
                    url: "{{ route('listApprovalYayasan') }}" + "?status=new"
                },
                columns: [
                    {data: 'user_name', title: 'Staff Yayasan'},
                    {data: 'yayasan_name', title: 'Nama Yayasan'},
                    {data: 'kota', title: 'Kota'},
                    {data: 'alamat', title: 'Alamat'},
                    {
                        data: 'id',
                        title: 'Action',
                        render: function (data, type, row) {
                            return '<a href="{{ route('adminViewYayasan') }}' + '?id=' + data + '" class="btn btn-sm btn-success mr-1" data-placement="top" title="Edit"><i class="nav-icon fas fa-eye"></i></a>';
                        },
                        orderable: false,
                        searchable: false,
                        className: 'action-col text-nowrap'
                    }
                ]
            });
        });
    </script>
@endsection
