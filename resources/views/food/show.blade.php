<x-bootstrap-layout/>
@isset($food->image_path)
    <img src="{{ asset('images/') . '/' . $food->image_path }}" alt="Image of a food" width="100px" height="100px">
@else
    <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" width="100px" height="100px">
@endisset
<div>
    {{ $food->name }}
</div>
<div>
    {{ $food->preparation_time }}
</div>
<div>
    {{ $food->preparation_difficulty }}
</div>
<div>
    {{ $food->preparation_desc }}
</div>

<p>This food consists of: </p>
<ul>
    @foreach ($food->ingredients as $ingredient)
        <li>{{ $ingredient->name }}</li>
    @endforeach
</ul>

<a href="{{ url()->previous() }}">Return</a>
