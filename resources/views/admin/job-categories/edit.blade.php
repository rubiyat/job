@extends('layouts.admin')

@section('content')

		<div class="panel panel-danger panel-top">
		  <div class="panel-heading">
		    <span class="heading">Edit Job Category</span>
		     <a type="button" href="{{ route('job-categories.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
		      <div class="clearfix"></div>
		  </div>
		  <div class="panel-body">
		        <form method="POST" action="{{ route('job-categories.update', ['jobCategory' => $jobCategory->id]) }}">
		        {{ csrf_field() }}
		        {{ method_field('PATCH') }}
	            <label for="name">Title</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <input type="text" name="title" id="name" class="form-control" placeholder="Enter job categories title....." value="{{ $jobCategory->title }}">
	                </div>
	            </div>
	            <label for="description">Description</label>
	            <div class="form-group">
	                <div class="form-line">
	                    <textarea name="description" id="description" rows="4" class="form-control no-resize" placeholder="Please type something details about job categories....">{{ $jobCategory->description }}</textarea>
	                </div>
	            </div>  
	            <label for="is_active">Status</label>         
	           <div class="form-group">
	                <select name="is_active" class="form-control" id="is_active">
	                    <option value="{{ $jobCategory->is_active }}">
	                        {!! ($jobCategory->is_active == 0) ? 
	                            'Active' :
	                            'Inactive'
	                        !!}
	                    </option>
	                    {!! ($jobCategory->is_active == 0) ? 
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