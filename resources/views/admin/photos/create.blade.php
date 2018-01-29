@extends('layouts.admin')

@section('style')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"/>

@endsection

@section('content')


	<div class="panel panel-danger panel-top">
	  <div class="panel-heading">
	    <span class="heading">Upload Media</span>
	     <a type="button" href="{{ route('photos.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-remove"> </i> Cancel</a>
	      <div class="clearfix"></div>
	  </div>
	  <div class="panel-body">
	        <form method="POST" action="{{ route('photos.store') }}" class="dropzone">
	        {{ csrf_field() }}
        </form>
	  </div>
	</div>
  
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection
