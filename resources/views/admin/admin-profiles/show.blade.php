@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">USER'S PROFILE</span>
        <a type="button" href="{{route('roles.index')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basicInfo" aria-controls="basicInfo" role="tab" data-toggle="tab">Basic Info</a></li>
            <li role="presentation"><a href="#image" aria-controls="image" role="tab" data-toggle="tab">Image</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="basicInfo">
              <div class="panel panel-info">
                <div class="panel-heading">{{ Auth::user()->name }}</div>
                <div class="panel-body">
                  <h4>First Name:</h4>
                  <h4>Last Name:</h4>
                  <h4>Address:</h4>
                  <h4>Email:</h4>
                  <h4>Phone:</h4>
                </div>
                <div class="panel-footer">
                  <button class="btn btn-primary pull-right">Update Profile</button>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="image">
              <div class="panel panel-info">
                <div class="panel-heading">{{ Auth::user()->name }}</div>
                <div class="panel-body">
                  <div style="text-align: center;">
                    <span><img height="250" width="250" src="http://userproplugin.com/userpro/wp-content/uploads/userpro/15531/587672f9c6375.png" alt=""></span>
                  </div>                  
                </div>
                <div class="panel-footer">
                  <button class="btn btn-primary pull-right">Update Profile</button>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    
@endsection