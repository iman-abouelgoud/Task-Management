@extends('layout.layout')
@section('title', 'My Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('layout.sidebar')
        </div>
        <div class="col-9">
            @include('layout.success-meassage')
            @include('layout.error-meassage')

            <h2> My Dashboard </h2>

            <div class="row">
                @foreach ($data as $item)
                    <div class="col-sm-6 col-md-4 my-3">
                        @include('layout.widget', [
                            'title' => $item['title'],
                            'icon' => $item['icon'],
                            'totalCount' => $item['totalCount'],
                        ])
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
