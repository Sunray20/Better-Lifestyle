<x-bootstrap-layout/>
<form action="/foods/{{ $food->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <input type="text" name="name" value="{{ $food->name }}">
    </div>
    <div>
        <input type="text" name="preparation_time" value="{{ $food->preparation_time }}">
    </div>
    <div>
        <input type="text" name="preparation_difficulty" value="{{ $food->preparation_difficulty }}">
    </div>
    <div>
        <input type="text" name="preparation_desc" value="{{ $food->preparation_desc }}">
    </div>
    <div>
        <label for="name" class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control"/>
    </div>

    <input type="submit" value="Submit">
</form>
