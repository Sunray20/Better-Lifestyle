<x-bootstrap-layout/>
<h2>{{ $excercise->name }}</h2>
<div><p>{{ $excercise->type }}</p></div>
<div><p>{{ $excercise->description }}</p></div>
@if (auth()->user()->is_admin)
    <a href="/excercises/{{ $excercise->id }}/edit" class="btn btn-primary">Edit excercise</a>
    <form action="/excercises/{{ $excercise->id }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endif
<a href="/excercises/{{ $excerciseType }}">Return</a>
