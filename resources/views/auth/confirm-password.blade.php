@extends('layouts.details')

@section('content')
@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach
<h5>This is a secure area of the application. Please confirm your password before continuing.</h5>
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="password">Password </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" id="password"
            type="password"
            name="password"
            required autocomplete="current-password">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row pt-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label"></div>
        <div class="col-lg-3 data">
            <input type="submit" value="Confirm" class="btn btn-primary">
        </div>
        <div class="col-lg-3"></div>
    </div>
</form>
@endsection
