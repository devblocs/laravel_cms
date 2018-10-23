@extends('layouts.user.master')

@section('title', "Edit Post")

@section('active-class', 'active')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="card form-card">
                <div class="card-header text-center">
                    Edit Post
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post.update', ['id' => $post->id]) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">Post Title: </label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group">
                            <label for="body">Post Body</label>
                            <textarea name="body" class="form-control" id="body" rows="3">{{ $post->body }}</textarea>
                        </div>
                        <div class="form-group">
                                <label for="categories">Select Category:</label>
                                <select name="category_id" id="categories" class="form-control">
                                    @foreach ($post->category()->get() as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Update Post</button>
                        <a href="{{ route('post.index') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
@endsection