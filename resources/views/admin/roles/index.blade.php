@extends('layouts.admin')

@section('content')
         <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <span class="table-heading">ROLE</span>
                           <a type="button" href="{{route('roles.create')}}" class="btn btn-primary pull-right"> <i class="glyphicon glyphicon-plus"> </i> Add New Role</a>
							<div class="clearfix"></div>
                        </div>
                        <div class="body table-responsive">
                        	@if ($roles->count())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($roles as $role)
                                <tbody>
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                        	<a type="button" href="" class="btn btn-info glyphicon glyphicon-eye-open" title="Show"></a>
                                        	<a type="button" href="" class="btn btn-success glyphicon glyphicon-edit" title="Edit"></a>
                                        	<a type="button" href="" class="btn btn-danger glyphicon glyphicon-trash" title="Delete"></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
@endsection