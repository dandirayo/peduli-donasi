<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/owl.carousel.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    @yield('topScript')

    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--  Font Awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit-icons.min.js"></script>

    {{--   AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/owl.theme.default.min.css') }}" rel="stylesheet">

    @yield('topStyle')
</head>
<body>
<div id="app">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <nav class="navbar navbar-expand-md sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img id="logoNav" class="d-block" src="{{ asset('storage/LogoGreen.png') }}" style="height: 50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @if(Auth::user() !== null && Auth::user()->role_id == 1)
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminHome') }}">Yayasan List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminArticleHome') }}">Artikel List</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('yayasanList') }}">Donasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('artikelList') }}">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('forum') }}">Forum</a>
                        </li>
                    </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->role_id==2)
                                    <a class="dropdown-item" href="{{ route('profileDonatur')  }}">
                                        User Profile
                                    </a>
                                @elseif(Auth::user()->role_id==3)
                                    @if(\App\Models\Yayasan::where('user_id', Auth::user()->id)->first() === null)
                                        <a class="dropdown-item" href="{{ route('daftarYayasan')  }}">
                                            Daftar Yayasan
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('profileYayasan')  }}">
                                            Yayasan Profile
                                        </a>
                                    @endif
                                @endif
                                @auth()
                                    <a class="dropdown-item" data-toggle="modal" data-target="#editPasswordModal">
                                        Change Password
                                    </a>
                                @endauth
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-bell"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" style="width: max-content; max-height: 400px; min-height: max-content; overflow-y: auto" aria-labelledby="navbarDropdown">
                                <div class="p-3">
                                    @for($i=0;$i<3;$i++)
                                        <div>
                                            <div>
                                                You just donated $3 to Yayasan Suka Maju
                                            </div>

                                            <div class="fw-light" style="font-size: 10px; color:  grey">
                                                12 minutes ago
                                            </div>

                                            {{--                                            ganti ke i < length-1--}}
                                            @if($i<2)
                                                <hr>
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Site footer -->
    <footer class="site-footer">

        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by Donation App
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    @auth()
        <!-- Modal Edit Password -->
        <div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>


                        <i class="fa-solid fa-xmark close pointer-event"  data-dismiss="modal"></i>
                    </div>
                    <div class="modal-body">
                        <form id="formInputChangePassword" class="p-3">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Old Password</label>
                                <input class="form-control" name="password" type="password"  id="password" placeholder="Old Password" required>
                                <span id="error-password" class="invalid-feedback" role="alert" style="display: none">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="form-group pt-3">
                                <label for="exampleFormControlTextarea1">New Password</label>
                                <input class="form-control" name="new_password" type="password" placeholder="New Password" required>
                                <span id="error-new_password" class="invalid-feedback" role="alert" style="display: none">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="form-group pt-3">
                                <label for="exampleFormControlTextarea1">Confirm Password</label>
                                <input class="form-control" name="new_password_confirmation" type="password"  id="password-confirm" placeholder="Confirm Password" required>
                                <span id="error-new_password_confirmation" class="invalid-feedback" role="alert" style="display: none">
                                    <strong></strong>
                                </span>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" form="formInputChangePassword" class="btn button1">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>

    <script>
        $(document).ready(function (e) {
            @auth()
                $('#formInputChangePassword').on('submit', function(e) {
                    e.preventDefault();

                    $('.invalid-feedback').each(function () {
                        $(this).css('display', 'none')
                    });
                    $('.form-control').each(function () {
                        $(this).removeClass('is-invalid')
                    });

                    let formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('changePassword') }}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            let swalTitle = 'Change Password Failed';
                            let swalIcon = 'error'
                            if(data.success) {
                                swalTitle = 'Change Password Success';
                                swalIcon = 'success';
                            }

                            swal.fire({
                                title: swalTitle,
                                text: data.message,
                                icon: swalIcon,
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if(result.isConfirmed) {
                                    if(data.success) location.reload();
                                }
                            });
                        },
                        error: (data) => {
                            let responseJSON = data.responseJSON;
                            if(responseJSON != null) {
                                let errors = responseJSON.errors;
                                if(errors != null) {
                                    $.each(errors, function(key, value) {
                                        let errorField = $('#error-' + key);
                                        let inputField = errorField.parent().find('input');

                                        errorField.css('display', 'block');
                                        errorField.find('strong').html(value[0]);
                                        inputField.addClass('is-invalid');
                                    });
                                }
                            }
                        }
                    })
                });
            @endauth
        })
    </script>
    @yield('js')
</body>
</html>
