@extends('layouts.app')

@section('content')
    <div class="backgroundSec">
        <div class="justify-content-center align-items-center p-5">
            <div class="centerItem">
                <div class="">
                    <div class="boxShadow p-5 "  style="width: 60vw; max-height: max-content; ">
                        <div class="" style="flex-direction: column">
                            <div class=" displayText1 w-100" style="font-size: 30px">
                                Artikel
                            </div>
                            <form id="formInputDeleteArticle" class="text-start">
                                @csrf

                                <img src="{{ asset('storage/' . $article->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="rounded mx-auto d-block">
                                <div class="mb-5">

                                    <div class="form-group pt-3">
                                        <label for="exampleFormControlInput1">Judul Artikel</label>
                                        <input type="text" class="form-control" name="judul" id="exampleFormControlInput1" placeholder="Input Judul Artikel" value="{{ $article->title }}" disabled>
                                    </div>

                                    <div class="form-group pt-3">
                                        <label for="exampleFormControlTextarea1">Isi Artikel</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="artikel" placeholder="Input Artikel" rows="10" disabled>{{ $article->description }}</textarea>
                                    </div>
                                    <br>

                                    <div class="modal-footer centerItem mt-5">
                                        <button type="submit" form="formInputDeleteArticle" class="btn btn-danger w-75 rounded-pill">Hapus Artikel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/donasiDetail.js') }}" defer></script>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {
            $('#formInputDeleteArticle').on('submit', function(e) {
                e.preventDefault();
            })
        })
    </script>
@endsection
