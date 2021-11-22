@extends('layouts.details')

@section('content')
<form action="/diet-types" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="name">Diet type name: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <input class="form-control" type="text" name="name" placeholder="Name of diet...">
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-0"></div>
        <div class="col-lg-3 col-sm-12 data-label">
            <label for="description">Description: </label>
        </div>
        <div class="col-lg-3 col-sm-12 data">
            <textarea class="form-control" name="description" cols="40" rows="10" style="resize:none;"></textarea>
        </div>
        <div class="col-lg-3 col-sm-0"></div>
    </div>

    <div class="row pt-3">
        <div class="col-lg-3"></div>
        <div class="col-lg-3 data-label">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Return</a>
        </div>
        <div class="col-lg-3 data">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
        <div class="col-lg-3"></div>
    </div>
</form>
@endsection
