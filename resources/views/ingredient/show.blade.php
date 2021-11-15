<x-bootstrap-layout/>
{{-- TODO: Make it better designed --}}
@isset($ingredient->image_path)
    <img src="{{ asset('images/') . '/' . $ingredient->image_path }}" alt="Image of a food" width="100px" height="100px">
@else
    <img src="{{ asset('images/missing_image.png') }}" alt="Missing food image" width="100px" height="100px">
@endisset
<div>
    <p>
        Name of Ingredient: {{ $ingredient->name }}
        @if ($ingredient->validated)
            {{-- TODO: add fontawesome icon for this --}}
            <span title="This ingredient is validated">✓</span>
        @endif
    </p>
</div>
<div>
    <p>Calorie: {{ $ingredient->calorie }}</p>
</div>
<div>
    <p>Protein: {{ $ingredient->protein }}</p>
</div>
<div>
    <p>Carb: {{ $ingredient->carb }}</p>
</div>
<div>
    <p>Fat: {{ $ingredient->fat }}</p>
</div>
<div>
    <p>Ingredient amount: {{ $ingredient->amount . ' ' . $ingredient->unit }}</p>
</div>

<a href="{{ url()->previous() }}">Return</a>
