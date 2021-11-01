<x-bootstrap-layout/>
@isset($ingredient->image_path)
    <img src="{{ asset('images/') . '/' . $ingredient->image_path }}" alt="Image of a food" width="100px" height="100px">
@else
    <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" width="100px" height="100px">
@endisset
<div>
    {{ $ingredient->name }}
</div>
<div>
    {{ $ingredient->calorie }}
</div>
<div>
    {{ $ingredient->protein }}
</div>
<div>
    {{ $ingredient->carb }}
</div>
<div>
    {{ $ingredient->fat }}
</div>
<div>
    {{ $ingredient->amount . ' ' . $ingredient->unit }}
</div>

<a href="{{ url()->previous() }}">Return</a>
