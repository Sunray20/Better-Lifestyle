<x-bootstrap-layout/>

@foreach ($excerciseTypes as $excerciseType)
    <div class="card" style="width: 18rem;">
        {{-- TODO: add static images for the types --}}
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><a href="/excercises/{{ $excerciseType->name }}/">{{ $excerciseType->name }}</a></h5>
        </div>
    </div>
@endforeach
