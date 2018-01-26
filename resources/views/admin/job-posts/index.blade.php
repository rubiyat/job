@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">JOB POSTS</span>
        <a type="button" href="{{route('job-posts.create')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-plus"> </i> Add New Job Post</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        @if ($jobPosts->count())
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="25%">Job Category Name</th>
                    <th width="30%">Title</th>
                    <th>Working Date Time</th>
                    <th>Status</th>
                    <th class="hidden-print">Action</th>
                </tr>
            </thead>
            @foreach($jobPosts as $jobPost)
            <tbody>
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $jobPost->jobCategory->title }}</td>
                    <td>{{ $jobPost->title }}</td>
                    <td>{{ $jobPost->working_date_time }}</td>
                    <td>
                        {!! ($jobPost->is_active == 0) ? 
                            '<span class="label label-success">Active</span>' :
                            '<span class="label label-danger">Inactive</span>'
                        !!}
                    </td>
                    <td class="hidden-print">
                        <a type="button" href="{{ route('job-posts.show', ['jobPost' => $jobPost->id]) }}" class="btn btn-info glyphicon glyphicon-eye-open" title="Show"></a>
                        <a type="button" href="{{ route('job-posts.edit', ['jobPost' => $jobPost->id]) }}" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                        <form action="{!! action('JobPostsController@destroy', $jobPost->id) !!}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                           <button type="submit" title="Delete" role="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash" title="Delete"></i></button>
                        </form>        

                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @endif
      </div>
    </div>
    
@endsection
   
