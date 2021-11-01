<x-bootstrap-layout/>
<form action="/ingredients" method="POST">
    @csrf
    <div>
        <input type="text" name="name" placeholder="Food name...">
    </div>
    <div>
        <input type="text" name="calorie" placeholder="Calories...">
    </div>
    <div>
        <input type="text" name="protein" placeholder="Protein...">
    </div>
    <div>
        <input type="text" name="carb" placeholder="Carbs...">
    </div>
    <div>
        <input type="text" name="fat" placeholder="Fats...">
    </div>
    <div>
        <input type="text" name="amount" placeholder="Amount...">
    </div>
    <div>
        <select id="unit" name="unit">
            <option value="g" selected>g</option>
            <option value="pound">pound</option>
            <option value="dL">dL</option>
            <option value="mL">mL</option>
        </select>
    </div>
    <div>
        <label for="name" class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control"/>
    </div>

    <input type="submit" value="Submit">
</form>
