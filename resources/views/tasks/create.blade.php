@extends('layout.layout')
@section('title', 'Create New Task | My Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-6">
            @include('layout.success-meassage')
            @include('layout.error-meassage')

            <h2> Create New Task </h2>

            @include('tasks._form', [
                'action' => route('tasks.store'),
                'button_text' => 'Create Task'
            ])
        </div>
    </div>
@endsection
