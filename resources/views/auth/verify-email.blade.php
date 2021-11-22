@extends('layouts.details')

@section('content')
    <h5>Thanks for signing up!</h5>
    <h6>Before getting started, could you verify your email address by clicking on the link we just emailed to you?</h6>
    <h6>If you didn't receive the email, we will gladly send you another.</h6>

    @if (session('status') == 'verification-link-sent')
        <p class="mt-2 text-primary">A new verification link has been sent to the email address you provided during registration.</p>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="row pt-3">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 data text-center">
                    <input type="submit" value="Resend Verification Email" class="btn btn-primary">
                </div>
                <div class="col-lg-3"></div>
            </div>
        </form>
    </div>
@endsection
