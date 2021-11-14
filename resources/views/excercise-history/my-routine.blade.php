<x-bootstrap-layout/>

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
    Add new excercise
</button>

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add new entry to routine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/excercise-history" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="excercise_id">Excercise name: </label>
                    <select name="excercise_id" id="excercise_id">
                        @foreach ($excercises as $excercise)
                            <option value="{{ $excercise->id }}">{{ $excercise->name }}</option>
                        @endforeach
                    </select>

                    <div>
                        Target amount:<input type="text" name="target_amount">
                    </div>

                    <div>
                        Achieved amount:<input type="text" name="achieved_amount">
                    </div>
                    <div>
                        Target weight:<input type="text" name="target_weight">
                    </div>
                    <div>
                        Achieved weight:<input type="text" name="achieved_weight">
                    </div>
                    <div>
                        Date:<input type="date" name="date">
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
@foreach ($errors->all() as $message)
    {{ $message }}
@endforeach
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                @for ($i = 0; $i < $maxCount; $i++)
                    <th scope="col">Excercise name</th>
                    <th scope="col">Target Amount</th>
                    <th scope="col">Achieved Amount</th>
                    <th scope="col">Target Weight</th>
                    <th scope="col">Achieved Weight</th>
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
                    @if (array_key_exists(date('Y-m-d', strtotime($monday . ' +' . $i .' days')), $data))
                        @foreach ($data[date('Y-m-d', strtotime($monday . ' +' . $i .' days'))] as $key => $item)
                                <td>
                                    <a href="excercise-history/{{ $item[0]->id }}/edit" class="btn btn-primary">
                                        {{ $item[0]->excercise->name }}
                                    </a>
                                </td>
                                <td>{{ $item[0]->target_amount }}</td>
                                <td>{{ $item[0]->achieved_amount }}</td>
                                <td>{{ $item[0]->target_weight }}</td>
                                <td>{{ $item[0]->achieved_weight }}</td>
                                <td>
                                    <form action="excercise-history/{{ $item[0]->id }}" method="POST">
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
