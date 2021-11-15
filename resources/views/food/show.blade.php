<x-bootstrap-layout/>
@isset($food->image_path)
    <img src="{{ asset('images/') . '/' . $food->image_path }}" alt="Image of a food" width="100px" height="100px">
@else
    <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" width="100px" height="100px">
@endisset
<div>
    <p>
        Name of food: {{ $food->name }}
    </p>
</div>
<div>
    <p>
        Preparation time: {{ $food->preparation_time }}
    </p>
</div>
<div>
    <p>
        Preparation difficulty: {{ $food->preparation_difficulty }}
    </p>
</div>
<div>
    <p>
        Preparation description: {{ $food->preparation_desc }}
    </p>
</div>

<p>This food consists of: </p>
<ul>
    @foreach ($food->ingredients as $ingredient)
        <li>{{ $ingredient->name }}</li>
    @endforeach
</ul>

<a href="{{ url()->previous() }}">Return</a>
