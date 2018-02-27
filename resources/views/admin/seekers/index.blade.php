@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      @if ($message = Session::get('delete'))
      <div class="alert alert-danger alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
      @endif
      <div class="panel-heading">
        <span class="heading">SEEKER LIST</span>
        <a type="button" href="{{route('seekers.create')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-plus"> </i> Add New Seeker</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        @if ($users->count())
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="50%">Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{  $user->email }}</td>
                    <td class="hidden-print">
                      <a type="button" href="{{ route('seekers.show', ['user' => $user->id]) }}" class="btn btn-info glyphicon glyphicon-eye-open" title="Show"></a>
                      <a type="button" href="{{ route('seekers.edit', ['uaer' => $user->id]) }}" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                    </td>
                    
                </tr>
            </tbody>
            @endforeach
        </table>
        @endif
      </div>
    </div>
    
@endsection