@extends('layouts.main')

@section('page_title', 'Register')

@section('content')

<div class="container clearfix">

    <div class="center bottommargin-sm clearfix">
        <a href="{{ route('login') }}" class="button button-3d button-white button-light">{{ __('Login') }}</a>
        <a href="#" class="button button-3d">{{ __('Register') }}</a>
    </div>

    <div class="card divcenter" style="max-width: 400px;">
        <div class="card-body" style="padding: 40px;">
            <h3>Register for an Account</h3>

            <form id="register-form" name="register-form" class="nobottommargin" action="{{ route('register') }}" method="post">

                @csrf

                <div class="col_full">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" />
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
                    <label for="password">Choose Password:</label>
                    <input type="password" id="password" name="password" value="" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" />
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
                    <label for="password_confirmation">Re-enter Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" />
                    @if ($errors->has('password_confirmation'))
                        <div class="style-msg errormsg">
                            <div class="sb-msg">
                                <i class="icon-remove"></i>
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col_full nobottommargin">
                    <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register">Register Now</button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection