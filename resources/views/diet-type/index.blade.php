<x-bootstrap-layout/>

@if (auth()->user()->is_admin == 1)
    <a href="/diet-types/create" class="btn btn-success">Add new type of diet</a>
@endif

@isset($dietTypes)
    @foreach ($dietTypes as $dietType)
        <div><a href="/diet-types/{{ $dietType->id }}">
            {{ $dietType->name }}</a>
        </div>
        <div>{{ $dietType->description }}</div>

        @if ($dietType->user_id == auth()->user()->id || auth()->user()->is_admin == 1)
            <a href="/diet-types/{{ $dietType->id }}/edit" class="btn btn-primary">Edit diet type</a>
            <form action="/diet-types/{{ $dietType->id }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
        <hr/>
    @endforeach
@endisset
