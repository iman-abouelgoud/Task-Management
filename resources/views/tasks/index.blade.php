@extends('layout.layout')
@section('title', 'Tasks | My Dashboard')

@section('styles')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .sortable tr {
            cursor: move;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-9">
            @include('layout.success-meassage')
            @include('layout.error-meassage')

            <h2> Tasks (Orderd By Priority) </h2>

            <div class="container mt-4">
                <form action="{{ route('tasks.index') }}" method="GET">
                    <div class="form-group row align-items-center">
                        <div class="col-auto">
                            <select name="project_id" class="form-select" id="project">
                                <option value="0" selected>All Projects</option>
                                @foreach ($projects as $project)
                                    <option {{ request('project_id') == $project->id ? "selected" : "" }} value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary">Select</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- create-task-button --}}
            <div class="row">
                <div class="col-12">
                    <a style="float: right" class="mx-2 mt-2" href="{{ route('tasks.create') }}">Create New</a>
                </div>
            </div>

            @if ($tasks->count() <= 0)
                <div>
                    <p class="text-center mt-4">No Results Found !</p>
                </div>
            @else
                <table id="sortable_table" class="table table-striped sortable mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>Priority</th>
                            <th>Name</th>
                            <th>Project</th>
                            <th>Created At</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr id="{{ $task->id }}">
                            <td>#</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->project->name }}</td>
                            <td>{{ $task->created_at->toDateString() }}</td>
                            <td>
                                <form id="delete_task_{{ $task->id }}" action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    <a class="mx-2" href="{{ route('tasks.edit', $task) }}">Edit</a>
                                    @csrf
                                    @method('delete')
                                    <a href="#" onclick="document.getElementById('delete_task_{{ $task->id }}').submit();return false;">
                                        Delete
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $tasks->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script>
            $(function() {
                $("#sortable_table tbody").sortable({
                    helper: function(e, ui) {
                        ui.children().each(function() {
                            $(this).width($(this).width());
                        });
                        return ui;
                    },
                    update: function(event, ui) {
                    var priorities = $(this).sortable('toArray').toString();
                    // console.log($(this).sortable('toArray'));

                    var CSRF_TOKEN  = $('meta[name="X-CSRF-TOKEN"]').attr('content');
                    var base_url    = $('meta[name="base_url"]').attr('base_url');

                    // console.log(CSRF_TOKEN);
                    // console.log(base_url);

                    $.ajax({
                        url: base_url + '/tasks/update-priority',
                        method: 'POST',
                        data: {
                            'priorities': priorities,
                            _token: CSRF_TOKEN
                        },
                        success: function(response) {
                            alert(response.message);
                        },
                        error: function(xhr, status, error) {
                            alert('An error occurred while saving the order');
                        }
                    });
                    }
                }).disableSelection();
            });
        </script>
@endsection
