@extends('layouts.app')

@section('content')
    <div class="backgroundSec">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="pt-5 mb-3 displayText2 boxShadow w-100" style="background-color: white; width: max-content">
                        <div class="px-5">
                            <div class="centerItem  flex-column ">
                                <div class="rounded-circle" style="height: 150px; width: 150px; background-color: grey">
                                    <img src="{{ asset('storage/' . $user->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noUserimage.png') }}'" class="card-img-top rounded-circle" style="width: 100%; height: 100%; object-fit: cover">
                                </div>

                                <div class="fw-bold py-3">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div style="color: grey" class="centerItem flex-column ">
                                <div class="row mb-5">
                                    <div class="col-2 flex-column">
                                        <i class="fa-solid fa-envelope" style="margin-right: 10px; color: lightseagreen"></i>
                                        <i class="fa-solid fa-phone " style="margin-right: 10px; color: lightseagreen"></i>
                                    </div>
                                    <div class="col-10 d-flex align-items-start flex-column">
                                        <div>
                                            {{ $user->email }}
                                        </div>
                                        <div>
                                            {{ $user->phone ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 centerItem flex-column">
                                    <span class="fw-bold">
                                        Poin Donasi
                                    </span>
                                    <div class="displayText1" style="color: lightseagreen; line-height: 120%">
                                        {{ $donationPoints }}
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="centerItem button1 p-2 backgroundPrimary" data-toggle="modal" data-target="#editProfileModal" style="color:white;">
                            <i class="fa-solid fa-pencil" style="margin-right: 10px"></i> Edit Profile
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="p-5 mb-3 displayText2 boxShadow w-100" style="background-color: white; width: max-content">
                        Histori Donasi
                        <div>
                            <div class="row">
                                @foreach($user->donation as $donation)
                                    <div class="d-flex flex-row py-3 justify-content-between">

                                        <div class="d-flex">
                                            <div style="border-radius: 25%; background-color: grey; height: 50px; width: 50px;">
                                                <img src="{{ asset('storage/' . $donation->image1) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" style="width: 100%; height: 100%; object-fit: cover">
                                            </div>

                                            <div class="d-flex flex-column px-3">
                                                <div class="fw-bold displayText2">
                                                    {{ $donation->yayasan->name }}
                                                </div>
                                                <div style="color: grey">
                                                    {{ date("F j, Y", strtotime($donation->created_at)) }}
                                                </div>
                                                <p id="donation-history-alamat-{{ $donation->id }}" class="d-none">{{ $donation->yayasan->address }}</p>
                                            </div>
                                        </div>

                                        <div>
                                            <p>{{ $donation->deskripsi_barang }}</p>
                                        </div>

                                        <div>
                                            @if($donation->status == \App\Utils\PeduliDonasiConstants::DONASI_STATUS_MENUNGGU_RESSI)
                                                <button id="button-donasi-history-{{ $donation->id }}" class="button-history-donasi button1 btn" data-toggle="modal" data-target="#modal-input-resi"> Input Resi </button>
                                            @else
                                                <div class="button1 btn" style="pointer-events: none!important;"> {{ $donation->status }} </div>
                                            @endif
                                        </div>


                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="modal-input-resi" tabindex="-1" role="dialog" aria-labelledby="modal-input-resiTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-input-resiLongTitle">Submit Resi</h5>
                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form id="formInputSubmitResi" class="p-3">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Alamat Yayasan</label>

                            <div class="fw-bold">
                                <p id="modal-input-resi-text-alamat-yayasan">Alamat yayasan</p>
                            </div>
                        </div>

                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Nomor Resi</label>
                            <input type="text" class="form-control" id="resi_kurir" name="resi_kurir" placeholder="Input Nomor Resi">
                        </div>

                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Input Kurir</label>
                            <input type="text" class="form-control" id="nama_kurir" name="nama_kurir" placeholder="Input Kurir">
                        </div>

                        <br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputSubmitResi" class="btn button1">Submit Resi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Profile -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>


                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="px-3 pb-3" id="formInputEditProfile" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Input Gambar</label>
                            <div class="parent5" style="padding-top: 5px">

                                <div class="imageContainer">
                                    <div class="addImage centerItem">
                                        <div class="overlay">
                                            <img src="{{ asset('storage/' . $user->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="newImage w-100 h-100" style="object-fit: cover">
                                        </div>
                                        <div class="imageHover centerItem parent5">
                                            <button type="button" class="btn btn-primary editImage">
                                                <i class="fa-solid fa-pen-to-square" onclick="changeImage(this)"></i>
                                            </button>

{{--                                            <button type="button" class="btn btn-danger fullOpacity removeImage">--}}
{{--                                                <i class="fa-sharp fa-solid fa-trash"></i>--}}
{{--                                            </button>--}}
                                        </div>

                                        <div style="font-size: 40px; line-height: 1; color: grey">
                                            <i class="fa-solid fa-image"></i>
                                        </div>

                                        <div  style="font-size: 13px; color: gray">
                                            Foto Profil
                                        </div>

                                    </div>
                                    <input class="form-control d-none inputImage" onchange="changeImage(this)" id="image" name="image" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input class="form-control" id="name" name="name" placeholder="Input Nama" value="{{ $user->name }}">
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Email Address</label>
                            <input class="form-control" id="email" name="email" type="email" placeholder="Input Email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Phone Number</label>
                            <input class="form-control" id="phone" name="phone" placeholder="Input Nomor Telepon" value="{{ $user->phone }}">
                        </div>
{{--                        <div class="form-group pt-3">--}}
{{--                            <label for="exampleFormControlInput1">Password</label>--}}
{{--                            <input class="form-control" id="password" name="password" type="password" placeholder="Input Password">--}}
{{--                        </div>--}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputEditProfile" class="btn button1">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/donasiDetail.js') }}" defer></script>
@endsection

@section('js')
    <script>
        $(document).ready(function(e) {
            var donationId = -1;

            $('.button-history-donasi').each(function(i, obj) {
                obj.addEventListener('click', () => {
                    var str = $(this).attr('id');
                    var arrStr = str.split('-');
                    donationId = arrStr[3];
                    var stringAlamatId = '#donation-history-alamat-' + donationId;
                    $('#modal-input-resi-text-alamat-yayasan')[0].innerText = $(stringAlamatId)[0].innerText;
                })
            });

            $('#formInputSubmitResi').on('submit', function(e) {
                e.preventDefault();

                $('#image').prop('disabled', false);

                var formData = new FormData(this);
                formData.append('donation_id', donationId);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('donasiUpdateStatus') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Input Resi Berhasil',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if(result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                title: 'Input Resi Gagal',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if(result.isConfirmed) {
                                    // TODO handle redirect page after success
                                }
                            });
                        }
                    }
                });
            });

            $('#formInputEditProfile').on('submit', function (e) {
                e.preventDefault();

                $('#image').prop('disabled', false);

                var formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateProfileDonatur') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Update Profil Berhasil',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if(result.isConfirmed) {
                                    $('#editProfileModal').modal('hide')
                                    location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                title: 'Update Profil Gagal',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if(result.isConfirmed) {
                                    // TODO handle redirect page after success
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
