@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
      <div class="panel-heading">
        <span class="heading">COMMENTS DETAILS</span>
        <a type="button" href="{{route('contacts.index')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        <h2>{{ $contact->user->name }}</h2>
        <h4>{{ $contact->subject }}</h4>
        <p>{{ $contact->body }}</p>
        <hr>
            <div class="col-lg-12 text-right hidden-print">
                  <a type="button" href="{{ route('contacts.edit', ['contact' => $contact->id]) }}" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                <form action="{!! action('ContactController@destroy', $contact->id) !!}" method="POST" style="display: inline-block;">
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                   <button type="submit" title="Delete" role="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash" title="Delete"></i></button>
                </form>        
        </div>
      </div>
    </div>
    
@endsection
    
