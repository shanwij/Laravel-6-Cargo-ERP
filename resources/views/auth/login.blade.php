@extends('layouts.app')

@section('content')

<div class="container" style="width:35%">
    <div class="box-log" style="margin-top:120px">
        <form method="POST" class="text-center border p-5" action="{{ route('login') }}">
        @csrf
            <p class="h4 mb-4">Sign in</p>
            <input id="defaultLoginFormEmail" type="email" class="form-control @error('email') is-invalid @enderror mb-4" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input type="password" id="defaultLoginFormPassword" class="form-control @error('password') is-invalid @enderror mb-4" name="password" required autocomplete="current-password" placeholder="Password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="d-flex justify-content-around">
                <div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                        <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                    </div>
                </div>
                <!--<div>
                    <a href="">Forgot password?</a>
                </div>-->
            </div>
            <button class="btn btn-info btn-block my-4" type="submit">{{ __('Login') }}</button>
            <p><a href="">Create an account.</a></p>
        </form>
    </div>
</div>
@endsection
