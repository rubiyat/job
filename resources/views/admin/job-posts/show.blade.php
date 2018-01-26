@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">JOB POST DETAILS</span>
        <a type="button" href="{{route('job-posts.index')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <h2>{{ $jobPost->title }}</h2>
        <p>{{ $jobPost->jobCategory->title }}</p>
        <p>{{ $jobPost->description }}</p>
        <p>{{ $jobPost->payment_amount }}</p>
        <p>{{ $jobPost->working_date_time }}</p>
        <p>{{ $jobPost->required_employee }}</p>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                {!! ($jobPost->is_active == 0) ? 
                    '<span class="label label-success">Active</span>' :
                    '<span class="label label-danger">Inactive</span>'
                !!}
            </div>
            <div class="col-lg-6 text-right hidden-print">
                  <a type="button" href="{{ route('job-posts.edit', ['jobPost' => $jobPost->id]) }}" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                <form action="{!! action('JobPostsController@destroy', $jobPost->id) !!}" method="POST" style="display: inline-block;">
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                   <button type="submit" title="Delete" role="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash" title="Delete"></i></button>
                </form>        
            </div>
        </div>
      </div>
    </div>
    
@endsection
    
