@extends('layouts.admin')

@section('content')

    <div class="panel panel-danger panel-top">
   {{--  @if ($message = Session::get('delete'))
    <div class="alert alert-danger alert-block">
       <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
    </div>
    @endif --}}
      <div class="panel-heading">
        <span class="heading">CONTACT</span>
        <a type="button" href="{{route('job-categories.create')}}" class="btn btn-primary pull-right hidden-print"> <i class="glyphicon glyphicon-plus"> </i> Add New Contact</a>
        <button style="margin-right:5px;" title="Print" type="button" onclick="window.print();" class="btn btn-primary pull-right hidden-print"><i class="glyphicon glyphicon-print"></i></button>
        <div class="clearfix"></div>
      </div>
      <div class="panel-body">
        @if ($contacts->count())
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Subject Name</th>
                    <th class="hidden-print">Action</th>
                </tr>
            </thead>
            @foreach($contacts as $contact)
            <tbody>
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $contact->user->name }}</td>
                    <td>{{ $contact->subject }}</td>
                   
                    <td class="hidden-print">
                        <a type="button" href="{{ route('contacts.show', ['contact' => $contact->id]) }}" class="btn btn-info glyphicon glyphicon-eye-open" title="Show"></a>
                        <a type="button" href="{{ route('contacts.edit', ['contact' => $contact->id]) }}" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                        <form action="{!! action('ContactController@destroy', $contact->id) !!}" method="POST" style="display: inline-block;">
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
   
