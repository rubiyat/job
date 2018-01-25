@extends('layouts.admin')

@section('content')


	<div class="panel panel-danger panel-top">
	  <div class="panel-heading">
	    <span class="heading">Edit User</span>
	     <a type="button" href="{{ route('users.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
	      <div class="clearfix"></div>
	  </div>
	  <div class="panel-body">
	        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
	        {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <label for="name">Name</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name" value="{{ $user->name }}">
                </div>
            </div>
            <label for="email">Email</label>
            <div class="form-group">
                <div class="form-line">
                     <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address" value="{{ $user->email }}">
                </div>
            </div>  
            <label for="is_active">Status</label>         
            <div class="form-group">
                <select name="is_active" class="form-control" id="is_active">
                    <option value="{{ $user->is_active }}">
                        {!! ($user->is_active == 0) ? 
                            'Active' :
                            'Inactive'
                        !!}
                    </option>
                    {!! ($user->is_active == 0) ? 
                        '<option value="1">Inactive</option>' :
                        '<option value="0">Active</option>'
                    !!}
                </select>
            </div>         
            <label for="interested_role">Job Option</label>         
            <div class="form-group">
                <select name="interested_role" class="form-control" id="interested_role">
                    <option value="{{ $user->interested_role }}">
                        {!! ($user->interested_role == 0) ? 
                            'Hire' :
                            'Work'
                        !!}
                    </option>
                    {!! ($user->interested_role == 0) ? 
                        '<option value="1">Work</option>' :
                        '<option value="0">Hire</option>'
                    !!}
                </select>
            </div> 
            <label for="password">Password</label>
            <div class="form-group">               
                <div class="form-line">
                    <input id="password" type="password" class="form-control" name="password" value="{{ $user->email }}" required>    
                </div>
            </div>    
           
            <br>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect"> <i class="glyphicon glyphicon-ok"> </i>  Update</button>
        </form>
	  </div>
	</div>
  
@endsection