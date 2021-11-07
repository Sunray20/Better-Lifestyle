<x-bootstrap-layout/>
<form action="/excercises" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <input type="text" name="name" placeholder="Excercise name...">
    </div>
    <div>
        <select id="type" name="type">
            <option value="Chest" selected>Chest</option>
            <option value="Back">Back</option>
            <option value="Legs">Legs</option>
            <option value="Biceps">Biceps</option>
            <option value="Triceps">Triceps</option>
            <option value="Forearms">Forearms</option>
            <option value="Shoulders">Shoulders</option>
            <option value="Abdominals">Abdominals</option>
        </select>
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
</form>
