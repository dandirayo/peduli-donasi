@extends('layouts.app')

@section('content')
    <div class="backgroundSec">
        <div class="justify-content-center align-items-center p-5">
            <div class="centerItem">
                <div class="card">
                    <div class="row boxShadow"  style="width: 60vw;height: fit-content;">
                        <div class="col-lg-5 col-md-12 p-5 centerItem" style="flex-direction: column">
                            <div class=" displayText1 mb-3" style="font-size: 30px">
                                REGISTER
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div>
                                    <div class="justify-content-start d-flex mt-3">Name</div>
                                    <input id="name" type="text" class="mt-0 inputLogin @error('name') is-invalid @enderror" name="name" placeholder="Input your complete name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div>
                                    <div class="justify-content-start d-flex mt-3">Email</div>
                                    <input id="email" type="email" class="mt-0 inputLogin @error('email') is-invalid @enderror" name="email" placeholder="Input your email address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div>
                                    <div class="justify-content-start d-flex mt-3">Phone Number</div>
                                    <input id="phone" class="mt-0 inputLogin @error('phone') is-invalid @enderror" name="phone" placeholder="Masukan nomor telepon" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div>
                                    <div class="justify-content-start d-flex mt-3">Select Role</div>
                                    <select class="btn dropdown-toggle w-100 text-start btn-outline-secondary" id="role_id" name="role_id">
                                        <option value="2">Donatur</option>
                                        <option value="3">Yayasan</option>
                                    </select>
                                </div>

                                <div>
                                    <div>
                                        <div class="justify-content-start d-flex mt-3">Password</div>
                                        <input id="password" type="password" class="mt-0 inputLogin @error('password') is-invalid @enderror" placeholder="Input your password" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="justify-content-start d-flex mt-3">Confirm Password</div>
                                    <input id="password-confirm" type="password" class="mt-0 inputLogin" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">
                                </div>


                                <div class="mb-0 mt-5">
                                    <div>
                                        <button type="submit" class="btn w-100 button1 rounded-pill mb-2">
                                            {{ __('Register') }}
                                        </button>
                                        <div>
                                            Already have an account? <a href="{{ route('login') }}" style="text-decoration:none; color: lightseagreen"> Login here </a>
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
