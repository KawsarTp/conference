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
	    				<h3 class="text-center text-light">All Setting</h3>
	    				{{-- @include('admin.alert') --}}
	    			</div>
	    			<div class="card-body">
	    				<form action="{{route('admin.setting')}}" method="post">
	    					@csrf
	    					<div class="form-group">
	    						<label>Conference Start Date</label>
	    						<input type="text" name="from" class="form-control" id="datepicker">
	    					</div>
	    					
	    					<div class="form-group">
	    						<label>Conference End Date</label>
	    						<input type="date" name="to" class="form-control">
	    					</div>	
	    					
	    					<div class="form-group">
	    						<label>Conference Location</label>
	    						<input type="text" name="location" class="form-control">
							</div>
							

	    					
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

@push('datepick')

<script>
  $( function() {
  	var date = (new Date("{{$setting->start_date}}") - new Date()) / (1000 * 3600 * 24);
    $( "#datepicker" ).datepicker({ minDate: Math.floor(date), maxDate: "+1M +10D" });
  } );
  </script>

@endpush