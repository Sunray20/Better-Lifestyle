@extends('layouts.details')

@section('content')
@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="email">Email </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus >
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="password">Password </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" id="password"
                type="password"
                name="password"
                required autocomplete="current-password" >
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 ">
            <input class="form-check-input" type="checkbox" name="remember">
            <label class="form-label" for="remember_me">Remember me</label>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row pt-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">
            @if (Route::has('password.request'))
                <a class="btn btn-secondary" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        <div class="col-lg-3 data">
            <input type="submit" value="Log in" class="btn btn-primary">
        </div>
        <div class="col-lg-3"></div>
    </div>
</form>
@endsection
