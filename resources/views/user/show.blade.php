@extends('layouts.details')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">Sex:  </div>
        <div class="col-lg-3 col-sm-12 data">{{ $user->sex ? 'Female' : 'Male'}}</div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-0"></div>
        <div class="col-lg-3 data-label">Age: </div>
        <div class="col-lg-3 data">{{ $user->age }}</div>
        <div class="col-lg-3 col-md-0"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">Height: </div>
        <div class="col-lg-3 data">{{ $user->height }} {{ $user->height_unit }}</div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">Current weight: </div>
        <div class="col-lg-3 data">{{ $user->weight }} {{ $user->weight_unit }}</div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">Target weight: </div>
        <div class="col-lg-3 data">{{ $user->target_weight }} {{ $user->weight_unit }}</div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">Activity level: </div>
        <div class="col-lg-3 data">{{ $user->activityLevel->name }}</div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">Target Calories: </div>
        <div class="col-lg-3 data">{{ $user->target_kcal }} kcal</div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">Followed diets: </div>
        <div class="col-lg-3 data">
            @if ($user->dietTypes->isEmpty())
                <span>No diet is followed!</span>
            @else
                @foreach ($user->dietTypes as $type)
                    <span>{{ $type->name }},</span>
                @endforeach
            @endif
        </div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row pt-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label"><a href="/user/{{ $user->id }}/edit" class="btn btn-primary">Edit my data</a></div>
        <div class="col-lg-3 data">
            <form action="/user/{{ $user->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete my account</button>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection
