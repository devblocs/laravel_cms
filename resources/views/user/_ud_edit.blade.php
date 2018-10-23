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
                        <h4>User Details</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('user.update', ['action' => 1]) }} " method="POST">

                            @csrf
                    
                            @if(count($user_detail) != 0)
                                @method('PUT')
                            @endif
                            
                          <div class="form-group row">
                            <label for="bio" class="col-4 col-form-label">Bio</label> 
                            <div class="col-8">
                                @if(empty($user_detail->bio))
                                    <input id="bio" name="bio" placeholder="Enter Your Bio" class="form-control here" type="text">
                                @else
                                    <input id="bio" name="bio" value="{{ $user_detail->bio }}" class="form-control here" type="text">
                                @endif
                              
                            </div>
                          </div>

                          <div class="form-group row">
                                <label for="age" class="col-4 col-form-label">Age</label> 
                                @if(empty($user_detail->age))
                                <div class="col-8">
                                    <input id="age" name="age" placeholder="Enter Your Age" class="form-control here" type="number">
                                </div>
                                @else
                                    <div class="col-8">
                                        <input id="age" name="age" value="{{ $user_detail->age }}" class="form-control here" type="number">
                                    </div>
                                @endif
                                
                                
                            </div>

                          <div class="form-group row">
                            <label for="Location" class="col-4 col-form-label">Location</label> 
                            <div class="col-8">
                              <input id="Location" name="Location" placeholder="Enter your location" class="form-control here" type="text">
                            </div>
                        </div>

                          <div class="form-group row">
                            <div class="offset-4 col-8">
                              <button type="submit" class="btn btn-primary">Update Profile</button>
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