@extends('layouts.app')
  
@section('content')
<style>
.login_container_left{
    background: #17c0d5;
    width: 50%;
    box-shadow: 4px 3px 23px 0 rgba(0, 0, 0, 0.2), -2px -4px 14px 0 rgba(0, 0, 0, 0.19);
    height: 177px;
}

.login_container_center{
    display: block;
    z-index: 99;
}


.login_container_right{
    background: #17c0d5;
    width: 50%;
    box-shadow: 4px 3px 23px 0 rgb(0 0 0 / 20%), -2px -4px 14px 0 rgb(0 0 0 / 19%);
    height: 177px;
}

.topless_login{
    display: flex;
    width: 100%;
}

.login_logo_riide{
    background-image: url(./../img/logo_riide.svg);
    background-repeat: no-repeat;
    background-position: center;
    width: 100px;
    position: relative;
    height: 100px;
}

.logo_svg{
    width: 165px;
    height: auto;
}

.logo_img{
    background-position: center !important;
    background-size: contain !important;
    background-repeat: no-repeat !important;
    width: 113%;
    height: 100%;
    position: relative;
    bottom: 100px;
    left: -8px;
}


@media only screen and (max-width: 1024px) {

    .login_container_left{
        height: 149px;
    }

    .login_container_center{
        display: block;
        z-index: 99;
    }


    .login_container_right{
        height: 149px;
    }

    .logo_svg{
        width: 139px;
    }

    .logo_img{
        width: 108%;
        position: relative;
        bottom: 84px;
        left: -4px;
    }


  }
</style>
<div class="topless_login">

<div class="login_container_left">

</div>

<div class="login_container_center">




    <svg class="logo_svg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         width="507px" height="545.101px" viewBox="46.5 123.766 507 545.101" enable-background="new 46.5 123.766 507 545.101">
    <g id="Capa_x0020_1">
        <path fill="#17C0D5" d="M553.5,668.532V124.099l-507-0.965v545.732c97.452,0-68.589,0,28.863,0
            c27.287,0,45.478-15.593,46.777-35.083V405.096c0-22.089,29.885-50.675,48.077-50.675c89.656,0,175.414,0,265.07,0
            c28.586,0,55.872,40.28,54.573,51.974v224.79c-1.3,10.395,16.892,35.083,45.478,36.382L553.5,668.532z"/>
    </g>
    </svg>


    <div class="logo_img" style="background: url({{ asset('img/logo_riide_black.svg') }})">
    </div>

</div>

<div class="login_container_right">

</div>

</div>

<div class="container">
<div class="row p-0 m-0 mt-5 justify-content-center w-100">
        
        <div class="col-md-12">
            
            <form method="POST" action="{{ route('login') }}" class="row">
                        @csrf

                        <div class="col-md-6 offset-md-3">
                        <div class="form-group row mt-5">
                            <div class="col-md-6 mt-2">
                                <input id="email" type="email" class="p-3 form-control bg-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('data.youre_email') }}" required autocomplete="email" autofocus>
  
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mt-2">
                                <input id="password" placeholder="{{ __('data.password') }}" type="password" class="form-control bg-white @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
  
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
   
                        <div class="form-group row">
                            
                        </div>
  
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
  
                                    <label class="form-check-label" for="remember">
                                    {{ __('data.remember_me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
  
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center pb-3">
                            @if (Route::has('password.request'))
                                    <a class="text-grey" href="{{ route('password.request') }}">
                                    {{ __('data.forgot_password') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn mt-3 btn-primary text-white font-weight-bold btn-block">
                                {{ __('data.login') }}
                                </button>
  
                                <p class="mt-3 text-center text-grey">{{ __('data.or_in_with') }}</p>
                                <div class="d-flex justify-content-center">
                                <a style="background: #3b5998 ;" class="btn text-white mr-2" href="{{ route('social.auth', 'facebook') }}"> <i class="fa fa-facebook"></i> </a>
                                <a href="{{ url('auth/google') }}" class="btn btn-danger ml-2"> <i class="fa fa-google"></i> </a> 
                                </div>
                                <p class="text-center mt-3">{{ __('data.not_account') }}<a href="/select-type-user" class=" text-center w-100"> {{ __('data.register') }}</a></p>
                                
                            </div>
                        </div>
                        </div>
                    </form>
        </div>
    </div>
</div>

    <!---->

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Laravel 6 - Login with Google Account Example - ItSolutionStuuf.com</div>
  
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
  
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
  
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
  
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
   
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
  
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
  
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
  
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
  
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
  
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <a class="btn btn-primary" href="{{ route('social.auth', 'facebook') }}">
    Facebook
</a>
                                <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                                  <strong>Login With Google</strong>
                                </a> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection