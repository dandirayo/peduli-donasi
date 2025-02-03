@extends('layouts.app')

@section('content')
    {{--Banner--}}
    <div class="container">
        <div class="donationContent">
            <div class="d-flex p-3 leftBorder justify-content-between">
                <div class="d-flex flex-row ">
                    <div class="centerItem flex-row">
                        <div class="rounded-circle" style="height: 70px; width: 70px; background-color: grey">
                            <img src="{{ asset('storage/' . $yayasan->logo) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="card-img-top rounded-circle" style="width: 100%; height: 100%; object-fit: cover">
                        </div>
                    </div>
                    <div style="margin-left: 30px" class="d-flex justify-content-center align-items-center">
                        <h2>{{ $yayasan->name }}</h2>
                    </div>
                </div>

                <div class="flexEnd" >
                    <button class="btn" data-toggle="modal" data-target="#editYayasanModal" style="color:lightseagreen"> <i class="fa-sharp fa-solid fa-pen mx-1"></i> Edit Yayasan Info</button>
                </div>
            </div>
            <div class="my-5">
                <ul class="nav nav-tabs nav-fill"  role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-home" aria-selected="true">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-programme-tab" data-toggle="pill" href="#pills-programme" role="tab" aria-controls="pills-programme" aria-selected="true">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">Aktivitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-donatur-tab" data-toggle="pill" href="#pills-donatur" role="tab" aria-controls="pills-donatur" aria-selected="true">Donatur</a>
                    </li>
                </ul>

                <div class="tab-content px-5 leftBorder border15 mt-3" id="pills-tabContent" style="border-radius: 0 0 15px 15px">
                    <div class="tab-pane fade show active" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                        <div class="my-5">
                            <div>
                                {{ $yayasan->description }}
                            </div>

                            <div class="flexEnd mt-5">
                                <button id="btn-edit-about" class="btn" data-toggle="modal" data-target="#editAboutModal" style="color:lightseagreen"> <i class="fa-sharp fa-solid fa-pen mx-1"></i> Ubah Deskripsi Yayasan</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-programme" role="tabpanel" aria-labelledby="pills-programme-tab">
                        <div class="leftBorder border15 p-3 my-5" style="min-height: max-content; border-radius: 20px; padding-left: 40px!important;">
                            <div class="displayText2 d-flex justify-content-between align-items-center">
                                <span>Tambah Program Baru</span>
                                <span>
                                    <button class="btn button1" data-toggle="modal" data-target="#addProgramModal">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        @foreach($yayasan->programYayasan as $programYayasan)
                            <div class="row my-5">
                                <div class="centerItem flex-row col-md-1">
                                    <div class="" style=" background-color: grey">
                                        <img src="{{ asset('storage/' . $programYayasan->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="card-img-top" style="width: 100%; height: 100%; object-fit: cover">
                                    </div>
                                </div>
                                <div class="col-md-9 d-flex justify-content-start align-items-center">
                                    <h4 class="title fw-semibold">
                                        {{ $programYayasan->title }}
                                    </h4>
                                </div>

                                <div class="d-flex justify-content-end align-items-center col-md-2 gap-1">
                                    <button id="btn-edit-program#{{ $programYayasan->id }}" class="btn btn-outline-primary btn-edit-program" data-toggle="modal" data-target="#editProgramModal"> <i class="fa-sharp fa-solid fa-pen"></i> </button>
                                    <button id="btn-delete-program#{{ $programYayasan->id }}" class="btn btn-outline-danger btn-delete-program"> <i class="fa-solid fa-trash"></i> </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                        <div class="leftBorder border15 p-3 my-5" style="min-height: max-content; border-radius: 20px; padding-left: 40px!important;">
                            <div class="displayText2 d-flex justify-content-between align-items-center">
                                <span>Tambah Aktivitas Baru</span>
                                <span>
                                    <button class="btn button1" data-toggle="modal" data-target="#addActivityModal">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        @foreach($yayasan->activityYayasan as $activityYayasan)
                            <div class="row my-5">
                                <div class="centerItem flex-row col-md-1">
                                    <div class="" style=" background-color: grey">
                                        <img src="{{ asset('storage/' . $activityYayasan->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="card-img-top" style="width: 100%; height: 100%; object-fit: cover">
                                    </div>
                                </div>
                                <div class="col-md-9 d-flex justify-content-start align-items-center">
                                    <h4 class="title fw-semibold">
                                        {{ $activityYayasan->title }}
                                    </h4>
                                </div>

                                <div class="d-flex justify-content-end align-items-center col-md-2 gap-1">
                                    <button id="btn-edit-activity#{{ $activityYayasan->id }}" class="btn btn-outline-primary btn-edit-activity" data-toggle="modal" data-target="#editActivityModal"> <i class="fa-sharp fa-solid fa-pen"></i> </button>
                                    <button id="btn-delete-activity#{{ $activityYayasan->id }}" class="btn btn-outline-danger btn-delete-activity"> <i class="fa-solid fa-trash"></i> </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade py-5" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="mb-5">
                            <div style="color: lightseagreen">
                                <i class="fa fa-location-dot"></i>
                                <span class="mx-1">ALAMAT</span>
                            </div>
                            <div class="fw-normal">
                                <h4>
                                    {{ $yayasan->address }}
                                </h4>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div style="color: lightseagreen">
                                <i class="fa-solid fa-phone"></i>
                                <span class="mx-1">NOMOR TELEPON</span>
                            </div>
                            <div class="fw-normal">
                                <h4>
                                    {{ $yayasan->contact }}
                                </h4>
                            </div>
                        </div>

                        <div>
                            <div style="color: lightseagreen">
                                <i class="fa-solid fa-money-check"></i>
                                <span class="mx-1">NOMOR REKENING</span>
                            </div>
                            <div class="fw-normal">
                                <h4>
                                    {{ $yayasan->bank_name }} : {{ $yayasan->bank_number }}
                                </h4>
                                <h4>
                                    a/n {{ $yayasan->bank_owner }}
                                </h4>
                            </div>
                        </div>

                        <div class="flexEnd" >
                            <button class="btn" data-toggle="modal" data-target="#editContactModal" style="color:lightseagreen"> <i class="fa-sharp fa-solid fa-pen mx-1"></i> Edit Contact Info</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-donatur" role="tabpanel" aria-labelledby="pills-donatur-tab">
                        <div class="py-5 container">
                            <table id="tbDonatur" class="table table-hover table-responsive" style="outline-width: 1px; outline-color: grey">
                                <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Deskripsi Barang</th>
                                    <th scope="col">Kondisi Barang</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Nama Pengirim</th>
                                    <th scope="col">Kurir</th>
                                    <th scope="col">Resi</th>
                                    <th scope="col">Status Pengiriman</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <!-- Modal Add Program -->
    <div class="modal fade" id="addProgramModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Program Baru</h5>


                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="px-3 pb-3" id="formInputAddProgram" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Input Gambar</label>
                            <div class="parent5" style="padding-top: 5px">

                                <div class="imageContainer">
                                    <div class="addImage centerItem">
                                        <div class="overlay">
                                            <img src="" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="newImage w-100 h-100" style="object-fit: cover">
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
                                            Gambar Utama
                                        </div>

                                    </div>
                                    <input id="image-add-program" name="image" class="form-control d-none inputImage" onchange="changeImage(this)" name="profile_image" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Judul Program</label>
                            <input class="form-control" name="title" id="title-add-program" placeholder="Judul Program">
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlTextarea1">Deskripsi Program</label>
                            <textarea class="form-control" name="description"  id="description-add-program" placeholder="Deskripsi Program" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputAddProgram" class="btn button1">Tambahkan Program</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Activity -->
    <div class="modal fade" id="addActivityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Aktivitas Baruy</h5>


                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="px-3 pb-3" id="formInputAddActivity" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Input Gambar</label>
                            <div class="parent5" style="padding-top: 5px">

                                <div class="imageContainer">
                                    <div class="addImage centerItem">
                                        <div class="overlay">
                                            <img src="" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="newImage w-100 h-100" style="object-fit: cover">
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
                                            Gambar Utama
                                        </div>

                                    </div>
                                    <input class="form-control d-none inputImage" onchange="changeImage(this)" name="image" id="image-add-activity" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Judul Aktivitas</label>
                            <input class="form-control" name="title" id="title-add-activity" placeholder="Judul Aktivitas">
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlTextarea1">Deskripsi Aktivitas</label>
                            <textarea class="form-control" name="description"  id="description-add-activity" placeholder="Deskripsi Aktivitas" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputAddActivity" class="btn button1">Tambahkan Aktivitas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Activity -->
    <div class="modal fade" id="editActivityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Aktivitas</h5>


                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="px-3 pb-3" id="formInputEditActivity" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" id="id-edit-activity" value="-1" class="d-none">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Input Gambar</label>
                            <div class="parent5" style="padding-top: 5px">

                                <div class="imageContainer">
                                    <div class="addImage centerItem">
                                        <div class="overlay">
                                            <img id="img-edit-activity" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="newImage w-100 h-100" style="object-fit: cover">
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
                                            Gambar Utama
                                        </div>

                                    </div>
                                    <input class="form-control d-none inputImage" onchange="changeImage(this)" name="image" id="image-edit-activity" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Judul Aktivitas</label>
                            <input class="form-control" name="title" id="title-edit-activity" placeholder="Activity Title">
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlTextarea1">Activity Description</label>
                            <textarea class="form-control" name="description"  id="description-edit-activity" placeholder="Activity Description" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputEditActivity" class="btn button1">Update Activity</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Program -->
    <div class="modal fade" id="editProgramModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Program</h5>


                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="px-3 pb-3" id="formInputEditProgram" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" id="id-edit-program" value="-1" class="d-none">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Input Gambar</label>
                            <div class="parent5" style="padding-top: 5px">

                                <div class="imageContainer">
                                    <div class="addImage centerItem">
                                        <div class="overlay">
                                            <img id="img-edit-program" src="" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="newImage w-100 h-100" style="object-fit: cover">
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
                                            Gambar Utama
                                        </div>

                                    </div>
                                    <input class="form-control d-none inputImage" onchange="changeImage(this)" name="image" id="image-edit-program" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Judul Program</label>
                            <input class="form-control" name="title" id="title-edit-program" placeholder="Judul Program">
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlTextarea1">Deskripsi Program</label>
                            <textarea class="form-control" name="description"  id="description-edit-program" placeholder="Deskripsi Program" rows="3"></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputEditProgram" class="btn button1">Ubah Program</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Contact -->
    <div class="modal fade" id="editContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Kontak</h5>
                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="p-3" id="formInputEditContact">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Alamat</label>
{{--                            <input class="form-control" name="address" id="address-edit-contact" placeholder="Alamat" value="{{ $yayasan->address }}">--}}
                            <textarea class="form-control" name="address"  id="address-edit-contact" placeholder="Alamat" rows="3">{{ $yayasan->address }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Nomor Telepon</label>
                            <input class="form-control" name="contact" id="contact-edit-program" placeholder="Nomor Telepon" value="{{ $yayasan->contact }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Nama Bank</label>
                            <input class="form-control" name="bank_name" id="bank_name-edit-contact" placeholder="Nama Bank" value="{{ $yayasan->bank_name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Nomor Rekening</label>
                            <input class="form-control" name="bank_number" id="bank_number-edit-contact" placeholder="Nomor Rekening" value="{{ $yayasan->bank_number }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleFormControlInput1">Pemilik Rekening</label>
                            <input class="form-control" name="bank_owner" id="bank_owner-edit-contact" placeholder="Pemilik Rekening" value="{{ $yayasan->bank_owner }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputEditContact" class="btn button1">Ubah Kontak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit About -->
    <div class="modal fade" id="editAboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Tentang</h5>


                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="p-3" id="formInputEditAbout">
                        @csrf
                        <div class="form-group pt-3">
                            <label for="exampleFormControlTextarea1">Tentang Yayasan</label>
                            <textarea class="form-control" name="description"  id="description-edit-about" placeholder="Tentang Yayasan" rows="6">{{ $yayasan->description }}</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputEditAbout" class="btn button1">Ubah Tentang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Yayasan Info -->
    <div class="modal fade" id="editYayasanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ubah Yayasan</h5>


                    <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                </div>
                <div class="modal-body">
                    <form class="px-3 pb-3" id="formInputEditYayasan" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Input Logo</label>
                            <div class="parent5" style="padding-top: 5px">

                                <div class="imageContainer">
                                    <div class="addImage centerItem">
                                        <div class="overlay">
                                            <img src="{{ asset('storage/' . $yayasan->logo) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="newImage w-100 h-100" style="object-fit: cover">
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
                                            Gambar Utama
                                        </div>

                                    </div>
                                    <input class="form-control d-none inputImage" onchange="changeImage(this)" name="logo" id="logo-edit-yayasan" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-3">
                            <label for="exampleFormControlInput1">Nama Yayasan</label>
                            <input class="form-control" name="name" id="exampleFormControlInput1" placeholder="Nama Yayasan" value="{{ $yayasan->name }}">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="formInputEditYayasan" class="btn button1">Ubah Yayasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/donasiDetail.js') }}" defer></script>
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
            const noImageSrc = '{{ asset('/storage/images/noimage.png') }}';

            var programList = {};
            var program = {};
            @foreach($yayasan->programYayasan as $programYayasan)
                program = {
                image: '{{ $programYayasan->image }}',
                    title: '{{ $programYayasan->title }}',
                    description: '{{ $programYayasan->description }}'
                }
                programList = {...programList, {{ $programYayasan->id }}: program};
            @endforeach
            $('.btn-edit-program').each(function(i, obj) {
                $(this).on('click', function(e) {

                    var programId = $(this).attr('id');
                    programId = programId.substring(programId.indexOf('#') + 1);

                    var imageSrc = '{{ asset('storage') }}' + '/' + programList[programId].image;
                    $('#img-edit-program').attr('src', imageSrc);
                    $('#img-edit-program').on('error', ()=> {
                        $('#img-edit-program').attr('src', noImageSrc);
                    });
                    $('#title-edit-program').val(programList[programId].title);
                    $('#description-edit-program').val(programList[programId].description);
                    $('#id-edit-program').val(programId);
                });
            });

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success m-1',
                    cancelButton: 'btn btn-danger m-1'
                },
                buttonsStyling: false
            })

            $('.btn-delete-program').each(function(i, obj) {
                $(this).on('click', function(e) {
                    var programId = $(this).attr('id');
                    programId = programId.substring(programId.indexOf('#') + 1);

                    var formData = new FormData();
                    formData.append('id', programId);
                    formData.append('yayasan_id', {{ $yayasan->id }});
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

                    swalWithBootstrapButtons.fire({
                        title: 'Konfirmasi Hapus Program',
                        text: 'Anda yakin ingin menghapus program ' + programList[programId].title + '?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('deleteProgramYayasan') }}",
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: (data) => {
                                    if(data.success) {
                                        swal.fire({
                                            title: 'Hapus Program Yayasan Berhasil',
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
                                            title: 'Hapus Program Yayasan Gagal',
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
                        } else if (
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Dibatalkan',
                                'Program Batal Dihapus!',
                                'error'
                            )
                        }
                    })
                })
            });

            var activityList = {};
            var activity = {};
            @foreach($yayasan->activityYayasan as $activityYayasan)
                activity = {
                    image: '{{ $activityYayasan->image }}',
                    title: '{{ $activityYayasan->title }}',
                    description: '{{ $activityYayasan->description }}'
                }
                activityList = {...activityList, {{ $activityYayasan->id }}: activity};
            @endforeach
            $('.btn-edit-activity').each(function(i, obj) {
                $(this).on('click', function(e) {

                    var activityId = $(this).attr('id');
                    activityId = activityId.substring(activityId.indexOf('#') + 1);

                    var imageSrc = '{{ asset('storage') }}' + '/' + activityList[activityId].image;
                    $('#img-edit-activity').attr('src', imageSrc);
                    $('#img-edit-activity').on('error', ()=> {
                        $('#img-edit-activity').attr('src', noImageSrc);
                    });
                    $('#title-edit-activity').val(activityList[activityId].title);
                    $('#description-edit-activity').val(activityList[activityId].description);
                    $('#id-edit-activity').val(activityId);
                });
            });

            $('.btn-delete-activity').each(function(i, obj) {
                $(this).on('click', function(e) {
                    var activityId = $(this).attr('id');
                    activityId = activityId.substring(activityId.indexOf('#') + 1);

                    var formData = new FormData();
                    formData.append('id', activityId);
                    formData.append('yayasan_id', {{ $yayasan->id }});
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

                    swalWithBootstrapButtons.fire({
                        title: 'Konfirmasi Hapus Aktivitas',
                        text: 'Anda yakin ingin menghapus aktivitas ' + activityList[activityId].title + '?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('deleteActivityYayasan') }}",
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: (data) => {
                                    if(data.success) {
                                        swal.fire({
                                            title: 'Hapus Aktivitas Yayasan Berhasil',
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
                                            title: 'Hapus Aktivitas Yayasan Gagal',
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
                        } else if (
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Dibatalkan',
                                'Aktivitas Batal Dihapus!',
                                'error'
                            )
                        }
                    })
                })
            });


            $('#formInputEditAbout').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append('yayasan_id', {{ $yayasan->id }});

                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateProfileYayasanAbout') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Update Yayasan Berhasil',
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
                                title: 'Update Yayasan Gagal',
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
            })

            $('#formInputEditContact').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append('yayasan_id', {{ $yayasan->id }});

                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateProfileYayasanContact') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Update Yayasan Berhasil',
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
                                title: 'Update Yayasan Gagal',
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
            })

            $('#formInputEditYayasan').on('submit', function(e) {
                e.preventDefault();

                $('#logo-edit-yayasan').prop('disabled', false);

                var formData = new FormData(this);
                formData.append('yayasan_id', {{ $yayasan->id }});

                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateProfileYayasan') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Update Yayasan Berhasil',
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
                                title: 'Update Yayasan Gagal',
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
            })

            $('#formInputAddProgram').on('submit', function(e) {
                e.preventDefault();

                $('#image-add-program').prop('disabled', false);

                var formData = new FormData(this);
                formData.append('yayasan_id', {{ $yayasan->id }});

                $.ajax({
                    type: 'POST',
                    url: "{{ route('storeProgramYayasan') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Program Yayasan Berhasil Ditambahkan',
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
                                title: 'Program Yayasan Gagal Ditambahkan',
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

            $('#formInputEditProgram').on('submit', function(e) {
                e.preventDefault();

                $('#image-edit-program').prop('disabled', false);

                var formData = new FormData(this);
                formData.append('yayasan_id', {{ $yayasan->id }});

                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateProgramYayasan') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Program Yayasan Berhasil Diubah',
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
                                title: 'Program Yayasan Gagal Diubah',
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

            $('#formInputAddActivity').on('submit', function(e) {
                e.preventDefault();

                $('#image-add-activity').prop('disabled', false);

                var formData = new FormData(this);
                formData.append('yayasan_id', {{ $yayasan->id }});

                $.ajax({
                    type: 'POST',
                    url: "{{ route('storeActivityYayasan') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Activity Yayasan Berhasil Ditambahkan',
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
                                title: 'Activity Yayasan Gagal Ditambahkan',
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
            })

            $('#formInputEditActivity').on('submit', function(e) {
                e.preventDefault();

                $('#image-edit-activity').prop('disabled', false);

                var formData = new FormData(this);
                formData.append('yayasan_id', {{ $yayasan->id }});

                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateActivityYayasan') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success) {
                            swal.fire({
                                title: 'Aktivitas Yayasan Berhasil Diubah',
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
                                title: 'Aktivitas Yayasan Gagal Diubah',
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

            var donaturTable = $('#tbDonatur').DataTable({
                processing: true,
                ajax: {
                    url: "{{ route('indexDonatur') }}" + "?yayasanId=" + {{ $yayasan->id }}
                },
                columns: [
                    {
                        data: 'gambar',
                        title: 'Gambar',
                        render: function(data, type, row) {
                            return '<img src="{{ asset('storage/') }}' + data + '" onerror="this.onerror=null; this.src=\'{{ asset('/storage/images/noimage.png') }}\' " style="width: 100%; height: 100%; object-fit: cover">';
                        },
                        orderable: false,
                        searchable: false,
                        className: 'action-col text-nowrap'
                    },
                    {data: 'deskripsi_barang', title: 'Deskripsi Barang'},
                    {data: 'kondisi', title: 'Kondisi Barang'},
                    {data: 'jumlah', title: 'Jumlah Barang'},
                    {data: 'nama_pengirim', title: 'Nana Pengirim'},
                    {data: 'kurir', title: 'Kurir'},
                    {data: 'resi', title: 'Resi'},
                    {data: 'status', title: 'Status Pengiriman'},
                ]
            });
        });
    </script>
@endsection
