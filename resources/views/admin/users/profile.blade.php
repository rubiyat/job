@extends('layouts.admin')

@section('content')


	<div class="panel panel-danger panel-top">
    
	  <div class="panel-heading">
	    <span class="heading">EDIT PROFILE</span>
	  </div>
	  <div class="panel-body">
      <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#basicInfo" aria-controls="basicInfo" role="tab" data-toggle="tab">Basic Info</a></li>
          <li role="presentation"><a href="#changePassword" aria-controls="changePassword" role="tab" data-toggle="tab">Change Password</a></li>
          <li role="presentation"><a href="#image" aria-controls="image" role="tab" data-toggle="tab">Image</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="basicInfo">
            <form method="post" action="{{ route('users.user-profile.update', ['user' => $user->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="panel panel-info">
              <div class="panel-heading">{{ $user->name }}'s Profile</div>
              <div class="panel-body">
                <div class="form-group">
                  <label for="name">User Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" class="form-control" id="address" value="{{ $user->address }}">
                </div>
               
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}">
                </div>
              </div>
              <div class="panel-footer">
                <button type="submit" name="updateProfileBtn" class="btn btn-primary pull-right" value="Update Profile Info">Update</button>
                <div class="clearfix"></div>
              </div>
            </div>
            </form>
          </div>
          <div role="tabpanel" class="tab-pane" id="changePassword">
            <form method="post" action="{{ route('users.user-profile.update', ['user' => $user->id]) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="panel panel-info">
              <div class="panel-heading">{{ $user->name }}</div>
              <div class="panel-body">
                
                <div class="form-group">
                  <label for="old_password">Current Password</label>
                  <input type="password" name="old_password" class="form-control" id="old_password" value="{{ $user->password }}">
                </div>
                <div class="form-group">
                  <label for="password">New Password</label>
                  <input type="password" name="password" class="form-control" id="password">
                </div>   
              </div>
              <div class="panel-footer">
                <button type="submit" name="updateProfileBtn" class="btn btn-primary pull-right" value="Update Profile Password">Update</button>
                <div class="clearfix"></div>
              </div>
            </div>
            </form>
          </div>
          <div role="tabpanel" class="tab-pane" id="image">
            <form method="post" action="{{ route('users.user-profile.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="panel panel-info">
              <div class="panel-heading">{{ $user->name }}</div>
              <div class="panel-body">
                <div style="text-align: center;">
                  <span><img height="250" width="250" src="{{ asset('uploads/users/' . $user->image) }}" alt="{{ $user->name }}" title="{{ $user->name }}"></span>
                </div>   
                <div class="form-group">
                  <label for="profileImage">Change Your Profile Image</label>
                  <input type="file" name="profileImage" class="form-control" id="profileImage">
                </div>               
              </div>
              <div class="panel-footer">
                <button type="submit" name="updateProfileBtn" class="btn btn-primary pull-right" value="Update Profile Image">Update</button>
                <div class="clearfix"></div>
              </div>
            </div>
            </form>
          </div>
        </div>
	  </div>
	</div>
  
@endsection