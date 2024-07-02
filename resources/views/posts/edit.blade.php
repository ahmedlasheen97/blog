@extends('layouts.app')

@section('title') Edit Post @endsection
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Add New Post
        </div>
        <div class="card-body">
            <form action="{{route('posts.update', $post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}" id="title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                     <textarea name="description" class="form-control"  rows="3">{{$post->description}}</textarea>
                </div>
                 <div class="mb-3">
            <label  class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
                
                    <option value="{{ $post->user->id}}">{{ $post->user->name}}</option>
                
            </select>
        </div>
                <button type="submit" class="btn btn-primary">update post</button>
            </form>
        </div>
    </div>
@endSection
