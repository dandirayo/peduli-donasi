@extends('layouts.app')

@section('content')
    <div class="backgroundSec p-5">
        <div class="container p-5  boxShadow w-75" style="background-color: white; flex-direction: column">
            <div class="centerItem mb-5 flex-column">
                <div class="displayText1" style="font-size: 40px; color: lightseagreen">Hal Yang Sering Ditanyakan</div>
                <div class="displayText2 mb-5">Tidak dapat menemukan jawaban Anda? Email kami di faq@pedulidonasi.com</div>
            </div>
            @foreach($faq as $f)
                <div class="d-flex flex-row my-3 questionFaq">
                    <div class="displayText2 fw-bold iconFaq" style="color: lightseagreen; font-size: 20px;">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="d-flex flex-column faqContent">
                        <div class="displayText2 fw-bold px-3 hoverGreen" style="font-size: 20px;">
                            {{ $f->title }}
                        </div>
                        <div class="displayText2 px-3 py-3 answerFaq" style="display: none;">
                            {{ $f->description }}
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('js/faq.js') }}" defer></script>
@endsection
