<x-bootstrap-layout/>
<form action="/user/{{ $user->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="weight"></label>
        <input type="text" name="weight" value="{{ $user->weight }}">
    </div>
    <div>
        <!-- TODO: Add dynamic calculation of weight based on the selected value -->
        <label for="unit">kg</label>
        <input type="radio" name="unit" value="kg" {{ $user->unit == 'kg' ? 'checked' : '' }}>
        <label for="unit">pound</label>
        <input type="radio" name="unit" value="pound" {{ $user->unit == 'pound' ? 'checked' : '' }}>
    </div>
    <div>
        <label for="target_weight"></label>
        <input type="text" name="target_weight" value="{{ $user->target_weight }}">
    </div>
    <div>
        <p>Diet Goal: {{ $user->diet_goal }}</p>
    </div>
    <div>
        <p>Target Calories: {{ $user->target_kcal }}</p>
    </div>
    <div>
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
</form>
