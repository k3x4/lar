@extends('layouts.main')

@section('page_title', 'Reset Password')

@section('content')

<div class="container clearfix">

    <div class="card divcenter noradius noborder" style="max-width: 400px;">

        <div class="card-body">
            <form method="POST" action="{{ route('password.request') }}">

                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <h3>{{ __('Reset Password') }}</h3>

                <h4 style="color:#999;">{{ __('Email:') }} {{ $email ?? old('email') }}</h4>
                <input id="email" type="hidden" name="email" value="{{ $email ?? old('email') }}" required readonly>

                <label for="password">{{ __('Password') }}</label>
                <div class="col_full">
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

                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <div class="col_full">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
                    <button type="submit" class="button button-3d nomargin">
                        {{ __('Reset Password') }}
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
