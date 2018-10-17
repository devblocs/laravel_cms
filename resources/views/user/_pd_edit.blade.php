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
                        <h4>Change Password</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('user.update', ['action' => 2]) }} " method="POST">

                            @csrf
                            @method('PUT')
                            
                            <div class="form-group row">
                                <label for="oldpass" class="col-4 col-form-label">Old Password</label> 
                                <div class="col-8">
                                    <input id="oldpass" name="oldpass" placeholder="Old Password" class="form-control here" type="text">
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">New Password</label> 
                                <div class="col-8">
                                    <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="text">
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="cpass" class="col-4 col-form-label">Confirm Password</label> 
                                <div class="col-8">
                                    <input id="cpass" name="cpass" placeholder="Confirm Password" class="form-control here" type="text">
                                </div>
                            </div> 

                          <div class="form-group row">
                            <div class="offset-4 col-8">
                              <button type="submit" class="btn btn-primary">Change password</button>
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