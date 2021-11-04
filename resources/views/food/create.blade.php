<x-bootstrap-layout/>
<form action="/foods" method="POST">
    @csrf
    <div>
        <input type="text" name="name" placeholder="Food name...">
    </div>
    <div>
        <input type="text" name="preparation_time" placeholder="Preparation Time...">
    </div>
    <div>
        <input type="text" name="preparation_difficulty" placeholder="Preparation Difficulty...">
    </div>
    <div>
        <input type="text" name="preparation_desc" placeholder="Preparation Desc...">
    </div>
    <div>
        <label for="name" class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control"/>
    </div>

    <input type="submit" value="Submit">
</form>
