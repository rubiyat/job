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
	     <a type="button" href="{{ route('admins.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
	      <div class="clearfix"></div>
	  </div>
	  <div class="panel-body">
	        <form method="POST" action="{{ route('admins.update', ['admin' => $admin->id]) }}">
	        {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <label for="role_id">Roles</label>         
            <div class="form-group">
                 <select name="role_id" class="form-control" id="role_id">
                    <option value="{{ $admin->role_id }}">{{ $admin->role->name }}</option>
                   @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>         
            
            <label for="name">Name</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name" value="{{ $admin->name }}">
                </div>
            </div>
            <label for="email">Email</label>
            <div class="form-group">
                <div class="form-line">
                     <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address" value="{{ $admin->email }}">
                </div>
            </div>  
            <label for="is_active">Status</label>         
            <div class="form-group">
                <select name="is_active" class="form-control" id="is_active">
                    <option value="{{ $admin->is_active }}">
                        {!! ($admin->is_active == 0) ? 
                            'Active' :
                            'Inactive'
                        !!}
                    </option>
                    {!! ($admin->is_active == 0) ? 
                        '<option value="1">Inactive</option>' :
                        '<option value="0">Active</option>'
                    !!}
                </select>
            </div>         
            
            <label for="password">Password</label>
            <div class="form-group">               
                <div class="form-line">
                    <input id="password" type="password" class="form-control" name="password" value="{{ $admin->password }}" required>    
                </div>
            </div>    
           
            <br>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect"> <i class="glyphicon glyphicon-ok"> </i>  Update</button>
        </form>
	  </div>
	</div>
  
@endsection