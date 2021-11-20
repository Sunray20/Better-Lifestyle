@extends('layouts.details')

@section('content')

<h5>Forgot your password?</h5>
<h6 class="pb-4">Let us know your email address and we will email you a password reset link that will allow you to choose a new one.</h6>
    <form method="POST" action="{{ route('password.email') }}">
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

        <div class="row pt-4">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 data text-center">
                <input type="submit" value="Get password" class="btn btn-primary">
            </div>
            <div class="col-lg-3"></div>
        </div>
    </form>
@endsection
