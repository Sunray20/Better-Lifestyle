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
        <label for="height">Height: </label>
        <input type="text" name="height" value="{{ $user->height }}">
    </div>

    <div>
        <label for="height_unit">cm</label>
        <input type="radio" name="height_unit" value="cm" {{ $user->height_unit == 'cm' ? 'checked' : '' }}>
        <label for="height_unit">inch</label>
        <input type="radio" name="height_unit" value="inch" {{ $user->height_unit == 'inch' ? 'checked' : '' }}>
    </div>

    <div>
        <label for="weight">Current weight: </label>
        <input type="text" name="weight" value="{{ $user->weight }}">
    </div>
    <div>
        <!-- TODO: Add dynamic calculation of weight based on the selected value -->
        <label for="weight_unit">kg</label>
        <input type="radio" name="weight_unit" value="kg" {{ $user->weight_unit == 'kg' ? 'checked' : '' }}>
        <label for="weight_unit">pound</label>
        <input type="radio" name="weight_unit" value="pound" {{ $user->weight_unit == 'pound' ? 'checked' : '' }}>
    </div>
    <div>
        <label for="target_weight">Target weight({{ $user->weight_unit }}): </label>
        <input type="text" name="target_weight" value="{{ $user->target_weight }}">
    </div>
    <div>
        <p>Target Calories: {{ $user->target_kcal }}</p>
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
