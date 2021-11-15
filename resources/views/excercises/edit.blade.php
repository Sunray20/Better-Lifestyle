<x-bootstrap-layout/>
<form action="/excercises/{{ $excercise->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
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
        <img src="{{ asset('images/excercises/') . '/' . $excercise->image_path }}"
                class="card-img-top"
                alt="Image of {{ $excercise->name }}"
                width="640px"
                height="640px">
    @else
        <img src="{{ asset('images/missing_image.png') }}" alt="Missing image" width="640px" height="640px">
    @endisset

    <div>
        <label for="name" class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control"/>
    </div>
    <div>
        <input type="submit" value="submit" class="btn btn-primary">
    </div>

    <a href="{{ url()->previous() }}">Return</a>
</form>
