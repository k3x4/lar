@extends('layouts.main')

@section('page_title', 'Login')

@section('content')

<div class="container clearfix">

    <div class="center bottommargin-sm clearfix">
        <a href="#" class="button button-3d">{{ __('Login') }}</a>
        <a href="{{ route('register') }}" class="button button-3d button-white button-light">{{ __('Register') }}</a>
    </div>

    <div class="card divcenter" style="max-width: 400px;">
        <div class="card-body" style="padding: 40px;">
            <form id="login-form" name="login-form" class="nobottommargin" action="{{ route('login') }}" method="post">
                @csrf

                <h3>Login to your Account</h3>

                <div class="col_full">
                    <label for="email">Email:</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <div class="style-msg errormsg">
                            <div class="sb-msg">
                                <i class="icon-remove"></i>
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col_full">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <div class="style-msg errormsg">
                            <div class="sb-msg">
                                <i class="icon-remove"></i>
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col_full">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="col_full nobottommargin">
                    <button type="submit" class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">
                        {{ __('Login') }}
                    </button>
                    <a href="{{ route('password.request') }}" class="fright">Forgot Password?</a>
                </div>

                <div class="line line-sm"></div>

                <div class="center">
                    <h4 style="margin-bottom: 15px;">or Login with:</h4>
                    <a href="{{ url('social/redirect/facebook') }}" class="button button-rounded si-facebook si-colored">Facebook</a>
                    <span>or</span>
                    <a href="#" class="button button-rounded si-google si-colored">Google</a>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection

