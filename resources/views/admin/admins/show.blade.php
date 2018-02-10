@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">USER DETAILS</span>
        <a type="button" href="{{route('admins.index')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <div class="col-lg-6">
            <p>{{ $admin->email }}</p>
            <p>{{ $admin->address }}</p>
            <p>{{ $admin->phone }}</p>
        </div>
        <div class="col-lg-6">
            <img height="250" width="250" src="{{ asset('uploads/users/' . $admin->image) }}" alt="{{ $admin->name }}" title="{{ $admin->name }}">
            <h2>{{ $admin->name }}</h2>      
        </div>
       
        <hr>
        <div class="col-lg-12">
            <div class="col-lg-6 pull-left">
                {!! ($admin->is_active == 0) ? 
                    '<span class="label label-success">Active</span>' :
                    '<span class="label label-danger">Inactive</span>'
                !!}
            </div>
            <div class="col-lg-2 col-lg-offset-4 pull-right hidden-print">
                  <a type="button" href="{{ route('admins.edit', ['admin' => $admin->id]) }}" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                <form action="{!! action('AdminController@destroy', $admin->id) !!}" method="POST" style="display: inline-block;">
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                   <button type="submit" title="Delete" role="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash" title="Delete"></i></button>
                </form>        
            </div>
            <div class="clearfix"></div>
        </div>
      </div>
    </div>
    
@endsection