@extends('layouts.admin')

@section('content')


	<div class="panel panel-danger panel-top">
    @if ($message = Session::get('success'))
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
	    <span class="heading">Add New User</span>
	     <a type="button" href="{{ route('users.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-remove"> </i> Cancel</a>
	      <div class="clearfix"></div>
	  </div>
	  <div class="panel-body">
	        <form method="POST" action="{{ route('users.store') }}">
	        {{ csrf_field() }}
            <label for="name">Name</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name">
                </div>
            </div>
            <label for="email">Email</label>
            <div class="form-group">
                <div class="form-line">
                     <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address">
                </div>
            </div>  
            <label for="is_active">Status</label>         
            <div class="form-group">
                <select name="is_active" class="form-control" id="is_active">
                    <option>-Select Status-</option>
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                </select>
            </div>         
            <label for="interested_role">Job Option</label>         
            <div class="form-group">
                <select name="interested_role" class="form-control" id="interested_role">
                    <option>-Select Job option-</option>
                    <option value="0">Hire</option>
                    <option value="1">Work</option>
                </select>
            </div> 
            <label for="password">Password</label>
            <div class="form-group">               
                <div class="form-line">
                    <input id="password" type="password" class="form-control" name="password" required>    
                </div>
            </div>    
           
            <br>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect"> <i class="glyphicon glyphicon-ok"> </i>  Save</button>
        </form>
	  </div>
	</div>
  
@endsection