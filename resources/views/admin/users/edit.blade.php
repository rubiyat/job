@extends('layouts.admin')

@section('content')


	<div class="panel panel-danger panel-top">
      @if ($message = Session::get('update'))
      <div class="alert alert-success alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
      @endif

      @if(count($errors))
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br/>
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
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
            <label for="user_type_id">User Type</label>         
            <div class="form-group">
                <select name="user_type_id" class="form-control" id="user_type_id">
                    <option value="{{ $user->user_type_id }}">
                        {{ $user->userType->name }}
                    </option>
                    @foreach ($userTypes as $userType)
                        <option value="{{ $userType->id }}">{{ $userType->name }}</option>
                    @endforeach
                </select>
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