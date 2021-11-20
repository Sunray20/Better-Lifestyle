@extends('layouts.bootstrap-layout')

@section('content')
    <div class="justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-4">
                <div class="flex-fill">
                    <img class="masthead-avatar mb-5" src="{{ asset('images/fitness.svg') }}" alt="..." />
                </div>
            </div>
            <div class="col-md-8">
                <div class="flex-fill">
                    <h1 class="masthead-heading text-uppercase mb-0">A healthier way of life</h1>
                    <div class="divider-custom divider-light">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-dumbbell"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <p class="masthead-subheading font-weight-light mb-0">Workouts - Exercises - Diets</p>
                </div>
            </div>
        </div>
    </div>

@endsection
