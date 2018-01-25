@extends('layouts.admin')

@section('content')

		<div class="panel panel-danger panel-top">
		  <div class="panel-heading">
		    <span class="heading">Add New Job Category</span>
		     <a type="button" href="{{ route('job-categories.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-remove"> </i> Cancel</a>
		      <div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
		        <form method="POST" action="{{ route('job-categories.store') }}">
		        {{ csrf_field() }}
	            <label for="name">Title</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" name="title" id="name" class="form-control" placeholder="Enter job categories title.....">
	                </div>
	            </div>
	            <label for="description">Description</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <textarea name="description" id="description" rows="4" class="form-control no-resize" placeholder="Please type something details about job categories...."></textarea>
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