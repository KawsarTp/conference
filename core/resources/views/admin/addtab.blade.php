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
            
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-center text-light">Tab Items Details</h3>
                        <button class="btn btn-info modalButton float-right">Add New Tabs Item  : <i class="fa fa-plus"></i></button>
                    </div>
                    <div class="card-body">
                       <table class="table">
                        <thead class="bg-primary text-light">
                            <tr>
                              <th scope="col">sl.</th>
                              <th scope="col">Title</th>
                              <th scope="col">Details</th>
                              <th scope="col">Sub Title</th>
                              <th scope="col">Quoatation</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
{{-- @dd($content) --}}

                          <tbody>
                              @php($i = 1)
                              @foreach($content->content['tabs'] as $tabs)
                            <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$tabs['title']}}</td>
                            <td>{{substr(@$tabs['details'],0,50)}}</td>
                            <td>{{substr(@$tabs['subtitle'],0,50)}}</td>
                            @if(@$tabs['quotes'] !== null)
                            <td>
                                Quotaions : <span class="badge badge-primary">{{count(@$tabs['quotes'])}}</span>
                                <button class="btn btn-outline-info"><i class="fa fa-eye"></i></button>
                            </td>
                            @else 
                            <td></td>
                            @endif
                            <td>

                            <button class="btn btn-outline-primary edit" data-title="{{$tabs['title']}}" data-details="{{@$tabs['details']}}" data-subtitle="{{@$tabs['subtitle']}}"><span class="fa fa-edit"></span></button>

                                <button class="btn btn-outline-danger"><i class="fa fa-trash-o"></i></button>

                            </td>

                            {{-- <td>{{@$tabs['quotes']}}</td> --}}
                              {{-- @dd(@$tabs['quotes']) --}}
                            </tr>
                            @endforeach
                          </tbody>
                       </table>
                    </div>
                </div>

            </div>
    	</div>
    </div>
</div>




<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('admin.viewtickets')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="type">Tab Title:</label>
                        <input type="text" name="type" class="form-control" id="type">
                    </div>
 
                   
                    
                         
                        <div class="form-group">
                                <label for="type">Ticket Details:</label>
                                <textarea id="" cols="30" rows="10" name="details" class="form-control"></textarea>
                        </div>

                     
 
                     <div class="form-group">
                         <label for="type">Tab Sub Title (Optional):</label>
                         <textarea name="sub" id="feature" cols="10" rows="5" class="form-control"></textarea>
                     </div>
                     
 
                     
                     <div class="form-group">
                         
                         <input type="submit" value="Add Tabs" class="from-control btn btn-primary" >
                     </div>
 
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@push('tab')
<script>
	$(".modalButton").on('click',function(){
        $("#myModal").modal('show');
	});

    $(".edit").on('click',function(){
        $("#editModal").modal('show');
        var title = $(this).data('title');
        var details = $(this).data('details');
        var subtitle = $(this).data('subtitle');

        $(".modal-body #title").val(title);
        $(".modal-body #details").val(details);
        $(".modal-body #subtitle").val(subtitle);
	});

</script>
@endpush

<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
            <form action="{{route('admin.tab-edit')}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label for="type">Tab Title:</label>
                    <input type="text" name="title" class="form-control" id="title" value="">
                    </div>
 
                   
                    
                         
                        <div class="form-group">
                                <label for="type">Tab Details:</label>
                                <textarea id="details" cols="30" rows="10" name="details" class="form-control"></textarea>
                        </div>

                     
 
                     <div class="form-group">
                         <label for="type">Tab Sub Title (Optional):</label>
                         <textarea name="subtitle" id="subtitle" cols="10" rows="5" class="form-control"></textarea>
                     </div>
                     
 
                     
                     <div class="form-group">
                         
                         <input type="submit" name="tab" value="Update Tabs" class="from-control btn btn-primary" >
                     </div>
 
                </form>
            </div>
        </div>
    </div>
</div>