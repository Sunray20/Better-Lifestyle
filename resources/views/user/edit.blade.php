@extends('layouts.details')

@section('content')

@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach

<form action="/user/{{ $user->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <span>Sex:</span>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <label class="form-label" for="sex">Male</label>
            <input class="form-check-input" type="radio" name="sex" value="0" {{ $user->sex == '0' ? 'checked' : '' }}>
            <label class="form-label" for="sex">Female</label>
            <input class="form-check-input" type="radio" name="sex" value="1" {{ $user->sex == '1' ? 'checked' : '' }}>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="age">Age: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="age" value="{{ $user->age }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="height">Height: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="height" id="height" value="{{ $user->height }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <span>Height unit:</span>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <label for="height_unit">cm</label>
            <input class="form-check-input" onclick="transformHeight(this)" type="radio" id="cm" name="height_unit" value="cm" {{ $user->height_unit == 'cm' ? 'checked' : '' }}>
            <label for="height_unit">feet</label>
            <input class="form-check-input" onclick="transformHeight(this)" type="radio" id="feet" name="height_unit" value="feet" {{ $user->height_unit == 'feet' ? 'checked' : '' }}>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="weight">Current weight: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="weight" id="weight" value="{{ $user->weight }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <span>Weight unit:</span>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <label for="weight_unit">kg</label>
            <input class="form-check-input" onclick="transformWeight(this)" id="kg" type="radio" name="weight_unit" value="kg" {{ $user->weight_unit == 'kg' ? 'checked' : '' }}>
            <label for="weight_unit">pound</label>
            <input class="form-check-input" onclick="transformWeight(this)" id="pound" type="radio" name="weight_unit" value="pound" {{ $user->weight_unit == 'pound' ? 'checked' : '' }}>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="target_weight">Target weight({{ $user->weight_unit }}): </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="target_weight" id="target_weight" value="{{ $user->target_weight }}">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="activity_level">Activity level:
                <span   class="ms-2"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        data-bs-html="true"
                        title="
                            @foreach ($activityLevels as $activityLevel)
                                {{ $activityLevel->name . ' - ' . $activityLevel->description . '<br/>' }}
                            @endforeach
                        ">
                    <i class="fas fa-info-circle"></i>
                </span>
            </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <select class="form-select d-inline" name="activity_level" id="activity_level">
                @foreach ($activityLevels as $activityLevel)
                    <option value="{{ $activityLevel->id }}"
                        {{ ($activityLevel->id == $user->activityLevel->id) ? 'selected' : '' }}>{{ $activityLevel->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <span>Followed diets:</span>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            @foreach ($user->dietTypes as $type)
                <input class="check-input" type="checkbox" name="{{ $type->name }}" checked>
                <label class="form-check-label" for="{{ $type->name }}">{{ $type->name }}</label>
            @endforeach
            @foreach ($unselectedDietTypes as $type)
                <input class="check-input" type="checkbox" name="{{ $type->name }}">
                <label class="form-check-label" for="{{ $type->name }}">{{ $type->name }}</label>
            @endforeach
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row pt-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Return</a>
        </div>
        <div class="col-lg-3 data">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
        <div class="col-lg-3"></div>
    </div>
</form>
@endsection

<script async defer>
    var height;
    var heightLastChecked;
    var weight;
    var targetWeight;
    var weightLastChecked;

    window.addEventListener('DOMContentLoaded', (event) => {
        height = document.getElementById('height');
        heightLastChecked = (document.getElementById('cm').checked)
                                ? document.getElementById('cm') : document.getElementById('feet');

        weight = document.getElementById('weight');
        targetWeight = document.getElementById('target_weight');
        weightLastChecked = (document.getElementById('kg').checked)
                                ? document.getElementById('kg') : document.getElementById('pound');
    });

    function transformWeight(selected)
    {
        if(weightLastChecked != selected) {
            weightLastChecked = selected;

            if(document.getElementById('kg').checked) {
                weight.value = (weight.value / 2.2).toFixed(2);
                targetWeight.value = (targetWeight.value / 2.2).toFixed(2);
            } else if(document.getElementById('pound').checked) {
                weight.value = (weight.value * 2.2).toFixed(2);
                targetWeight.value = (targetWeight.value * 2.2).toFixed(2);
            }
        }
    }

    function transformHeight(selected)
    {
        if(heightLastChecked != selected) {
            heightLastChecked = selected;

            if(document.getElementById('cm').checked) {
                height.value = (height.value * 30.48).toFixed(2);
            } else if(document.getElementById('feet').checked) {
                height.value = (height.value / 30.48).toFixed(2);
            }
        }
    }

</script>
