@extends('layouts.main')

@section('page_title', 'Login')

@section('content')

<div class="container clearfix">

    <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

        <ul class="tab-nav tab-nav2 center clearfix">
            <li class="inline-block"><a href="#tab-login">Login</a></li>
            <li class="inline-block"><a href="#tab-register">Register</a></li>
        </ul>

        <div class="tab-container">

            <div class="tab-content clearfix" id="tab-login">
                <div class="card nobottommargin">
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
                                <a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
                                <span>or</span>
                                <a href="#" class="button button-rounded si-google si-colored">Google</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="tab-content clearfix" id="tab-register">
                <div class="card nobottommargin">
                    <div class="card-body" style="padding: 40px;">
                        <h3>Register for an Account</h3>

                        <form id="register-form" name="register-form" class="nobottommargin" action="{{ route('register') }}" method="post">

                            @csrf

                            <div class="col_full">
                                <label for="register-email">Email Address:</label>
                                <input type="text" id="register-email" name="register-email" value="" class="form-control" />
                                @if ($errors->has('register-email'))
                                    <div class="style-msg errormsg">
                                        <div class="sb-msg">
                                            <i class="icon-remove"></i>
                                            <strong>{{ $errors->first('register-email') }}</strong>
                                        </div>
						            </div>
                                @endif
                            </div>

                            <div class="col_full">
                                <label for="register-password">Choose Password:</label>
                                <input type="password" id="register-password" name="register-password" value="" class="form-control" />
                                @if ($errors->has('register-password'))
                                    <div class="style-msg errormsg">
                                        <div class="sb-msg">
                                            <i class="icon-remove"></i>
                                            <strong>{{ $errors->first('register-password') }}</strong>
                                        </div>
						            </div>
                                @endif
                            </div>

                            <div class="col_full">
                                <label for="register-password_confirmation">Re-enter Password:</label>
                                <input type="password" id="register-password_confirmation" name="register-password_confirmation" value="" class="form-control" />
                                @if ($errors->has('register-password_confirmation'))
                                    <div class="style-msg errormsg">
                                        <div class="sb-msg">
                                            <i class="icon-remove"></i>
                                            <strong>{{ $errors->first('register-password_confirmation') }}</strong>
                                        </div>
						            </div>
                                @endif
                            </div>

                            <div class="col_full nobottommargin">
                                <button class="button button-3d button-black nomargin" id="register-submit" name="register-submit" value="register">Register Now</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection