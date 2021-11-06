<x-bootstrap-layout/>
<form action="/foods/" method="GET">
    <input type="text" name="search" placeholder="Search for a food...">
    <button type="submit" class="btn btn-primary">Search</button>
</form>

@isset($foods)
    @foreach ($foods as $food)
        @isset($food->image_path)
            <img src="{{ asset('images/') . '/' . $food->image_path }}" alt="Image of {{ $food->name }}" width="100px" height="100px">
        @else
            <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" width="100px" height="100px">
        @endisset

        <div><a href="/foods/{{ $food->id }}">
            {{ $food->name }}</a>
        </div>
        <div>Time: {{ $food->preparation_time }} mins</div>
        <div>Difficulty: {{ $food->preparation_difficulty }}/5</div>
        <div>How to prepare: {{ $food->preparation_desc }}</div>

        @if ($food->user_id == auth()->user()->id || auth()->user()->is_admin == 1)
            <a href="/foods/{{ $food->id }}/edit" class="btn btn-primary">Edit food</a>
            <form action="/foods/{{ $food->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
        <hr/>
    @endforeach
@endisset

@if($foods->isEmpty())
    <a href="/foods/create" class="btn btn-success">Add new food</a>
@endif
