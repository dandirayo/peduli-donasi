@extends('layouts.app')

@section('content')
    {{--Banner--}}
    {{--Banner--}}
    <div class="backgroundPrimary pt-5">
        <div class="container p-5">
            <h1 style="color: white">Daftar Artikel</h1>
            <div style="color: white" class="displayText2">
                Artikel yang dapat menginspirasi pembaca.
            </div>
        </div>
    </div>
    <div class="container">
        <div style="margin: 60px 0 60px 0">
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-sm-12 col-md-6 col-lg-4" style="padding: 20px;">

                        <div class="blog-content" data-aos="fade-right">
                            <div class="boxShadow" style="min-height: max-content">
                                <img src="{{ asset('storage/' . $article->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="card-img-top" style="width: 100%; height: 230px; object-fit: cover">
                                <div class="p-3">

                                    <div style="padding-bottom: 20px">
                                        <h5 class="time-ago card-title displayText2 " style="color: lightseagreen;font-size:13px; font-weight: normal;">
                                            {{ $article->created_at }}
                                        </h5>
                                        <h5 class="card-title hideOverflowText fw-bold" style="color: black; font-size: 20px;">{{ $article->title }}</h5>
                                        <div class="displayText2  mb-3" style="font-size:13px;">
                                            by {{ $article->user->name }}
                                        </div>
                                        <div class="hideOverflowText3">
                                            {{ $article->description }}
                                        </div>
                                    </div>
                                    <a href="{{ route('artikelDetail') }}?id={{ $article->id }}" class="btn w-100 button1">Baca Artikel</a>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end">
                {{ $articles->links() }}
            </div>
        </div>
    </div>


    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection

