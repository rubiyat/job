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
	    <span class="heading">Add New Role</span>
	     <a type="button" href="{{ route('roles.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-remove"> </i> Cancel</a>
	      <div class="clearfix"></div>
	  </div>
	  <div class="panel-body">
	        <form method="POST" action="{{ route('roles.store') }}">
	        {{ csrf_field() }}
            <label for="name">Role Name</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Role Name" required>
                </div>
            </div>
            <label for="description">Description</label>
            <div class="form-group">
                <div class="form-line">
                    <textarea name="description" id="description" rows="4" class="form-control no-resize" placeholder="Please type something details about role...."></textarea>
                </div>
            </div>  
            <label for="is_active">Status</label>         
            <div class="form-group">
                <select name="is_active" class="form-control" id="is_active">
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                </select>
            </div>           
           
            <br>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect"> <i class="glyphicon glyphicon-ok"> </i>  Save</button>
        </form>
	  </div>
	</div>
  
@endsection