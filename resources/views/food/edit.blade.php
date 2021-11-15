<x-bootstrap-layout/>
<form action="/foods/{{ $food->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name of food: </label>
        <input type="text" name="name" value="{{ $food->name }}">
    </div>
    <div>
        <label for="preparation_time">Preparation time: </label>
        <input type="text" name="preparation_time" value="{{ $food->preparation_time }}">
    </div>
    <div>
        <label for="preparation_difficulty">Preparation Difficulty: </label>
        <input type="text" name="preparation_difficulty" value="{{ $food->preparation_difficulty }}">
    </div>
    <div>
        <label for="preparation_desc">Preparation Description: </label>
        <input type="text" name="preparation_desc" value="{{ $food->preparation_desc }}">
    </div>
    <div>
        <label for="image" class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control"/>
    </div>

    <input type="submit" value="Submit">
</form>
<a href="{{ url()->previous() }}">Return</a>
