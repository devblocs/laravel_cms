@extends('layouts.user.master')

@section('title', "Posts")

@section('active-class', 'active')

@section('content')
    <div class="row edit-row">
        <div class="col-md-12">
            @if(count($posts) != 0)
                <table class="table table-hover table-bordered table-striped text-center">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col" colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ ucfirst($post->title) }}</td>
                                <td><a class="btn btn-info" href="{{ route('post.show', ['id' => $post->id]) }}">View Post</a></td>
                                <td><a class="btn btn-success" href="{{ route('post.edit', ['id' => $post->id]) }}">Edit Post</a></td>
                                <td>
                                    <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" name="delete" class="btn btn-danger" value="Delete Post">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                {{ "No Posts created!" }}
            @endif
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12 text-center">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
@endsection