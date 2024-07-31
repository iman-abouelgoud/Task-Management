@extends('layout.layout')
@section('title', 'Edit Task | My Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-6">
            @include('layout.success-meassage')
            @include('layout.error-meassage')

            <h2> Edit Task </h2>

            @include('tasks._form', [
                'action' => route('tasks.update', $task),
                'button_text' => 'Update Task',
                'task' => $task
            ])
        </div>
    </div>
@endsection
