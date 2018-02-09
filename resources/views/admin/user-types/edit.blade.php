@extends('layouts.admin')

@section('content')

		<div class="panel panel-danger panel-top">
			{{-- @if ($message = Session::get('success'))
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
			   @endif --}}
		  <div class="panel-heading">
		    <span class="heading">Update User Type</span>
		     <a type="button" href="{{ route('user-types.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-remove"> </i> Cancel</a>
		      <div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
		        <form method="POST" action="{{ route('user-types.update', ['userType' => $userType->id]) }}">
		        {{ csrf_field() }}
		        {{ method_field('PATCH') }}
	            <label for="name">Name</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter user type name....." value="{{ $userType->name }}">
	                </div>
	            </div>
	            <label for="description">Description</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <textarea name="description" id="description" rows="4" class="form-control no-resize" placeholder="Please type something details about user type....">{{ $userType->description }}</textarea>
	                </div>
	            </div>  
	            <label for="is_active">Status</label>         
	           <div class="form-group">
	                <select name="is_active" class="form-control" id="is_active">
	                    <option value="{{ $userType->is_active }}">
	                        {!! ($userType->is_active == 0) ? 
	                            'Active' :
	                            'Inactive'
	                        !!}
	                    </option>
	                    {!! ($userType->is_active == 0) ? 
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