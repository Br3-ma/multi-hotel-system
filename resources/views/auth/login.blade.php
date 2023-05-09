<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Innap : Hotel Admin Template" />
    <meta property="og:title" content="Innap : Hotel Admin Template" />
    <meta property="og:description" content="Innap : Hotel Admin Template" />
    <meta property="og:image" content="https://innap.dexignzone.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Shamba : Loge Management System</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/lgoavt.png" />
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
</head>

<body class="vh-100">
<div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-end h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
                                        <a href="{{ route('dashboard')}}"><img width="230"src="{{ asset('public/img/1.png')}}" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        {{-- <div class="mb-3">

                                            <label class="mb-1"><strong>Choose Lodge</strong></label>
                                            <select type="lodge" class="form-control" value="hello@example.com">
                                                        <option disabled selected value="Select Lodge">Select Lodge</option>
                                                        <option Value="Thornicroft">Thornicroft</option>
                                                        <option value="maramba">Maramba</option>
                                                        <option value="">Nsofu</option>
                                                        <option value="">Shamba</option>

                                            </select>
                                        </div> --}}
                                        <div class="mb-3">

                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" :value="old('email')" required autofocus autocomplete="username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" required autocomplete="current-password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                                    <label class="form-check-label" for="remember_me">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    {{-- <script src="{{ asset('theme/vendor/global/global.min.js')}}"></script> --}}
    {{-- <script src="{{ asset('theme/js/custom.min.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/deznav-init.js') }}"></script> --}}
</body>

</html>