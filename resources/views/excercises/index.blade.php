<x-bootstrap-layout/>

@foreach ($excerciseTypes as $excerciseType)
    <div class="card" style="width: 18rem;">
        @if(file_exists(public_path('images/excercises/' . $excerciseType->name . ".jpg")))
            <img src="{{ asset('images/excercises/') . '/' . $excerciseType->name . ".jpg" }}"
                class="card-img-top"
                alt="Image of {{ $excerciseType->name }}"
                width="640px"
                height="640px">
        @else
            <img src="{{ asset('images/missing_image.png') }}" alt="Missing image" width="640px" height="640px">
        @endif
        <div class="card-body">
            <h5 class="card-title"><a href="/excercises/{{ $excerciseType->name }}/">{{ $excerciseType->name }}</a></h5>
        </div>
    </div>
@endforeach
