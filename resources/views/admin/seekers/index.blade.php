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
        <a type="button" href="{{route('users.create')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-plus"> </i> Add New User</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        @if ($seekers->count())
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="50%">Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            @foreach($seekers as $seeker)
            <tbody>
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $seeker->name }}</td>
                    <td>{{  $seeker->email }}</td>
                    
                </tr>
            </tbody>
            @endforeach
        </table>
        @endif
      </div>
    </div>
    
@endsection