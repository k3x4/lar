@extends('layouts.main')

@section('page_title', 'Reset Password')

@section('content')

<div class="container clearfix">

    <div class="card divcenter noradius noborder" style="max-width: 400px;">
        <div class="card-body" style="padding: 40px;">

            @if (session('status'))
                <div class="style-msg successmsg">
                    <div class="sb-msg">
                        <i class="icon-thumbs-up"></i>
                        {{ session('status') }}
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            @endif

            <form id="login-form" name="login-form" class="nobottommargin" action="{{ route('password.email') }}" method="post">
                
                @csrf

                <h3>{{ __('Reset Password') }}</h3>

                <label for="email">{{ __('E-Mail Address') }}:</label>
                <div class="col_full">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div class="style-msg errormsg">
							<div class="sb-msg">
                                <i class="icon-remove"></i>
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
						</div>
                    @endif
                </div>

                <div class="col_full nobottommargin">
                    <button type="submit" class="button button-3d nomargin">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection