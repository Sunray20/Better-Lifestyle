<x-bootstrap-layout/>
<div>
    <p>Sex: {{ $user->sex ? 'Female' : 'Male'}}</p>
</div>
<div>
    <p>Age: {{ $user->age }}</p>
</div>
<div>
    <p>Height: {{ $user->height }} {{ $user->height_unit }}</p>
</div>
<div>
    <p>Current weight: {{ $user->weight }} {{ $user->weight_unit }}</p>
</div>
<div>
    <p>Target weight: {{ $user->target_weight }} {{ $user->weight_unit }}</p>
</div>
<div>
    <p>Activity level: {{ $user->activityLevel->name }}</p>
</div>
<div>
    <p>Target Calories: {{ $user->target_kcal }} kcal</p>
</div>
<div>
    Followed diets:
    @if ($user->dietTypes->isEmpty())
        <span>No diet is followed!</span>
    @else
        @foreach ($user->dietTypes as $type)
            <span>{{ $type->name }},</span>
        @endforeach
    @endif

</div>
<a href="/user/{{ $user->id }}/edit" class="btn btn-primary">Edit my details</a>
<form action="user/{{ $user->id }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Delete my account</button>
</form>
