<x-bootstrap-layout/>
<form action="/diet-types" method="POST">
    @csrf
    <div>
        <input type="text" name="name" placeholder="Name of diet...">
    </div>
    <div>
        <input type="text" name="description" placeholder="Description of diet...">
    </div>

    <input type="submit" value="Submit">
</form>
