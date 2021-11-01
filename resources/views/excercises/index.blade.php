<x-bootstrap-layout/>
<a href="excercises/create" class="btn btn-success">Add new excercise</a>

@foreach ($excercises as $excercise)
    <div><a href="excercises/{{ $excercise->id }}">{{ $excercise->name }}</a></div>
    <div>{{ $excercise->type }}</div>
    <a href="excercises/{{ $excercise->id }}/edit" class="btn btn-primary">Edit excercise</a>
    <form action="excercises/{{ $excercise->id }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <hr/>
@endforeach
