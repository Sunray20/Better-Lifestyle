<x-bootstrap-layout/>
<form action="/ingredients/" method="GET">
    <input type="text" name="search" placeholder="Search for an ingredient...">
    <button type="submit" class="btn btn-primary">Search</button>
</form>

@isset($ingredients)
    @foreach ($ingredients as $ingredient)
        @isset($ingredient->image_path)
            <img src="{{ asset('images/') . '/' . $ingredient->image_path }}" alt="Image of a food" width="100px" height="100px">
        @else
            <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" width="100px" height="100px">
        @endisset

        <div><a href="/ingredients/{{ $ingredient->id }}">
            {{ $ingredient->name . ' (' . $ingredient->amount . ' ' . $ingredient->unit . ')'}}</a>
        </div>
        <div>Calorie: {{ $ingredient->calorie }}</div>
        <div>Protein: {{ $ingredient->protein }}</div>
        <div>Carbs: {{ $ingredient->carb }}</div>
        <div>Fats: {{ $ingredient->fat }}</div>


        @if ($ingredient->user_id == auth()->user()->id || auth()->user()->is_admin == 1)
            <a href="/ingredients/{{ $ingredient->id }}/edit" class="btn btn-primary">Edit ingredient</a>
            <form action="/ingredients/{{ $ingredient->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
        <hr/>
    @endforeach
@endisset

@if($ingredients->isEmpty())
    <a href="/ingredients/create" class="btn btn-success">Add new ingredient</a>
@endif
