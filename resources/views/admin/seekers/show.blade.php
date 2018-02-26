@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">SEEKER DETAILS</span>
        <a type="button" href="{{route('seekers.index')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#basicInfo" aria-controls="basicInfo" role="tab" data-toggle="tab">Basic Info</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="basicInfo">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h2>{{ $user->name }}</h2>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->address }}</p>
                        <p>{{ $user->phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <span><img height="250" width="250" src="{{ asset('uploads/users/' . $user->image) }}" alt="{{ $user->name }}" title="{{ $user->name }}"></span>
                    </div>
                </div>
            </div>
           
            <hr>
            <div class="row">
                <div class="col-lg-3">
                    '<span class="label label-primary">{{ $user->userType->name }}</span>
                </div>
                <div class="col-lg-3">
                    {!! ($user->is_active == 0) ? 
                        '<span class="label label-success">Active</span>' :
                        '<span class="label label-danger">Inactive</span>'
                    !!}
                </div>
                <div class="col-lg-6 text-right hidden-print">
                      <a type="button" href="{{ route('roles.edit', ['user' => $user->id]) }}" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                    <form action="{!! action('UsersController@destroy', $user->id) !!}" method="POST" style="display: inline-block;">
                        {{ csrf_field() }} {{ method_field('DELETE') }}
                       <button type="submit" title="Delete" role="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash" title="Delete"></i></button>
                    </form>        
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">...</div>
        <div role="tabpanel" class="tab-pane" id="messages">...</div>
        <div role="tabpanel" class="tab-pane" id="settings">...</div>
      </div>
      </div>
    </div>
    
@endsection