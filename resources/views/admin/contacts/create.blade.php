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
		    <span class="heading">Add New Comment</span>
		     <a type="button" href="{{ route('contacts.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-remove"> </i> Cancel</a>
		      <div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
		        <form method="POST" action="{{ route('contacts.store') }}">
		        {{ csrf_field() }}
	            <label for="subject">Subject</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter comment subject.....">
	                </div>
	            </div>
	            <label for="body">Description</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <textarea name="body" id="body" rows="4" class="form-control no-resize" placeholder="Please type something details about comment...."></textarea>
	                </div>
	            </div>  
	         
	            <button type="submit" class="btn btn-primary m-t-15 waves-effect"> <i class="glyphicon glyphicon-ok"> </i>  Save</button>
	        </form>
		  </div>
		</div>
  
@endsection