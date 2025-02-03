@extends('layouts.app')

@section('content')
    <div class="backgroundPrimary py-5">
        <div class="container p-1">
            <h1 style="color: white">Article Dashboard</h1>

            <div class="mt-3">
                <a type="button" href="{{ route('adminArticleNew') }}" class="btn btn-light btn-lg btn-block rounded-pill paddingButton" style="font-size: 15px">
                    <i class="fa-solid fa-plus" style="margin-right: 10px"></i>
                    Post New Article
                </a>
            </div>

        </div>

    </div>

    <div class="my-5 container">
        <table id="tbArtikel" class="table table-hover table-responsive" style="outline-width: 1px; outline-color: grey">
            <thead>
            <tr>
                <th scope="col">Judul Artikel</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal Dibuat</th>
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
            var articleTable = $('#tbArtikel').DataTable({
                processing: true,
                ajax: {
                    url: "{{ route('listArticleAdmin') }}"
                },
                columnDefs: [
                    { "width": "20%", "targets": 0 }
                ],
                columns: [
                    {
                        data: 'title',
                        title: 'Judul Artikel'
                    },
                    {
                        data: 'description',
                        title: 'Deskripsi',
                        render: function (data, type, row) {
                            return '<p class="hideOverflowText2">' + data + '</p>';
                        }
                    },
                    {data: 'created_at', title: 'Tanggal Dibuat'},
                    {
                        data: 'id',
                        title: 'Action',
                        render: function (data, type, row) {
                            return '<a href="{{ route('adminArticleDetail') }}' + '?id=' + data + '" class="btn btn-sm btn-success mr-1" data-placement="top" title="Edit"><i class="nav-icon fas fa-eye"></i></a>';
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
