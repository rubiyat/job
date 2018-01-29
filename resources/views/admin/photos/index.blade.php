@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">MEDIA</span>
        <a type="button" href="{{route('photos.create')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-plus"> </i> Add Media</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
       <table class="table">

           <thead>
               <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Created</th>

               </tr>
           </thead>
           <tbody>
           @foreach($photos as $photo)
               <tr>
                   <td>{{$photo->id}}</td>
                   <td><img height="100" src="{!! url($photo->file) !!}"/> </td>
                   <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
                   <td>
                        <form action="{!! action('PhotosController@destroy', $photo->id) !!}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                           <button type="submit" title="Delete" role="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash" title="Delete"></i></button>
                        </form>        
                   </td>
               </tr>
           @endforeach
           </tbody>
       </table>
      </div>
    </div>
    
@endsection