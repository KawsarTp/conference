@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">


    <!-- Header-->
        @include('admin.nav')
    <!-- /#header -->
    <div class="container">
    	<div class="row justify-content-center mt-3">
    		<div class="col-md-10">
	    		<div class="card">
	    			<div class="card-header">
	    				<h3 class="text-center">All Setting</h3>
	    				@include('admin.alert')
	    			</div>
	    			<div class="card-body">
	    				<form action="{{route('admin.setting')}}" method="post">
	    					@csrf
	    					<div class="form-group">
	    						<label>Conference Start Date</label>
	    						<input type="date" name="from" class="form-control">
	    					</div>
	    					@if($errors->has('from'))
	    						<p class="alert alert-danger">{{$errors->first('from')}}</p>
	    					@endif
	    					<div class="form-group">
	    						<label>Conference End Date</label>
	    						<input type="date" name="to" class="form-control">
	    					</div>	
	    					@if($errors->has('to'))
	    						<p class="alert alert-danger">{{$errors->first('to')}}</p>
	    					@endif
	    					<div class="form-group">
	    						<label>Conference Location</label>
	    						<input type="text" name="location" class="form-control">
	    					</div>
	    					@if($errors->has('location'))
	    						<p class="alert alert-danger">{{$errors->first('location')}}</p>
	    					@endif
	    					<div class="form-group">
	    						<input type="submit" class="form-control btn btn-info" value="Save">
	    					</div>


	    				</form>
	    			</div>
	    		</div>
    		</div>
    	</div>
    </div>
</div>