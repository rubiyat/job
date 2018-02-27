@extends('layouts.admin')

@section('content')


	<div class="panel panel-danger panel-top">
      @if ($message = Session::get('update'))
      <div class="alert alert-success alert-block">
         <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
      </div>
      @endif

      @if(count($errors))
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <br/>
            <ul>
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
	  <div class="panel-heading">
	    <span class="heading">Edit Seeker</span>
	     <a type="button" href="{{ route('seekers.index') }}" class="btn btn-danger pull-right"> <i class="glyphicon glyphicon-menu-left"> </i> Go To Index</a>
	      <div class="clearfix"></div>
	  </div>
	  <div class="panel-body">
	       <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#basicInfo" aria-controls="basicInfo" role="tab" data-toggle="tab">Basic Info</a></li>
          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="basicInfo">
              <form method="POST" action="{{ route('seekers.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                  <label for="name">Name</label>
                  <div class="form-group">
                      <div class="form-line">
                          <input type="text" name="name" id="name" class="form-control" placeholder="Enter User Name" value="{{ $user->name }}">
                      </div>
                  </div>
                  <label for="email">Email</label>
                  <div class="form-group">
                      <div class="form-line">
                          <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email Address" value="{{ $user->email }}">
                      </div>
                  </div>   
                  <label for="address">Address</label>
                  <div class="form-group">
                      <div class="form-line">
                          <textarea cols="5" rows="4" name="address" id="address" class="form-control">{{ $user->address }}</textarea>
                      </div>
                  </div> 
                  <label for="phone">Phone</label>
                  <div class="form-group">
                      <div class="form-line">
                          <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone" value="{{ $user->phone }}">
                      </div>
                  </div>
                  <label for="profileImage">Image</label>
                  <div class="form-group">
                      <div class="form-line">
                          <input type="file" name="profileImage" id="profileImage">
                      </div>
                  </div>    
                 <label for="is_active">Status</label>         
                    <div class="form-group">
                        <select name="is_active" class="form-control" id="is_active">
                            <option value="{{ $user->is_active }}">
                                {!! ($user->is_active == 0) ? 
                                    'Active' :
                                    'Inactive'
                                !!}
                            </option>
                            {!! ($user->is_active == 0) ? 
                                '<option value="1">Inactive</option>' :
                                '<option value="0">Active</option>'
                            !!}
                        </select>
                    </div>                  
                  <label for="password">Password</label>
                  <div class="form-group">               
                      <div class="form-line">
                          <input id="password" type="password" class="form-control" name="password" required value="{{ $user->password }}">    
                      </div>
                  </div>    
                 
                  <br>
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect"> <i class="glyphicon glyphicon-ok"> </i>  Update</button>
              </form>
          </div>
          <div role="tabpanel" class="tab-pane" id="profile">...</div>
          <div role="tabpanel" class="tab-pane" id="messages">...</div>
          <div role="tabpanel" class="tab-pane" id="settings">...</div>
        </div>
	  </div>
	</div>
  
@endsection