@extends('layouts.app')

@section('content')

<div class="container" style="width:35%">
<div class="box-log" style="margin-top:100px">
<form class="text-center border p-5" method="POST" action="{{ route('register') }}">
@csrf
    <p class="h4 mb-4">Register</p>

    <div class="form-row mb-4">
        <div class="col">
            <input type="text" id="defaultRegisterFormFirstName" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="First name">
            
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    
    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input type="password" id="defaultRegisterFormPassword" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input type="password" id="defaultRegisterPhonePassword" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

    <button class="btn btn-info my-4 btn-block" type="submit">{{ __('Register') }}</button>
</form>
</div>
</div>
@endsection
