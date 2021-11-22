@extends('layouts.details')

@section('content')
@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="email">Email </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus >
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
            required >
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="password_confirmation">Password again </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" id="password_confirmation"
            type="password"
            name="password_confirmation"
            required>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row pt-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label"></div>
        <div class="col-lg-3 data">
            <input type="submit" value="Reset password" class="btn btn-primary">
        </div>
        <div class="col-lg-3"></div>
    </div>
</form>
@endsection
