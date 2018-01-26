@extends('layouts.admin')

@section('content')

		<div class="panel panel-danger panel-top">
		  <div class="panel-heading">
		    <span class="heading">Add New Job Post</span>
		     <a type="button" href="{{ route('job-posts.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-remove"> </i> Cancel</a>
		      <div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
		        <form method="POST" action="{{ route('job-posts.store') }}">
		        {{ csrf_field() }}
		        <label for="job_category_id">Job Category</label>         
	            <div class="form-group">
	                <select name="job_category_id" class="form-control" id="job_category_id">
	                	@foreach ($jobCategories as $jobCategory)
	                		<option value="{{ $jobCategory->id }}">{{ $jobCategory->title }}</option>
	                	@endforeach               
	                </select>
	            </div>         
	            <label for="title">Title</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter job post title.....">
	                </div>
	            </div>
	            <label for="description">Description</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <textarea name="description" id="description" rows="4" class="form-control no-resize" placeholder="Please type something details about job post...."></textarea>
	                </div>
	            </div>  
	            <label for="payment_amount">Payment Amount</label>     
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" name="payment_amount" id="payment_amount" class="form-control" placeholder="Enter job post payment amount.....">
	                </div>
	            </div>
	            <label for="working_date_time">Working Date Time</label>     
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="datetime-local" name="working_date_time" id="working_date_time" class="form-control">
	                </div>
	            </div>
	            <label for="required_employee">Required Employee</label>     
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" name="required_employee" id="required_employee" class="form-control" placeholder="Enter job post required employee.....">
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
