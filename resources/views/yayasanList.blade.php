@extends('layouts.app')

@section('content')
    {{--Banner--}}
    <div class="backgroundPrimary pt-5">
        <div class="container p-5">
            <h1 style="color: white">Daftar Yayasan</h1>
            <div style="color: white" class="displayText2">
                Yayasan dibawah ini membutuhkan donasi kalian.
            </div>
            <div class="input-group my-3" style="border-radius: 5px">
                <div class="input-group-prepend">
                        <span class="input-group-text searchBar1" style="border-radius: 20px 0px 0px 20px; height: 37px">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                </div>
                <input type="text" id="searchText" class="form-control form-control2 searchBar1" placeholder="Search Donations" aria-label="Amount (to the nearest dollar)" autocomplete="off">

            </div>
        </div>
    </div>
    <div class="container">
        <div style="margin: 60px 0 60px 0">
            <div class="row">
                @foreach($yayasan as $y)
                    <div class="col-md-6 col-lg-4" style="padding: 20px;">

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
                                            <div class="fw-bold">Kami Butuh :</div>
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

                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-end">
                {{ $yayasan->links() }}
            </div>
        </div>
    </div>

{{--    <script src="{{ asset('js/home.js') }}" defer></script>--}}
    <script src="{{ asset('js/donasiList.js') }}" defer></script>
@endsection

