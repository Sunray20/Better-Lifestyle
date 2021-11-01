<x-bootstrap-layout/>
<form action="/excercises/{{ $excercise->id }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <input type="text" name="name" value="{{ $excercise->name }}">
    </div>
    <div>
        <select id="type" name="type">
            <option value="Chest"       {{ $excercise->type == 'chest' ? 'selected' : '' }}>Chest</option>
            <option value="Back"        {{ $excercise->type == 'back' ? 'selected' : '' }}>Back</option>
            <option value="Legs"        {{ $excercise->type == 'legs' ? 'selected' : '' }}>Legs</option>
            <option value="Biceps"      {{ $excercise->type == 'biceps' ? 'selected' : '' }}>Biceps</option>
            <option value="Triceps"     {{ $excercise->type == 'triceps' ? 'selected' : '' }}>Triceps</option>
            <option value="Forearms"    {{ $excercise->type == 'forearms' ? 'selected' : '' }}>Forearms</option>
            <option value="Shoulders"   {{ $excercise->type == 'shoulders' ? 'selected' : '' }}>Shoulders</option>
            <option value="Abdominals"  {{ $excercise->type == 'abdominals' ? 'selected' : '' }}>Abdominals</option>
        </select>
    </div>
    <div>
        <input type="text" name="description" value="{{ $excercise->description }}">
    </div>
    <div>
        <input type="submit" value="submit" class="btn btn-primary">
    </div>
</form>
