@extends('layouts.app')
@section('title', 'allposts')
@section('content')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->created_at->format('Y-m-d')}}</td>
                    <td>
                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning btn-sm">Edit</a>
                        <form style= "display:inline ;"action="{{route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                    </td>
                </tr>
               @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
        <a href="{{route('posts.create')}}" class="btn btn-primary">Create Post</a>
@endsection

