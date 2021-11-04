<x-bootstrap-layout/>

<div>
    {{ $dietType->name }}
</div>
<div>
    {{ $dietType->description }}
</div>

<div>
    <p>This diet is incompatible with: </p>
    <ul>
        @foreach ($dietType->incompatibleFoods as $incompatibleFood)
            <li>{{ $incompatibleFood->name }}</li>
        @endforeach
    </ul>
</div>
</ul>

<a href="{{ url()->previous() }}">Return</a>
