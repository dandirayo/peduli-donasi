@extends('layouts.app')

@section('content')
    {{--Banner--}}
    <div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-sm-10 col-lg-7 pt-5" style="border-bottom : 1px solid lightgray">
                <div>
                    <div class="displayText2" style="font-size: 13px; color: lightseagreen;">
                        {{ $article->created_at }}
                    </div>
                    <h1>{{ $article->title }}</h1>
                    <div class="displayText2">
                        by {{ $article->user->name }}
                    </div>
                </div>
                <img src="{{ asset('/storage/images/article/' . $article->image) }}" onerror="this.onerror=null; this.src='{{ asset('/storage/images/noimage.png') }}'" class="mb-4 mt-5" style="width: 100%; height: 500px; object-fit: cover">
                <div class="mb-5">
                    {{ $article->description }}
                </div>
            </div>
            <div class="col-1" style="border-right : 1px solid lightgray;"></div>
            <div class="col-sm-12 col-lg-3">
                <h4 class="px-5 pt-5">Other Articles</h4>
                @foreach($otherArticles as $oa)
                    <div style="min-height: max-content">
                        <div class="px-5 py-3">
                            <div style="padding-bottom: 20px">
                                <h5 class="card-title hideOverflowText  fw-bold mb-3" style="color: black; font-size: 20px;">{{ $oa->title }}</h5>
                                <div class="hideOverflowText3">
                                    {{ $oa->description }}
                                </div>
                            </div>
                            <a href="{{ route('artikelDetail') }}?id={{ $oa->id }}" style="color: lightseagreen; text-decoration: none">See Article</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

