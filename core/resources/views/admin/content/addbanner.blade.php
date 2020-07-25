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
	    				<h3 class="text-center text-light">Banner Section 
	    					@if(array_key_exists('banner', $content))
	    						<span></span>
	    					@else
	    						<button class="btn btn-outline-info float-right add">ADD <i class="fa fa-plus"></i></button>
	    					@endif
	    				</h3>
	    				
	    			</div>
	    		
	    			<div class="card-body">

	    				<table class="table">
							  <thead>
							    <tr>
							      
							      <th scope="col">Title</th>
							      <th scope="col">Sub Title</th>
							      <th scope="col">Image</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
	    					<tbody>
	    						@if(array_key_exists('banner', $content))
	    						<tr>
	    							
	    							<td>{{substr(@$content['banner']['title'],0,30)}}</td>
	    							<td>{{substr(@$content['banner']['subtitle'],0,20)}}</td>

	    							<td><img src="{{asset('asset/admin/images/banner').'/'.@$content['banner']['image']}}" width="50px"></td>
	    							
	    							<td>
	    								<button class="btn btn-outline-primary edit" data-key="banner" data-title="{{@$content['banner']['title']}}" data-subtitle="{{$content['banner']['subtitle']}}"><i class="fa fa-edit"></i></button>
	    								<a href="{{route('admin.section-delete',['key'=>"banner"])}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
	    								
	    							</td>
	    						</tr>
	    						@else
	    							<tr>
	    								<td colspan="3" class="text-danger font-weight-bold text-center">No Data Found</td>
	    							</tr>
	    						@endif
	    					</tbody>
	    				</table>

	    				
	    			</div>
	    			


	    		</div>
    		</div>
    	</div>
    </div>
</div>
@endsection

@push('banner')

	<script type="text/javascript">
		$('.add').click(function(){
			$("#bannerModal").modal('show');
		});

		$('.edit').click(function(){
			$("#editModal").modal('show');
			var key = $(this).data('key');
			var title = $(this).data('title');
			var subtitle = $(this).data('subtitle');

        	$(".modal-body #id").val(key);
        	$(".modal-body #title").val(title);
        	$(".modal-body #subtitle").val(subtitle);
		});

	</script>

@endpush


<div id="bannerModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
        <h3 class="modal-title text-light">Add Banner Section Content</h3>
        
      </div>
      <div class="modal-body">

      				<form action="{{route('admin.addsection')}}" method="post" enctype="multipart/form-data">
	    					@csrf
	    					<input type="hidden" name="key" value="banner">
	    					<div class="form-group">
	    						<label>Banner Section Title</label>
	    						<textarea name="title" class="form-control" rows="5"></textarea>
	    						
	    					</div>
	    					


	    					<div class="form-group">
	    						<label>Banner Section Sub Title</label>
	    						<textarea name="subtitle" class="form-control" rows="5"></textarea>
	    						
	    					</div>	
	    					

	    					<div class="form-group">
	    						<label>Banner Section Image</label>
	    						<input type="file" name="image" class="form-control">
	    						
	    					</div>	
	    					
	    					
	    					<div class="form-group">
	    						<input type="submit" class="form-control btn btn-info" value="Save">
	    					</div>


	    				</form>
        
      </div>
     
    </div>
  </div>
</div>






{{-- Edit Modal --}}


<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
        <h3 class="modal-title text-light">Add Banner Section Content</h3>
        
      </div>
      <div class="modal-body">

      				<form action="{{route('admin.updatesection')}}" method="post" enctype="multipart/form-data">
	    					@csrf
	    					@method('put')
	    					<input type="hidden" name="key" id="id">
	    					<div class="form-group">
	    						<label>Banner Section Title</label>
	    						<textarea name="title" class="form-control" rows="5" id="title"></textarea>
	    						
	    					</div>
	    					


	    					<div class="form-group">
	    						<label>Banner Section Sub Title</label>
	    						<textarea name="subtitle" class="form-control" rows="5" id="subtitle"></textarea>
	    						
	    					</div>	
	    					

	    					<div class="form-group">
	    						<label>Banner Section Image</label>
	    						<input type="file" name="image" class="form-control">
	    						
	    					</div>	
	    					
	    					
	    					<div class="form-group">
	    						<input type="submit" class="form-control btn btn-info" value="Update">
	    					</div>


	    				</form>
        
      </div>
     
    </div>
  </div>
</div>