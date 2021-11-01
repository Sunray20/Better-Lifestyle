<x-bootstrap-layout/>
<form action="/ingredients/{{ $ingredient->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <input type="text" name="name" value="{{ $ingredient->name }}">
    </div>
    <div>
        <input type="text" name="calorie" value="{{ $ingredient->calorie }}">
    </div>
    <div>
        <input type="text" name="protein" value="{{ $ingredient->protein }}">
    </div>
    <div>
        <input type="text" name="carb" value="{{ $ingredient->carb }}">
    </div>
    <div>
        <input type="text" name="fat" value="{{ $ingredient->fat }}">
    </div>
    <div>
        <input type="text" name="amount" value="{{ $ingredient->amount }}">
    </div>
    <div>
        <select id="unit" name="unit">
            <option value="g"       {{ $ingredient->unit == 'g' ? 'selected' : '' }}>g</option>
            <option value="pound"   {{ $ingredient->unit == 'pount' ? 'selected' : '' }}>pound</option>
            <option value="dL"      {{ $ingredient->unit == 'dL' ? 'selected' : '' }}>dL</option>
            <option value="mL"      {{ $ingredient->unit == 'mL' ? 'selected' : '' }}>mL</option>
        </select>
    </div>
    <div>
        <label for="name" class="form-label">Upload Image:</label>
        <input type="file" name="image_path" class="form-control"/>
    </div>

    <input type="submit" value="Submit">
</form>
