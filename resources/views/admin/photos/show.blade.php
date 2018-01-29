@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">MEDIA DETAILS</span>
        <a type="button" href="{{route('photos.index')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
        <form class="pull-right" action="{!! action('PhotosController@destroy', $photo->id) !!}" method="POST" style="display: inline-block;">
            {{ csrf_field() }} {{ method_field('DELETE') }}
           <button style="margin-right:5px;" type="submit" title="Delete" role="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash" title="Delete"></i></button>
        </form>   
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button> 
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <img height="200" width="200" src="{!! url($photo->file) !!}"/>
        <p>{{$photo->created_at}}</p>
        <hr>
        
      </div>
    </div>
    
@endsection