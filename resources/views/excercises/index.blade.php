<a href="excercises/create">Add new excercise</a>

@foreach ($excercises as $excercise)
    <div><a href="excercises/{{ $excercise->id }}">{{ $excercise->name }}</a></div>
    <div>{{ $excercise->type }}</div>
    <a href="excercises/{{ $excercise->id }}/edit">Edit excercise</a>
    <form action="excercises/{{ $excercise->id }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>
    <hr/>
@endforeach
