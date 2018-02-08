@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
  {{--   @if ($message = Session::get('delete'))
    <div class="alert alert-danger alert-block">
       <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
    </div>
    @endif --}}
      <div class="panel-heading">
        <span class="heading">USER TYPE</span>
        <a type="button" href="{{route('user-types.create')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-plus"> </i> Add New User Type</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        @if ($userTypes->count())
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="60%">User Type Name</th>
                    <th>Status</th>
                    <th class="hidden-print">Action</th>
                </tr>
            </thead>
            @foreach($userTypes as $userType)
            <tbody>
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $userType->name }}</td>
                    <td>
                        {!! ($userType->is_active == 0) ? 
                            '<span class="label label-success">Active</span>' :
                            '<span class="label label-danger">Inactive</span>'
                        !!}
                    </td>
                    <td class="hidden-print">
                        <a type="button" href="{{ route('user-types.show', ['userType' => $userType->id]) }}" class="btn btn-info glyphicon glyphicon-eye-open" title="Show"></a>
                        <a type="button" href="{{ route('user-types.edit', ['userType' => $userType->id]) }}" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                        <form action="{!! action('UserTypeController@destroy', $userType->id) !!}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                           <button type="submit" title="Delete" role="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash" title="Delete"></i></button>
                        </form>        

                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @endif
      </div>
    </div>
    
@endsection
   
