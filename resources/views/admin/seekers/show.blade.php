@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">USER DETAILS</span>
        <a type="button" href="{{route('users.index')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->email }}</p>
        <hr>
        <div class="row">
            <div class="col-lg-3">
                {{ $user->userType->name }}
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
    </div>
    
@endsection