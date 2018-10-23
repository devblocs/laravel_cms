@extends('layouts.user.master')

@section('meta')
    <meta name="_token" content="{{ csrf_token() }}" />
@endsection

@section('title', 'Categories')

@section('content')
    <div class="row">
        @if(Route::currentRouteName() == 'categories.edit')
            <div class="col-md-6">
                <div class="card form-card">
                    <div class="card-header text-center">
                        Edit Category
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update', ['id' => $category->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Category Title: </label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $category->title }}">
                            </div>                        
                            <button type="button" name="create_category" class="btn btn-success">Edit Category</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-6">
                <div class="card form-card">
                    <div class="card-header text-center">
                        Create Category
                    </div>
                    <div class="card-body">
                        <form>
                            {{-- @csrf --}}
                            <div class="form-group">
                                <label for="title">Category Title: </label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Category Title">
                            </div>                        
                            <button type="submit" id="create_category" class="btn btn-primary">Create Category</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
       

        <div class="col-md-6">
            @if(count($categories) == 0)
                <p>No categories found!</p>
            @else
                <table id="categoryTable" class="table table-hover table-bordered table-striped text-center">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ ucfirst($category->title) }}</td>
                                <td><a class="btn btn-primary" href="{{ route('categories.edit', ['id' => $category->id]) }}">Edit</a></td>
                                <td>
                                    <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
            jQuery(document).ready(function(){
                jQuery('#create_category').click(function(e){
                   e.preventDefault();
                   $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                      }
                  });
                   jQuery.ajax({
                      url: "{{ url('/categories') }}",
                      method: 'post',
                      data: {
                         title: jQuery('#title').val()
                      },
                      success: function(response){
                        var tableRow = ''; // creating a empty variable for saving table row
                        $.each(response, function(i, data){
                            tableRow += "<tr>";
                            tableRow += "<td>" + data[i].id + "</td>";
                            tablerow += "<td>" + data[i].title + "</td>";
                            tablerow += "<td><a class='btn btn-primary' href='" + data[i].id + "'>Edit</a></td>";
                            tableRow += "</tr>";
                        });

                        $('#categoryTable').append(tableRow);
                    }});
                });
            });
    </script>
@endsection