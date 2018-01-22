@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">ROLE</span>
        <a type="button" href="{{route('roles.create')}}" class="btn btn-primary pull-right"> <i class="glyphicon glyphicon-plus"> </i> Add New Role</a>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        @if ($roles->count())
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="70%">Role Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($roles as $role)
            <tbody>
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                        <a type="button" href="" class="btn btn-info glyphicon glyphicon-eye-open" title="Show"></a>
                        <a type="button" href="" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                        <a type="button" href="" class="btn btn-danger glyphicon glyphicon-trash" title="Delete"></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @endif
      </div>
    </div>
    
@endsection