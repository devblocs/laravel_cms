@extends('layouts.user.master')

@section('title', ucfirst(Auth::user()->fname))

@php
    $fullname = Auth::user()->fname . " " . Auth::user()->lname;    
@endphp

@section('content')
<div class="row">
    <div class="card profile-card">
        <h5 class="card-header">Welcome {{ ucfirst(Auth::user()->fname) }}</h5>
            <div class="card-body">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-3 " align="center">
                                     <img alt="User Pic" src="https://vignette.wikia.nocookie.net/bungostraydogs/images/1/1e/Profile-icon-9.png/revision/latest?cb=20171030104015" class="img-circle img-responsive profile-img"> 
                                </div>
                                    
                                <div class=" col-md-9 col-lg-9 "> 
                                    <table class="table table-user-information">
                                        <tbody>
                                          <tr>
                                            <td>Fullname: </td>
                                            <td>{{ $fullname }}</td>
                                          </tr>
                                          <tr>
                                            <td>Email: </td>
                                            <td>{{ Auth::user()->email }}</td>
                                          </tr>
                                          <tr>
                                            <td>Created At: </td>
                                            <td>{{ Auth::user()->created_at->diffForHumans() }}</td>
                                          </tr>
                                          @if(count($user_detail) != 0)
                                            @if(!empty($user_detail->bio))
                                                <tr>
                                                    <td>Bio: </td>
                                                    <td>{{ $user_detail->bio }}</td>
                                                  </tr>
                                            @endif
                                          @endif                                      
                                        </tbody>
                                      </table>
                                </div>
                    </div>
                            
                </div>                                
            </div>
        </div>
                <div class="card-footer text-muted">
                        
                </div>
    </div>
</div> 
<br />
<div class="row text-center">
    <div class="col-md-12">
        <a href="{{ route('user.edit') }}" class="btn btn-primary">Edit Profile</a>
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