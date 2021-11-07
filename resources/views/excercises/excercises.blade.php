<x-bootstrap-layout/>
@if (auth()->user()->is_admin)
    <a href="excercises/create" class="btn btn-success">Add new excercise</a>
@endif

@foreach ($excercises as $excercise)
<div class="card" style="width: 18rem;">
    {{-- TODO: add static images for the excercise --}}
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title"><a href="/excercises/{{ $excercise->type }}/{{ $excercise->id }}">{{ $excercise->name }}</a></h5>
    </div>
</div>
@endforeach
<a href="/excercises/">Return</a>
