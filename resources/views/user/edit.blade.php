<x-bootstrap-layout/>
<form action="/user/{{ $user->id }}" method="POST">
    @csrf
    @method('PUT')
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
    <div>
        <label for="sex">Male</label>
        <input type="radio" name="sex" value="0" {{ $user->sex == '0' ? 'checked' : '' }}>
        <label for="sex">Female</label>
        <input type="radio" name="sex" value="1" {{ $user->sex == '1' ? 'checked' : '' }}>
    </div>
    <div>
        <label for="age">Age: </label>
        <input type="text" name="age" value="{{ $user->age }}">
    </div>
    <div>
        <label for="height">Height: </label>
        <input type="text" name="height" id="height" value="{{ $user->height }}">
    </div>

    <div>
        <label for="height_unit">cm</label>
        <input onclick="transformHeight(this)" type="radio" id="cm" name="height_unit" value="cm" {{ $user->height_unit == 'cm' ? 'checked' : '' }}>
        <label for="height_unit">feet</label>
        <input onclick="transformHeight(this)" type="radio" id="feet" name="height_unit" value="feet" {{ $user->height_unit == 'feet' ? 'checked' : '' }}>
    </div>

    <div>
        <label for="weight">Current weight: </label>
        <input type="text" name="weight" id="weight" value="{{ $user->weight }}">
    </div>
    <div>
        <label for="weight_unit">kg</label>
        <input onclick="transformWeight(this)" id="kg" type="radio" name="weight_unit" value="kg" {{ $user->weight_unit == 'kg' ? 'checked' : '' }}>
        <label for="weight_unit">pound</label>
        <input onclick="transformWeight(this)" id="pound" type="radio" name="weight_unit" value="pound" {{ $user->weight_unit == 'pound' ? 'checked' : '' }}>
    </div>
    <div>
        <label for="target_weight">Target weight({{ $user->weight_unit }}): </label>
        <input type="text" name="target_weight" id="target_weight" value="{{ $user->target_weight }}">
    </div>

    <div>
        <label for="activity_level">Activity level: </label>
        <!-- TODO: Create incompatible food and diet logic.
            Add design -->
        <select name="activity_level" id="activity_level">
            @foreach ($activityLevels as $activityLevel)
                <option value="{{ $activityLevel->id }}"
                    {{ ($activityLevel->id == $user->activityLevel->id) ? 'selected' : '' }}>{{ $activityLevel->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        Followed diets:
        @foreach ($user->dietTypes as $type)
            <input type="checkbox" name="{{ $type->name }}" checked>
            <label for="{{ $type->name }}">{{ $type->name }}</label>
        @endforeach
        @foreach ($unselectedDietTypes as $type)
            <input type="checkbox" name="{{ $type->name }}">
            <label for="{{ $type->name }}">{{ $type->name }}</label>
        @endforeach
    </div>
    <div>
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
</form>
<a href="{{ url()->previous() }}">Return</a>

<script>
    let height = document.getElementById('height');
    let heightLastChecked = (document.getElementById('cm').checked)
                            ? document.getElementById('cm') : document.getElementById('feet');


    let weight = document.getElementById('weight');
    let targetWeight = document.getElementById('target_weight');
    let weightLastChecked = (document.getElementById('kg').checked)
                            ? document.getElementById('kg') : document.getElementById('pound');

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
