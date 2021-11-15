<x-bootstrap-layout/>
<form action="/foods" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Name of food: </label>
        <input type="text" name="name" placeholder="Food name...">
    </div>
    <div>
        <label for="preparation_time">Preparation time: </label>
        <input type="text" name="preparation_time" placeholder="Preparation Time...">
    </div>
    <div>
        <label for="preparation_difficulty">Preparation Difficulty: </label>
        <input type="text" name="preparation_difficulty" placeholder="Preparation Difficulty...">
    </div>
    <div>
        <label for="preparation_desc">Preparation Description: </label>
        <input type="text" name="preparation_desc" placeholder="Preparation Desc...">
    </div>
    <div>
        <label for="image" class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control"/>
    </div>

    <input type="submit" value="Submit">
</form>
<a href="{{ url()->previous() }}">Return</a>
