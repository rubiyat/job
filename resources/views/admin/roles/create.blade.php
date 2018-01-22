@extends('layouts.admin')

@section('content')
       
	<!-- Vertical Layout -->
	<div class="row clearfix">
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div class="card">
	            <div class="header">
	                <h2>
	                    Add New Role
	                </h2>
	            </div>
	            <div class="body">
	                <form>
	                    <label for="name">Role Name</label>
	                    <div class="form-group">
	                        <div class="form-line">
	                            <input type="text" id="name" class="form-control" placeholder="Enter Role Name">
	                        </div>
	                    </div>
	                    <label for="description">Description</label>
	                    <div class="form-group">
	                        <div class="form-line">
	                            <textarea id="description" rows="4" class="form-control no-resize" placeholder="Please type something details about role...."></textarea>
	                        </div>
	                    </div>

	                   
                            
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="">-- Please select --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                       
                       
	                    <br>
	                    <button type="button" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- #END# Vertical Layout -->
@endsection