@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">


    <!-- Header-->
        @include('admin.nav')
    <!-- /#header -->
    <div class="container-fluid">
    	<div class="row justify-content-center ">
    		<div class="col-md-12 mt-3">
	    		<div class="card">
	    			<div class="card-header card-background">
	    				<h3 class="text-center text-light">About Content </h3>
	    			</div>
	    		
	    			<div class="card-body">
						<form action="{{route('admin.updatesection')}}" method="post" enctype="multipart/form-data">
	    					@csrf
	    					@method('put')
	    					<input type="hidden" name="key" id="about" value="about">
	    					<div class="form-group">
	    						<label>Title</label>
	    						<input type="text" class="form-control" name="title" value="{{@$content['about']['title']}}">
	    						
	    					</div>
	    					


	    					<div class="form-group">
	    						<label>Sub Title</label>
	    						<textarea name="subtitle" class="form-control nicEdit" rows="8" id="subtitle">{!!@$content['about']['subtitle']!!}</textarea>
	    						
	    					</div>	
	    					

	    					<div class="form-row">

								<div class="col">
									<label for="">Image: </label>
									<input type="file" name="image image-size" class="form-control d-block" >
	    							<span class="image-size">N.B - Image Size will be 806 X 706 px</span>
								</div>

								<div class="col py-3">
									<div class="pl-5">
									<label for="" class="align-top">Current Image : </label>
									<img src="{{asset('asset/admin/images/about/'. @$content['about']['image'])}}" alt="about" class="img-fluid w-25 img-thumbnail " >
									</div>
									
								</div>

								
							  </div>	
	    					
	    					
	    					<div class="form-group">
	    						<input type="submit" class="form-control btn btn-info" value="Update" onclick="getCont()">
	    					</div>


						</form>
	    				
	    			</div> 			
	    		</div>
    		</div>
    	</div>
    </div>
</div>
@endsection

@push('content')

<script src="http://blast.thesoftking.com/lab/xenwallet/assets/admin/js/nicEdit.js"></script>
<script>
    bkLib.onDomLoaded(function() {
        $( ".nicEdit" ).each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
	});
	
function getCont(){
		var c = ndinstance.getContent();

		var start_ptn = /(<.[^>]+>)*/gmi; //Filter label opening	
		 var end_ptn = /<\/?\w+>$/; //Filter tag ends
		 var space_ptn = /(&nbsp;)*/; //Filter spaces
		var c1 = c.replace(start_ptn,"").replace(end_ptn).replace(space_ptn,"");

	}
</script>
<style>
	.card-background{
		background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );
	}
	

	.image-size{
		color: brown;
	}

	textarea {
      background-color: white;
  }

	
</style>

@endpush


