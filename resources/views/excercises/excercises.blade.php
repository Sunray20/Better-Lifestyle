<x-bootstrap-layout/>
@if (auth()->user()->is_admin)
    <a href="/excercises/create" class="btn btn-success">Add new excercise</a>
@endif

@foreach ($excercises as $excercise)
<div class="card" style="width: 18rem;">
    @if($excercise->image_path !== null && file_exists(public_path('images/excercises/' . $excercise->image_path)))
        <img src="{{ asset('images/excercises/') . '/' . $excercise->image_path}}"
            class="card-img-top"
            alt="Image of {{ $excercise->name }}"
            width="640px"
            height="640px">
    @else
        <img src="{{ asset('images/missing_image.png') }}" alt="Missing image" width="640px" height="640px">
    @endif
    <div class="card-body">
        <h5 class="card-title"><a href="/excercises/{{ $excerciseType->name }}/{{ $excercise->id }}">{{ $excercise->name }}</a></h5>
    </div>
</div>
@endforeach
<a href="/excercises/">Return</a>
