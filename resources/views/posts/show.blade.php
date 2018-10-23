@extends('layouts.user.master')

@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card form-card">
                <h5 class="card-header">Post ID: {{ $post->id }}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{ ucfirst($post->title) }}</h5>
                    <p class="card-text">{{ ucfirst($post->body) }}</p>
                </div>
                <div class="card-footer text-muted">
                        {{ $post->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="row text-center">
        <div class="col-md-4">
            <a href="{{ route('post.index') }}" class="btn btn-primary">Back to Posts</a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-success">Edit Post</a>
        </div>

        <div class="col-md-4">
            <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="delete" class="btn btn-danger" value="Delete Post">
            </form>
        </div>
    </div>
@endsection