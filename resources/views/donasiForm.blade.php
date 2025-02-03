@extends('layouts.app')

@section('content')
    {{--Banner--}}
    <div class="container" style="margin-top: 100px; margin-bottom: 100px; background-color: white">
        <h1>Donasi Yayasan A</h1>
        <form>
            <div class="form-group pt-3">
                <label for="exampleFormControlInput1">Input Gambar</label>
                <div class="parent5">

                    <div class="imageContainer">
                        <div class="addImage centerItem">
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

                            <div style="font-size: 50px; line-height: 1">
                                <i class="fa-solid fa-image"></i>
                            </div>

                            <div>
                                Gambar Utama
                            </div>

                        </div>
                        <input class="form-control d-none inputImage" onchange="changeImage(this)" name="profile_image" type="file">
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

                                <button type="button" class="btn btn-danger fullOpacity removeImage">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </div>

                            <div style="font-size: 50px; line-height: 1">
                                <i class="fa-solid fa-image"></i>
                            </div>

                            <div>
                                Gambar Utama
                            </div>

                        </div>
                        <input class="form-control d-none inputImage" onchange="changeImage(this)" name="profile_image" type="file">
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

                                <button type="button" class="btn btn-danger fullOpacity removeImage">
                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                </button>
                            </div>

                            <div style="font-size: 50px; line-height: 1">
                                <i class="fa-solid fa-image"></i>
                            </div>

                            <div>
                                Gambar Utama
                            </div>

                        </div>
                        <input class="form-control d-none inputImage" onchange="changeImage(this)" name="profile_image" type="file">
                    </div>
                </div>
            </div>

            <div class="form-group pt-3">
                <label for="exampleFormControlInput1">Nama Lengkap</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Nama">
            </div>

            <div class="form-group pt-3">
                <label for="exampleFormControlInput1">Alamat Pengirim</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input Alamat">
            </div>

            <div class="form-group pt-3">
                <label for="exampleFormControlInput1">Nomor Telepon</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Input Nomor Telepon">
            </div>
            <div class="form-group pt-3">
                <label for="exampleFormControlSelect1">Tujuan Donasi</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Amal</option>
                    <option>Alasan 2</option>
                    <option>Alasan 3</option>
                    <option>Alasan 4</option>
                    <option>Alasan 5</option>
                </select>
            </div>



            <div class="form-group pt-3">
                <label for="exampleFormControlSelect1">Kondisi Barang</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Baru</option>
                    <option>Bekas</option>
                </select>
            </div>
            <div class="form-group pt-3">
                <label for="exampleFormControlInput1">Jumlah Barang</label>
                <input type="number" class="form-control" value="1" min="1" id="exampleFormControlInput1">
            </div>
            <div class="form-group pt-3">
                <label for="exampleFormControlTextarea1">Deskripsi Barang</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Input Deskripsi Barang" rows="2"></textarea>
            </div>

            <br>

            <button type="submit" class="btn button1">Submit Donasi</button>
        </form>
    </div>

    <script src="{{ asset('js/donasi.js') }}" defer></script>
@endsection

