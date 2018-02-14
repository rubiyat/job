@extends('layouts.admin')

@section('content')

		<div class="panel panel-danger panel-top">
		
	{{-- 	@if ($message = Session::get('update'))
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
		    <span class="heading">Edit Job Category</span>
		     <a type="button" href="{{ route('contacts.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
		      <div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
		        <form method="POST" action="{{ route('contacts.update', ['contact' => $contact->id]) }}">
		        {{ csrf_field() }}
		        {{ method_field('PATCH') }}
	            <label for="name">Subject</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter job categories subject....." value="{{ $contact->subject }}">
	                </div>
	            </div>
	            <label for="body">Description</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <textarea name="body" id="body" rows="4" class="form-control no-resize" placeholder="Please type something details about comments....">{{ $contact->body }}</textarea>
	                </div>
	            </div>  
	           
	            <button type="submit" class="btn btn-primary m-t-15 waves-effect"> <i class="glyphicon glyphicon-ok"> </i>  Update</button>
	        </form>
		  </div>
		</div>
  
@endsection