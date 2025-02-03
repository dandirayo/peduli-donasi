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
                            <form id="formInputArticle" method="post" action="{{ route('adminStoreArikel') }}" class="text-start" enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-3">
                                    <label for="exampleFormControlInput1">Gambar Artikel</label>
                                    <div class="col-lg-2 col-sm-12 p-sm-2 imageContainer">
                                        <div class="addImage centerItem w-100" style="height: 100px">
                                            <div class="overlay">
                                                <img src="" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="newImage w-100 h-100" style="object-fit: cover">
                                            </div>
                                            <div class="imageHover centerItem parent5">
                                                <button type="button" class="btn btn-primary editImage">
                                                    <i class="fa-solid fa-pen-to-square" onclick="changeImage(this)"></i>
                                                </button>

                                                <button type="button" class="btn btn-danger fullOpacity removeImage">
                                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                                </button>
                                            </div>

                                            <div style="font-size: 30px; line-height: 1; color: grey">
                                                <i class="fa-solid fa-image"></i>
                                            </div>

                                            <div  style="font-size:10px; color: gray">
                                                Gambar Utama
                                            </div>

                                        </div>
                                        <input class="form-control d-none inputImage" onchange="changeImage(this)" name="image" id="image" type="file" required>
                                    </div >
                                </div>
                                <div class="mb-5">

                                    <div class="form-group pt-3">
                                        <label for="exampleFormControlInput1">Judul Artikel</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Input Judul Artikel" value="{{ old('title') }}" autocomplete="title" autofocus>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group pt-3">
                                        <label for="exampleFormControlTextarea1">Isi Artikel</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Input Artikel" rows="10" required autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>

                                    <div class="modal-footer centerItem mt-5">
                                        <button type="submit" form="formInputArticle" class="btn button1 w-75 rounded-pill">Submit</button>
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
            $('#formInputArticle').on('submit', function (e) {
                $('#image').prop('disabled', false);
            })
        });
    </script>
@endsection
