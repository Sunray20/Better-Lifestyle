<x-bootstrap-layout/>
<form action="/diet-types/{{ $dietType->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <input type="text" name="name" value="{{ $dietType->name }}">
    </div>
    <div>
        <input type="text" name="preparation_time" value="{{ $dietType->description }}">
    </div>

    <input type="submit" value="Submit">
</form>
