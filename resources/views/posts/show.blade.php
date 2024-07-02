@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{ $singlePost->title }}</h5>
            <p class="card-text">Description: {{ $singlePost->description }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{ $singlePost->user->name}}</h5>
            <p class="card-text">Email : {{ $singlePost->user->email}}</p>
            <p class="card-text">Created At : {{ $singlePost->created_at->diffForHumans() }} </p>
        </div>
    </div>
@endsection


