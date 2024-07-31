@extends('layout.layout')
@section('title', 'Projects | My Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-9">
            @include('layout.success-meassage')
            @include('layout.error-meassage')

            <h2> Projects </h2>

            <table class="table table-striped mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Tasks</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->tasks->count() }}</td>
                        <td>{{ $project->created_at->toDateString() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $projects->links() }}
            </div>
        </div>
    @endsection
