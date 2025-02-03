@extends('layouts.app')

@section('content')
    {{--Banner--}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-9 donationContent">
                <div class="d-flex flex-row p-3 leftBorder">
                    <div class="centerItem flex-row">
                        <div class="rounded-circle" style="height: 70px; width: 70px; background-color: grey">
                            <img src="{{ asset('storage/' . $yayasan->logo) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="card-img-top rounded-circle" style="width: 100%; height: 100%; object-fit: cover">
                        </div>
                    </div>
                    <div style="margin-left: 30px" class="d-flex justify-content-center align-items-center">
                        <h2>{{ $yayasan->name }}</h2>
                    </div>
                </div>
                <div id="carouselExampleControls" class="carousel slide mb-3 mt-3" data-ride="carousel" >
                    <div class="carousel-inner">
                        @if($yayasan->programYayasan->count() || $yayasan->activityYayasan->count())
                            @if($yayasan->programYayasan->count())
                                @foreach($yayasan->programYayasan as $key => $programYayasan)
                                    <div class="carousel-item {{ $key==0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $programYayasan->image) }}" class="border15" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'"  style="width: 100%; height: 500px; object-fit: cover">
                                    </div>
                                @endforeach
                            @endif
                            @if($yayasan->activityYayasan->count())
                                @foreach($yayasan->activityYayasan as $key => $activityYayasan)
                                    <div class="carousel-item {{ ($yayasan->programYayasan->count()==0 && $key==0 ? 'active' : '') }}">
                                        <img src="{{ asset('storage/' . $activityYayasan->image)}}" class="border15" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'"  style="width: 100%; height: 500px; object-fit: cover">
                                    </div>
                                @endforeach
                            @endif
                        @else
                            <div class="carousel-item active">
                                <img src="" class="border15" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'"  style="width: 100%; height: 500px; object-fit: cover">
                            </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="mb-5">
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
                    </ul>

                    <div class="tab-content p-4 leftBorder border15 mt-3" id="pills-tabContent" style="border-radius: 0 0 15px 15px">
                        <div class="tab-pane fade show active" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                            <div class="my-5">
                                <div>
                                    {{ $yayasan->description }}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-programme" role="tabpanel" aria-labelledby="pills-programme-tab">
                            @if($yayasan->programYayasan->count())
                                @foreach($yayasan->programYayasan as $programYayasan)
                                    <div class="row" style="width: 100%;">
                                        <div class="col-sm-3 center">
                                            <img src="{{ asset('storage/' . $programYayasan->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" style="width:260px; object-fit: cover">
                                        </div>
                                        <div class="col-sm-9 center">
                                            <div style="width: 100%;">
                                                <h3>{{ $programYayasan->title }}</h3>
                                            </div>
                                            <div style="width: 100%;">
                                                <p>{{ $programYayasan->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fae" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                            @if($yayasan->activityYayasan->count())
                                @foreach($yayasan->activityYayasan as $activityYayasan)
                                    <div class="row" style="width: 100%;">
                                        <div class="col-sm-3 center">
                                            <img src="{{ asset('storage/' . $activityYayasan->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" style="width:260px; object-fit: cover">
                                        </div>
                                        <div class="col-sm-9 center">
                                            <div style="width: 100%;">
                                                <h3>{{ $activityYayasan->title }}</h3>
                                            </div>
                                            <div style="width: 100%;">
                                                <p>{{ $activityYayasan->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
{{--                            <h4>Hubungi Kami</h4>--}}
{{--                            <h5>Nomor</h5>--}}
{{--                            <p>Telepon / WhatsApp {{ $yayasan->contact }}</p>--}}
{{--                            <h5>Nomor Rekening</h5>--}}
{{--                            <p>{{ $yayasan->bank_name }} : {{ $yayasan->bank_number }}</p>--}}
{{--                            <p>a/n {{ $yayasan->bank_owner }}</p>--}}
                            <div class="mb-5">
                                <div>
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
                                <div>
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
                                <div>
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <div class="col-sm-12 col-lg-3 m-lg-3 px-5 donationMenu leftBorder">
        <div>
            <div class="pt-5">
                <h4>Tujuan Donasi</h4>
                <div id="donationPurposeText" class="hideOverflowTextDonationText">
                    {{ $yayasan->donation_purposes }}
                </div>
            </div>
            <div class="py-5">
                <h4>Kategori Donasi</h4>

                <div style="display: flex; gap: 10px;" class="mb-3">
                    @if($yayasan->kategoriDonasiYayasan !== null)
                        @foreach($yayasan->kategoriDonasiYayasan as $kdy)
                            @if($kdy !== null && $kdy->kategoriDonasi !== null)
                                <div class="circleIcon {{ $kdy->kategoriDonasi->css_class_name_color }}">
                                    <i class="fa-solid  {{ $kdy->kategoriDonasi->css_class_name_icon }}">
                                    </i>
                                    {{ $kdy->kategoriDonasi->name }}
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                @auth()
                    @if(Auth::user()->role_id==2)
                        <a href=""  class="btn w-100 button1" data-toggle="modal" data-target="#exampleModalCenter">Donasi</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn w-100 button1">Donasi</a>
                @endauth
            </div>
        </div>
    </div>

    @auth()
        @if(Auth::user()->role_id==2)
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Yayasan A Donation</h5>


                            <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                        </div>
                        <div class="modal-body">
                            <form class="p-3" method="post" id="formInputDonation" enctype="multipart/form-data">
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
                                            <input class="form-control d-none inputImage" onchange="changeImage(this)" id="image1" name="image1" type="file">
                                        </div>
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
                                            <input class="form-control d-none inputImage" onchange="changeImage(this)" id="image2" name="image2" type="file">
                                        </div>
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
                                            <input class="form-control d-none inputImage" onchange="changeImage(this)" id="image3" name="image3" type="file">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="Input Nama">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Alamat Pengirim</label>
                                    <input type="text" class="form-control" id="alamat_pengirim" name="alamat_pengirim" placeholder="Input Alamat">
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="no_tlp_pengirim" name="no_tlp_pengirim" placeholder="Input Nomor Telepon">
                                </div>
                                <div class="form-group pt-3">
                                    <label for="exampleFormControlSelect1">Tujuan Donasi</label>
                                    <select class="btn dropdown-toggle w-100 text-start btn-outline-secondary" id="tujuan_donasi" name="tujuan_donasi">
                                        <option>Amal</option>
                                        <option>Alasan 2</option>
                                        <option>Alasan 3</option>
                                        <option>Alasan 4</option>
                                        <option>Alasan 5</option>
                                    </select>
                                </div>

                                <div class="form-group pt-3">
                                    <label for="exampleFormControlSelect1">Kondisi Barang</label>
                                    <select class="btn dropdown-toggle w-100 text-start btn-outline-secondary" id="kondisi_barang" name="kondisi_barang">
                                        <option>Baru</option>
                                        <option>Bekas</option>
                                    </select>
                                </div>
                                <div class="form-group pt-3">
                                    <label for="exampleFormControlInput1">Jumlah Barang</label>
                                    <input type="number" class="form-control" value="1" min="1" id="jumlah_barang" name="jumlah_barang">
                                </div>
                                <div class="form-group pt-3">
                                    <label for="exampleFormControlTextarea1">Deskripsi Barang</label>
                                    <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" placeholder="Input Deskripsi Barang" rows="2"></textarea>
                                </div>

                                <br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" form="formInputDonation" class="btn button1">Submit Donasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endauth
@endsection

@section('js')
    <script src="{{ asset('js/donasiDetail.js') }}" defer></script>
    <script>
        $(document).ready(function(e) {
            @auth()
                @if(Auth::user()->role_id==2)
                    $('#formInputDonation').on('submit', function (e) {
                        e.preventDefault();

                        $('#image1').prop('disabled', false);
                        $('#image2').prop('disabled', false);
                        $('#image3').prop('disabled', false);

                        var formData = new FormData(this);
                        formData.append('yayasan_id', {{ $yayasan->id }});

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('donateYayasan') }}",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: (data) => {
                                if(data.success) {
                                    swal.fire({
                                        title: 'Donasi Berhasil',
                                        text: data.message,
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if(result.isConfirmed) {
                                            window.location.replace("{{ route('profileDonatur') }}");
                                        }
                                    });
                                } else {
                                    swal.fire({
                                        title: 'Donasi Gagal',
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
                @endif
            @endauth
        })
    </script>
@endsection
