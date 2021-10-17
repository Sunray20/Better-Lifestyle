<h2>{{ $excercise->name }}</h2>
<div><p>{{ $excercise->type }}</p></div>
<div><p>{{ $excercise->description }}</p></div>
<a href="{{ url()->previous() }}">Return</a>
