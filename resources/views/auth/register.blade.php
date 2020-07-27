{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">


    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="" name="password_confirmation" required
                autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('css/auth.style.css') }}">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                            @csrf

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class=" @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Your Name">

                                    @error('name')
                                    <span style="display: block; color: red; font-size: 12px" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>

                                <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Email">

                                @error('email')
                                <span style="display: block; color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="city"><i class="zmdi zmdi-city"></i></label>
                                <input id="city" type="text" class=" @error('city') is-invalid @enderror" name="city"
                                    value="{{ old('city') }}" required autocomplete="city" placeholder="City">

                                @error('city')
                                <span style="display: block; color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="street_name"><i class="zmdi zmdi-pin"></i></label>

                                <input id="street_name" type="text" class=" @error('street_name') is-invalid @enderror"
                                    name="street_name" value="{{ old('street_name') }}" required
                                    autocomplete="street_name" placeholder="Street Name">

                                @error('street_name')
                                <span style="display: block; color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group ">
                                <label for="pass"><i class="zmdi zmdi-n-1-square"></i></label>
                                <input id="street_num" type="text" class=" @error('street_num') is-invalid @enderror"
                                    name="street_num" value="{{ old('street_num') }}" required autocomplete="street_num"
                                    placeholder="Street Number">

                                @error('street_num')
                                <span style="display: block; color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-local-post-office"></i></label>
                                <input id="post_code" type="text" class=" @error('post_code') is-invalid @enderror"
                                    name="post_code" value="{{ old('post_code') }}" required autocomplete="post_code"
                                    placeholder="Post Code">
                                @error('post_code')
                                <span style="display: block; color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                <span style="display: block; color: red; font-size: 12px" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input id="password-confirm" type="password" class="" name="password_confirmation"
                                    required autocomplete="new-password" placeholder="Repeat your Password">
                            </div>
                            <div class="form-group " style="margin-top: 15px;">
                                <input type="submit" value="Create an Account" class="btn btn-primary"
                                    style="background-color:#FDA403; border-color: #FDA403; color:#fff; cursor: pointer;" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('images/menu_1.jpg') }}" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
