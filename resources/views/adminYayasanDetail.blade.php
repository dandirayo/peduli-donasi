@extends('layouts.app')

@section('content')
    <div class="backgroundSec">
        <div class="justify-content-center align-items-center p-5">
            <div class="centerItem">
                <div class="">
                    <div class="boxShadow p-5 "  style="width: 60vw; max-height: max-content; ">
                        <div class="" style="flex-direction: column">
                            <div class=" displayText1 " style="font-size: 30px">
                                Profile Yayasan
                            </div>
                            <form id="formInputApprove" class="text-start">
                                @csrf
                                <div class="row mt-3">
                                    <label for="exampleFormControlInput1">Logo Yayasan</label>
                                    <div class="col-lg-2 col-sm-12 p-sm-2 imageContainer">
                                        <div class="addImage centerItem w-100" style="height: 100px">
                                            <img src="{{ asset('storage/' . $approvalYayasan->logo) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="card-img-top" style="width: 100%; height: 230px; object-fit: cover">
                                        </div>
                                        <input class="form-control d-none inputImage" onchange="changeImage(this)" name="profile_image" type="file">
                                    </div >
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Nama Yayasan</label>
                                    <input type="text" class="form-control" disabled name="name" id="exampleFormControlInput1" value="{{ $approvalYayasan->name }}"placeholder="Input Nama Yayasan">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Kontak Yayasan</label>
                                    <input type="text" class="form-control" name="contact" id="exampleFormControlInput1" value="{{ $approvalYayasan->contact }}" disabled placeholder="Input Kontak Yayasan">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Kota</label>
                                    <input type="text" class="form-control" name="city" id="exampleFormControlInput1" value="{{ $approvalYayasan->city }}" disabled placeholder="Input Nama Perusahaan Yayasan">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Alamat Lengkap</label>
                                    <input type="text" class="form-control" name="alamat" id="exampleFormControlInput1" value="nama yayasan" disabled placeholder="Input Alamat">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Bank</label>
                                    <input type="text" class="form-control" name="bank_name" id="exampleFormControlInput1" value="{{ $approvalYayasan->bank_name }}" disabled placeholder="Input Nama Perusahaan Yayasan">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Nomor Rekening</label>
                                    <input type="text" class="form-control" name="bank_number" id="exampleFormControlInput1" value="{{ $approvalYayasan->bank_number }}" disabled placeholder="Input Nama Perusahaan Yayasan">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Pemilik Rekening</label>
                                    <input type="text" class="form-control" name="bank_owner" id="exampleFormControlInput1" value="{{ $approvalYayasan->bank_owner }}" disabled placeholder="Input Nama Perusahaan Yayasan">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlTextarea1">Tentang Yayasan</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" disabled placeholder="Input Tentang Yayasan" rows="5">{{ $approvalYayasan->description }}</textarea>
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlTextarea1">Tujuan Donasi</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="donation_purposes" disabled placeholder="Input Tentang Yayasan" rows="5">{{ $approvalYayasan->donation_purposes }}</textarea>
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlTextarea1">Kebutuhan Yayasan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="category_food" name="category_food" @if($approvalYayasan->category_food == 1) checked @endif disabled>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Food
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="category_stationary" name="category_stationary" @if($approvalYayasan->category_stationary == 1) checked @endif disabled>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Stationary
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="category_clothes" name="category_clothes" @if($approvalYayasan->category_clothes == 1) checked @endif disabled>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Clothes
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlTextarea1">Download Profile Yayasan</label>
                                    <div class="mt-1">
                                        <a download href="{{ asset('storage/' . $approvalYayasan->yayasan_documents) }}" type="button" class="btn buttonForm1 btn-lg btn-block rounded-pill paddingButton" style="font-size: 12px">
                                            <i class="fa-solid fa-download" style="margin-right: 10px"></i>
                                            Download File
                                        </a>
                                    </div>
                                </div>

                                <br>

                                <div class="d-flex flex-row modal-footer centerItem mt-5 gap-4">
                                    <button type="button" class="btn btn-outline-danger rounded-pill" style="width: 45%">Reject</button>
                                    <button type="submit" form="formInputApprove" class="btn button1 rounded-pill" style="width: 45%">Approve</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {
            $('#formInputApprove').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);
                formData.append('id', {{ $approvalYayasan->id }});

                Swal.fire({
                    title: 'Setujui yayasan ini?',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('approveYayasan') }}",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: (data) => {
                                let swalTitle = 'Gagal Menyetujui Registerasi Yayasan';
                                let swalIcon = 'error'
                                if(data.success) {
                                    swalTitle = 'Berhasil Menyetujui Registerasi Yayasan';
                                    swalIcon = 'success';
                                }

                                swal.fire({
                                    title: swalTitle,
                                    text: data.message,
                                    icon: swalIcon,
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if(result.isConfirmed) {
                                        if(data.success) window.location.replace('{{ route('adminHome') }}')
                                    }
                                });
                            },
                            error: (data) => {

                            }
                        });
                    }
                });
            });

            {{--$('#formInputDisapprove').on('submit', function(e) {--}}
            {{--    e.preventDefault();--}}

            {{--    let errorSpan = $('#error-disapprove');--}}
            {{--    errorSpan.css('display', 'none');--}}
            {{--    let taComments = $('#ta-comments');--}}
            {{--    taComments.removeClass('is-invalid');--}}

            {{--    let formData = new FormData(this);--}}
            {{--    formData.append('approvalCompanyId', {{ $approvalCompany->id }});--}}

            {{--    $.ajax({--}}
            {{--        type: 'POST',--}}
            {{--        url: "{{ route('disapproveCompany') }}",--}}
            {{--        data: formData,--}}
            {{--        cache: false,--}}
            {{--        contentType: false,--}}
            {{--        processData: false,--}}
            {{--        success: (data) => {--}}
            {{--            let swalTitle = 'Disapprove Company Registration Failed';--}}
            {{--            let swalIcon = 'error'--}}
            {{--            if(data.success) {--}}
            {{--                swalTitle = 'Disapprove Company Registration Success';--}}
            {{--                swalIcon = 'success';--}}
            {{--            }--}}

            {{--            swal.fire({--}}
            {{--                title: swalTitle,--}}
            {{--                text: data.message,--}}
            {{--                icon: swalIcon,--}}
            {{--                confirmButtonText: 'OK'--}}
            {{--            }).then((result) => {--}}
            {{--                if(result.isConfirmed) {--}}
            {{--                    $('#disapproveModal').modal('hide');--}}
            {{--                    if(data.success) window.location.replace('{{ route('adminHome') }}')--}}
            {{--                }--}}
            {{--            });--}}
            {{--        },--}}
            {{--        error: (data) => {--}}
            {{--            let responseJSON = data.responseJSON;--}}
            {{--            if(responseJSON != null) {--}}
            {{--                let errors = responseJSON.errors;--}}
            {{--                if(errors != null) {--}}
            {{--                    $.each(errors, function(key, value) {--}}
            {{--                        errorSpan.css('display', 'block');--}}
            {{--                        errorSpan.find('strong').html(value[0]);--}}
            {{--                        taComments.addClass('is-invalid');--}}
            {{--                    });--}}
            {{--                }--}}
            {{--            }--}}
            {{--        }--}}
            {{--    });--}}
            {{--})--}}
        });
    </script>
@endsection
