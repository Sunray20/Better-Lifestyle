<div>
    <p>{{ $user->weight }} {{ $user->unit }}</p>
</div>
<div>
    <p>{{ $user->target_weight }} {{ $user->unit }}</p>
</div>

<div>
    <p>{{ $user->diet_goal }}</p>
</div>
<div>
    <p>Target Calories: {{ $user->target_kcal }}</p>
</div>
<a href="/user/{{ $user->id }}/edit">Edit my goals</a>
<form action="user/{{ $user->id }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit">Delete my account</button>
</form>
