@extends('layouts.details')

@section('content')
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add new meal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/diet" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 data-label">
                            <label for="food_id">Food name: </label>
                        </div>
                        <div class="col-lg-6 col-sm-12 data">
                            <select class="form-select" name="food_id" id="food_id">
                                @foreach ($foods as $food)
                                    <option value="{{ $food->id }}">{{ $food->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 data-label">
                            <label for="course">Course: </label>
                        </div>
                        <div class="col-lg-6 col-sm-12 data">
                            <select class="form-select" name="course" id="course">
                                <option value="breakfast" selected>breakfast</option>
                                <option value="lunch">lunch</option>
                                <option value="dinner">dinner</option>
                                <option value="snack">snack</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 data-label">
                            <label for="achieved_weight">Date: </label>
                        </div>
                        <div class="col-lg-6 col-sm-12 data">
                            <input class="form-control" type="date" name="date">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" value="Save changes">
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($errors->all() as $error)
    <p class="text-danger">{{ $error }}</p>
@endforeach
<div class="table-responsive bg-white">
    <table class="table table-bordered align-middle text-center h-75">
        <thead>
            <tr>
                <th scope="col">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                        Add new meal
                    </button>
                </th>
                <th scope="col">Total Calories</th>
                <th scope="col">Total Protein</th>
                <th scope="col">Total Carbs</th>
                <th scope="col">Total Fats</th>

                @for ($i = 0; $i < $maxCount; $i++)
                    <th scope="col" class="text-center">Food name</th>
                    <th scope="col">Delete Entry</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 7; $i++)
                <tr>
                    <td>
                        {{ date('Y-m-d', strtotime($monday . ' +' . $i .' days')) }}
                    </td>
                    @if (array_key_exists(date('Y-m-d', strtotime($monday . ' +' . $i .' days')), $macros))
                        <td><span
                                class="{{ (auth()->user()->target_kcal
                                            < $macros[date('Y-m-d', strtotime($monday . ' +' . $i .' days'))]->calorie) ? 'text-danger' : ''}}">
                            {{ $macros[date('Y-m-d', strtotime($monday . ' +' . $i .' days'))]->calorie . '/' . auth()->user()->target_kcal }}
                        </span></td>
                    @endif

                    @if (array_key_exists(date('Y-m-d', strtotime($monday . ' +' . $i .' days')), $macros))
                        <td>{{ $macros[date('Y-m-d', strtotime($monday . ' +' . $i .' days'))]->protein }}</td>
                    @endif

                    @if (array_key_exists(date('Y-m-d', strtotime($monday . ' +' . $i .' days')), $macros))
                        <td>{{ $macros[date('Y-m-d', strtotime($monday . ' +' . $i .' days'))]->carb }}</td>
                    @endif

                    @if (array_key_exists(date('Y-m-d', strtotime($monday . ' +' . $i .' days')), $macros))
                        <td>{{ $macros[date('Y-m-d', strtotime($monday . ' +' . $i .' days'))]->fat }}</td>
                    @endif
                    @if (array_key_exists(date('Y-m-d', strtotime($monday . ' +' . $i .' days')), $data))
                        @foreach ($data[date('Y-m-d', strtotime($monday . ' +' . $i .' days'))] as $key => $item)
                                <td class="text-center">
                                    @dd($item[0])
                                    <a href="/foods/{{ $item[0]->food_id }}/edit" class="btn btn-primary">
                                        {{ $item[0]->food->name }}
                                    </a>
                                </td>
                                <td>
                                    <form action="/foods/{{ $item[0]->food_id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">X</button>
                                    </form>
                                </td>
                        @endforeach
                    @endif
                </tr>
            @endfor
        </tbody>
    </table>
</div>

@endsection
