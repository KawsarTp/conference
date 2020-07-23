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
	    			<div class="card-header" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
	    				<h3 class="text-center text-light">Banner Content</h3>
	    				@include('admin.alert')
	    			</div>
	    			<div class="card-body">
	    				<form action="{{route('admin.banner')}}" method="post">
	    					@csrf
	    					
	    					<div class="form-group">
	    						<label>Banner Section Title</label>
	    						<input type="text" name="title" class="form-control" value="{{$content->content['title']}}">
	    					</div>
	    					@if($errors->has('title'))
	    						<p class="alert alert-danger">{{$errors->first('title')}}</p>
	    					@endif


	    					<div class="form-group">
	    						<label>Banner Section Sub Title</label>
	    						<input type="text" name="subtitle" class="form-control" value="{{$content->content['subtitle']}}">
	    					</div>	
	    					@if($errors->has('sub'))
	    						<p class="alert alert-danger">{{$errors->first('sub')}}</p>
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