@extends('layouts.app')

@section('content')
    {{--Banner--}}
    <div class="overlayBackgroundDonation centerItem homeBanner" style="flex-direction: column">
        <div class="displayText1 w-50 textWhite mb-2" style=" line-height: 120%;">Donasi Barang Online untuk Orang yang Kita Cintai.</div>
        <div class="displayText2 w-50 textWhite mb-3">
            Karena Anda mendapatkan lebih banyak kegembiraan karena memberikan kegembiraan kepada orang lain, Anda harus memikirkan dengan baik kebahagiaan yang dapat Anda berikan.
        </div>
        <a type="button" href="{{ route('yayasanList') }}" class="btn btn-light btn-lg btn-block rounded-pill paddingButton">Donasi Sekarang</a>
    </div>
    {{--Advantage --}}
    <div class="pt-5 pb-5">
        <div class="centerItem mb-4" style="flex-direction: column;">
            <div class="displayText2" style="color: lightseagreen; font-weight: bold">
                Apa yang diharapkan

            </div>

            <div class="displayText1 w-50 mb-2" style="font-size: 40px; line-height: 120%; ">
                Inspirasi Donasi Barang
                <br>
                di Peduli Donasi
            </div>

            <div class="centerItem mb-4" style="width: 50%">
                Jangan khawatir tentang apa pun, kami siap membantu Anda dalam Donasi Barang.
            </div>
        </div>
        <div data-aos="fade" data-aos-delay="200">
            {{--        Advantage--}}
            <div class="center">
                <div class="container" style="max-height: max-content;">
                    <div class="row" >
                        <div class="col-lg-4 col-sm-12">
                            <div class="centerItem" style="padding: 10px; flex-direction: column">
                                <div class="center imgBurn mb-4">
                                    <img class="d-block " src="{{ asset('storage/healthcare.png') }}" style="height: 100px">
                                </div>
                                <h5 class="displayText1 centerItem" style="font-size: 20px; width: 100%">Mudah Diakses</h5>
{{--                                    <p class="w-75">--}}
{{--                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.--}}
{{--                                    </p>--}}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="centerItem" style="padding: 10px; flex-direction: column">
                                <div class="center imgBurn mb-4">
                                    <img class="d-block " src="{{ asset('storage/healthcare.png') }}" style="height: 100px">
                                </div>
                                <h5 class="displayText1 centerItem" style="font-size: 20px; width: 100%">Aman</h5>
{{--                                    <p class="w-75">--}}
{{--                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.--}}
{{--                                    </p>--}}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="centerItem" style="padding: 10px; flex-direction: column">
                                <div class="center imgBurn mb-4">
                                    <img class="d-block " src="{{ asset('storage/healthcare.png') }}" style="height: 100px">
                                </div>
                                <h5 class="displayText1 centerItem" style="font-size: 20px; width: 100%">Yayasan Terpercaya</h5>
{{--                                    <p class="w-75">--}}
{{--                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.--}}
{{--                                    </p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>


        </div>
    </div>

    <div class="backgroundForumGradient centerItem" style="max-height: max-content">
        <div class="row">
            <div class="col-lg-6 p-5 centerItem">
                <img class="d-block" src="{{ asset('storage/ForumIllu.png') }}" style="height: 400px">
            </div>

            <div class="col-lg-6 p-5" style="display:flex; flex-direction: column; justify-content: center; text-align: start; align-items: start">
                <div class="displayText1 mb-3" style="font-size: 40px; line-height:110%; color: white">Bergabunglah dengan Kami<br>Forum Diskusi</div>
                <div class="w-75" style="color: white">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</div>
                <a type="button" href="{{ route('forum') }}"class="btn mt-5 btn-light btn-lg btn-block rounded-pill paddingButton">Join Forum</a>
            </div>
        </div>
    </div>
    {{--        Popular Business--}}
    <div class="center container mt-5 mb-5" style="min-height: 300px; max-height: max-content">

        <div class="displayText2" style="color: lightseagreen; font-weight: bold">
            Menyalurkan Donasi Barang

        </div>

        <div class="displayText1 mb-2" style="font-size: 40px; line-height: 120%; ">
            Daftar Yayasan
        </div>

        <div class="blog" style="padding-bottom: 30px">
            <div class="center container">
                <div class="owl-carousel owl-theme blog-post">
                    @foreach($yayasan as $y)
                        <div class="blog-content" data-aos="fade-right">
                            <div class="boxShadow" style="min-height: max-content">
                                <img src="{{ asset('storage/' . $y->logo) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="card-img-top" style="width: 100%; height: 230px; object-fit: cover">
                                <div class="p-3">

                                    <div style="padding-bottom: 20px">
                                        <h5 class="card-title displayText2" style="color: lightseagreen; font-weight: normal;">{{ $y->city }}</h5>
                                        <h5 class="card-title hideOverflowText mb-3 fw-bold" style="color: black; font-size: 20px;">{{ $y->name }}</h5>
                                        <div class="hideOverflowText2 mb-3">
                                            {{ $y->description }}
                                        </div>

                                        <div>
                                            <div class="fw-bold">What We Need :</div>
                                            <div style="display: flex; gap: 10px">
                                                @if($y->kategoriDonasiYayasan !== null)
                                                    @foreach($y->kategoriDonasiYayasan as $kdy)
                                                        @if($kdy !== null && $kdy->kategoriDonasi !== null)
                                                            <div class="">
                                                                <i class="fa-solid circleIcon {{ $kdy->kategoriDonasi->css_class_name_color }} {{ $kdy->kategoriDonasi->css_class_name_icon }}"></i>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('yayasanDetail') }}?id={{ $y->id }}"  class="btn w-100 button1">Donasi</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>


    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection

