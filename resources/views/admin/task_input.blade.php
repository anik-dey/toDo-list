@extends('landing')

@section('content')

    <strong>To DO List</strong>
    <form method="POST" action="{{ route('inputTask') }}">
        @csrf
        <div class="input-group mb-5">
            <input type="text" class="form-control rounded-0" name="task_list" required>
            <span class="input-group-append">
                <button type="submit" class="btn btn-info btn-flat">Add Task!</button>
            </span>
        </div>
    </form>


    <!-- /.col -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Task List Table</h3>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Time</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks_view as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->task_list }}</td>
                                <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                <td><a href="{{ URL::to('/task-delete/' . $item->id) }}" <button type="button"
                                        class="btn btn-block btn-danger">Delete</button> </a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endsection
