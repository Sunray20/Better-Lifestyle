<x-bootstrap-layout/>
<form action="/excercises/{{ $excercise->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <input type="text" name="name" value="{{ $excercise->name }}">
    </div>
    <div>
        @foreach ($excercise->excerciseTypes as $type)
            <input type="checkbox" name="{{ $type->name }}" checked>
            <label for="{{ $type->name }}">{{ $type->name }}</label>
        @endforeach
        @foreach ($unselectedExcerciseTypes as $type)
            <input type="checkbox" name="{{ $type->name }}">
            <label for="{{ $type->name }}">{{ $type->name }}</label>
        @endforeach
    </div>
    <div>
        <textarea name="description" id="" cols="30" rows="10">
            {{ $excercise->description }}
        </textarea>
    </div>
    @isset($excercise->image_path)
        <img src="{{ $excercise->image_path }}" alt="Image of {{ $excercise->name }}" width="200px" height="200px">
    @endisset

    <div>
        <label for="name" class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control"/>
    </div>
    <div>
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
</form>
