@extends('layouts.user.master')

@section('title', "Create Posts")

@section('active-class', 'active')

@section('content')
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="card form-card">
                <div class="card-header text-center">
                    Create Post
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Post Title: </label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Post title">
                        </div>
                        <div class="form-group">
                            <label for="body">Post Body</label>
                            <textarea name="body" class="form-control" id="body" rows="3" placeholder="Enter Post Content"></textarea>
                        </div>
                        <div class="form-group">
                                <label for="categories">Select Category:</label>
                                <select name="category_id" id="categories" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('post.index') }}" class="btn btn-primary">Cancel</a>
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