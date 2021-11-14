<x-bootstrap-layout/>
<form action="/excercises" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="text" name="name" placeholder="Excercise name...">
    </div>
    <div>
        @foreach ($allExcerciseTypes as $type)
            <input type="checkbox" name="{{ $type->name }}">
            <label for="{{ $type->name }}">{{ $type->name }}</label>
        @endforeach
    </div>
    <div>
        <input type="text" name="description" placeholder="Description...">
    </div>
    <div>
        <label for="name" class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control"/>
    </div>
    <div>
        <input type="submit" value="submit" class="btn btn-primary">
    </div>

    <a href="{{ url()->previous() }}">Return</a>
</form>
