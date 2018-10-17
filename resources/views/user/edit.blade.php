@extends('layouts.user.master')

@section('title', "Edit Profile " . ucfirst(Auth::user()->fname))

@section('content')
<div class="row edit-profile-row">
    <div class="col-md-3 ">
         <div class="list-group ">    
          @include('partials._edit_nav')
        </div> 
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Personal Settings</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('user.update') }} " method="POST">
                            @csrf
                    
                            @method('PUT')

                          <div class="form-group row">
                            <label for="fname" class="col-4 col-form-label">First Name</label> 
                            <div class="col-8">
                              <input id="fname" name="fname" value="{{ Auth::user()->fname }}" class="form-control here" type="text">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="lname" class="col-4 col-form-label">Last Name</label> 
                            <div class="col-8">
                              <input id="lname" name="lname" value="{{ Auth::user()->lname }}" class="form-control here" type="text">
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <label for="email" class="col-4 col-form-label">Email*</label> 
                            <div class="col-8">
                              <input id="email" name="email" value="{{ Auth::user()->email }}" class="form-control here" type="text">
                            </div>
                          </div>
                          
                          
                          <div class="form-group row">
                            <div class="offset-4 col-8">
                              <button name="submit" type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection