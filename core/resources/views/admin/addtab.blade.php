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
	    				<h3 class="text-center">About Section Content</h3>
	    				@include('admin.alert')
	    			</div>
	    			<div class="card-body">
	    				<form action="{{route('admin.about')}}" method="post" enctype="multipart/form-data">
	    					@csrf
	    					
	    					<div class="form-group">
	    						<label>Tab Section Title</label>
	    						<textarea name="title" class="form-control" rows="5" cols="5">{{$content->content['title']}}</textarea>
	    						
	    					</div>
	    					@if($errors->has('title'))
	    						<p class="alert alert-danger">{{$errors->first('title')}}</p>
	    					@endif


	    					<div class="form-group">
	    						<label>Tab Name</label>
	    						<input type="text" name="name" class="form-control" value="{{}}"> 
	    						
	    					</div>

	    					@if($errors->has('name'))
	    						<p class="alert alert-danger">{{$errors->first('name')}}</p>
	    					@endif

	    					<div class="form-group">
	    						<label>Tab Details</label>
	    						<textarea name="details" class="form-control" rows="5" cols="5">{{$content->content['title']}}</textarea>
	    						
	    					</div>
	    					@if($errors->has('details'))
	    						<p class="alert alert-danger">{{$errors->first('details')}}</p>
	    					@endif

	    					

	    					<div class="form-group">
	    						<label>About Section Image</label>
	    						<input type="file" name="image" class="form-control">
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

@endsection