@extends('layouts.admin')

@section('content')


	<div class="panel panel-danger panel-top">
	  <div class="panel-heading">
	    <span class="heading">Edit Role</span>
	     <a type="button" href="{{ route('roles.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-remove"> </i> Cancel</a>
	      <div class="clearfix"></div>
	  </div>
	  <div class="panel-body">
	        <form method="POST" action="{{ route('roles.update', ['role' => $role->id]) }}">
	        {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <label for="name">Role Name</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Role Name" value="{{ $role->name }}">
                </div>
            </div>
            <label for="description">Description</label>
            <div class="form-group">
                <div class="form-line">
                    <textarea name="description" id="description" rows="4" class="form-control no-resize" placeholder="Please type something details about role....">{{ $role->description }}</textarea>
                </div>
            </div>  
            <label for="is_active">Status</label>         
            <div class="form-group">
                <select name="is_active" class="form-control" id="is_active">
                    <option value="{{ $role->is_active }}">
                        {!! ($role->is_active == 0) ? 
                            'Active' :
                            'Inactive'
                        !!}
                    </option>
                    {!! ($role->is_active == 0) ? 
                        '<option value="1">Inactive</option>' :
                        '<option value="0">Active</option>'
                    !!}
                </select>
            </div>           
           
            <br>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect"> <i class="glyphicon glyphicon-ok"> </i>  Update</button>
        </form>
	  </div>
	</div>
  
@endsection