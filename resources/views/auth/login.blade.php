@extends('layouts.app')

@section('content')
    <div class="backgroundSec">
        <div class="justify-content-center align-items-center p-5">
            <div class="centerItem">
                <div class="card">
                    <div class="row boxShadow"  style="width: 60vw;height: 500px;">
                        <div class="col-lg-5 col-md-12 p-5 centerItem" style="flex-direction: column">
                            <div class=" displayText1 mb-3" style="font-size: 30px">
                                LOGIN
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div>
                                    <div>
                                        <input id="email" type="email" class="inputLogin @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <input id="password" type="password" class="inputLogin @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div>
                                        <div style="text-align: start">
                                            @if (Route::has('password.request'))
                                                <a style="text-decoration: none; color: lightseagreen" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Password ?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0 mt-5">
                                    <div>
                                        <button type="submit" class="btn w-100 button1 rounded-pill mb-2">
                                            {{ __('Login') }}
                                        </button>
                                        <div>
                                            Didn't have an account? <a href="{{ route('register') }}" style="text-decoration:none; color: lightseagreen"> Register here </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-7 col-md-12 backgroundLogin centerItem">
                            <img class="d-block" src="{{ asset('storage/Logo.png') }}" style="height: 8vw">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
