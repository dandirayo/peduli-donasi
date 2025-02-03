@extends('layouts.app')

@section('content')
    <div class="backgroundSec">
        <div class="justify-content-center align-items-center p-5">
            <div class="centerItem">
                <div class="">
                    <div class="boxShadow p-5 "  style="width: 60vw; max-height: max-content; ">
                        @if($pendingApprovalYayasan !== null)
                            <div class="" style="flex-direction: column">
                                <div class=" displayText1 w-100" style="font-size: 30px">
                                    Anda Telah Mengajukan Yayasan
                                </div>
                            </div>
                        @else
                            <div class="" style="flex-direction: column">
                                <div class=" displayText1 w-100" style="font-size: 30px">
                                    Daftar Yayasan
                                </div>
                                {{--                            <form class="text-start" method="post" id="formInputDaftarYayasan" enctype="multipart/form-data">--}}
                                <form id="formInputDaftarYayasan" class="text-start" method="POST" action="{{ route('storeDaftarYayasan') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mt-3">
                                        <label for="exampleFormControlInput1">Logo Yayasan</label>
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
                                            <input class="form-control d-none inputImage" onchange="changeImage(this)" id="logo" name="logo" type="file">
                                        </div >
                                    </div>
                                    <div class="mb-5">

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlInput1">Nama Yayasan</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Input Nama Yayasan" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlInput1">Kontak Yayasan</label>
                                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" id="contact" placeholder="Input Kontak Yayasan" value="{{ old('contact') }}" required autocomplete="contact" autofocus>
                                            @error('contact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlInput1">Kota</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" placeholder="Kota" value="{{ old('city') }}" required autocomplete="city" autofocus>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlInput1">Alamat Lengkap</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" placeholder="Input Alamat" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlInput1">Bank</label>
                                            <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" id="bank_name" placeholder="Input Nama Bank" value="{{ old('bank_name') }}" required autocomplete="bank_name" autofocus>
                                            @error('bank_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlInput1">Nomor Rekening</label>
                                            <input type="text" class="form-control @error('bank_number') is-invalid @enderror" name="bank_number" id="bank_number" placeholder="Input Nomor Rekening" value="{{ old('bank_number') }}" required autocomplete="bank_number" autofocus>
                                            @error('bank_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlInput1">Pemilik Bank</label>
                                            <input type="text" class="form-control @error('bank_owner') is-invalid @enderror" name="bank_owner" id="bank_owner" placeholder="Input Nama Pemilik Bank" value="{{ old('bank_owner') }}" required autocomplete="bank_owner" autofocus>
                                            @error('bank_owner')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlTextarea1">Tentang Yayasan</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Input Tentang Yayasan" rows="5" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlTextarea1">Tujuan Donasi</label>
                                            <textarea class="form-control @error('donation_purposes') is-invalid @enderror" id="donation_purposes" name="donation_purposes" placeholder="Input Tujuan Donasi" rows="5" value="{{ old('donation_purposes') }}" required autocomplete="donation_purposes" autofocus></textarea>
                                            @error('donation_purposes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlTextarea1">Kebutuhan Yayasan</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="category_food" name="category_food">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Food
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="category_stationary" name="category_stationary">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Stationary
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="category_clothes" name="category_clothes">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Clothes
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group pt-3">
                                            <label for="exampleFormControlTextarea1">Input Dokumen Yayasan</label>
                                            <input type="file" class="custom-file-input form-control" id="yayasan_documents" name="yayasan_documents">
                                            @error('yayasan_documents')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <br>

                                        <div class="modal-footer centerItem mt-5">
                                            <button type="submit" class="btn button1 w-75 rounded-pill">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif


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
            @if(session('success'))
                swal.fire({
                    title: 'Daftar Yayasan Berhasil',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif

            @if(session('error'))
                swal.fire({
                    title: 'Daftar Yayasan Gagal',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif

            $('#formInputDaftarYayasan').on('submit', function(e) {
                $('#logo').prop('disabled', false);
            })

{{--            @auth()--}}
            {{--$('#formInputDaftarYayasan').on('submit', function(e) {--}}
            {{--    e.preventDefault();--}}

            {{--    $('#logo').prop('disabled', false);--}}
            {{--    var formData = new FormData(this);--}}

            {{--    $.ajax({--}}
            {{--        type: 'POST',--}}
            {{--        url: "{{ route('storeDaftarYayasan') }}",--}}
            {{--        data: formData,--}}
            {{--        cache: false,--}}
            {{--        contentType: false,--}}
            {{--        processData: false,--}}
            {{--        success: (data) => {--}}
            {{--            if(data.success) {--}}
            {{--                swal.fire({--}}
            {{--                    title: 'Yayasan berhasil diajukan',--}}
            {{--                    text: data.message,--}}
            {{--                    icon: 'success',--}}
            {{--                    confirmButtonText: 'OK'--}}
            {{--                }).then((result) => {--}}
            {{--                    if(result.isConfirmed) {--}}
            {{--                        // $('#discussionModal').modal('hide');--}}
            {{--                        // location.reload();--}}
            {{--                    }--}}
            {{--                });--}}
            {{--            } else {--}}
            {{--                swal.fire({--}}
            {{--                    title: 'Yayasan gagal diajukan',--}}
            {{--                    text: data.message,--}}
            {{--                    icon: 'error',--}}
            {{--                    confirmButtonText: 'OK'--}}
            {{--                }).then((result) => {--}}
            {{--                    if(result.isConfirmed) {--}}
            {{--                        // $('#discussionModal').modal('hide');--}}
            {{--                    }--}}
            {{--                });--}}
            {{--            }--}}
            {{--        }--}}
            {{--    });--}}
            {{--});--}}
{{--            @endauth--}}
        });
    </script>
@endsection
