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
	    			<div class="card-header" style="background-image: radial-gradient( circle farthest-corner at 12.3% 19.3%,  rgba(85,88,218,1) 0%, rgba(95,209,249,1) 100.2% );">
	    				<h3 class="text-center text-light">Over View Section <span class="float-right"><a href="javascript:void(0)" class="btn btn-outline-primary overview">ADD <i class="fa fa-plus"></i></a></span></h3>
	    				
                    </div>
                    
	    			<div class="card-body">
	    				<table class="table">
                            <thead class="text-center bg-dark text-light" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                                <tr>
                                    <th>sl</th>
                                    <th>title</th>
                                    <th>Details</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody>
                                @php($i = 1)
                                @foreach($overview as $data)
                                <tr>
                                <th>{{$i++}}</th>
                                    <th>{{$data->title}}</th>
                                    <th>{{substr($data->details,0,25)."......."}}</th>
                                    <th><i class="fa {{$data->icon}} text-primary" style="font-size: 30px"></i></th>
                                    <th>
                                    <button class="btn btn-outline-info edit" data-id={{$data->id}} data-title="{{$data->title}}" data-details="{{$data->details}}" data-icon={{$data->icon}}><i class="fa fa-edit"></i></button>

                                    <a class="btn btn-outline-danger delete" href="{{route('admin.delete-overview',['id'=>$data->id])}}"><i class="fa fa-trash"></i></a>
                                    </th>
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
@endsection

@push('overview')
    <script>
        $('.overview').click(function(e){
            $('#myModal').modal('show');

            e.preventDefault();
        });


        $('.edit').click(function(e){
            $('#editModal').modal('show');

            var id = $(this).data('id');
            var title = $(this).data('title');
            var details = $(this).data('details');
            var icon = $(this).data('icon');
            
            $(".modal-body #id").val(id);
            $(".modal-body #title").val(title);
            $(".modal-body #details").val(details);
            $(".modal-body #icon").addClass(icon);

        });
    </script>
@endpush

<div id="myModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-header bg-info text-center text-light" style="background-image: radial-gradient( circle farthest-corner at 12.3% 19.3%,  rgba(85,88,218,1) 0%, rgba(95,209,249,1) 100.2% );">
                <h3>Add Overview Section</h3>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.overview')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden">

                    <div class="form-group">
                        <label for="">Title</label>
                        <input class="form-control" type="text" name="title">
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Details</label>
                        <textarea id="my-textarea" class="form-control" name="details" rows="3"></textarea>
                    </div>

                    <div class="form-group">

                        <label for="">Pick Icon For This section</label>
                        <button class="btn btn-secondary form-control" data-iconset="fontawesome4" data-arrow-prev-icon-class="fa fa-angle-left"
                        data-arrow-next-icon-class="fa fa-angle-right" data-iconset-version="4.7.0" role="iconpicker" name="icon" id="icon" data-icon=""></button>
                            
                    </div>


                    <div class="form-group">

                       <input type="submit" value="Save" class="btn btn-primary form-control"> 
                            
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div id="editModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-header text-center text-light" style="background-image: radial-gradient( circle farthest-corner at 12.3% 19.3%,  rgba(85,88,218,1) 0%, rgba(95,209,249,1) 100.2% );">
                <h3>Add Overview Section</h3>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.update-overview')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input class="form-control" type="text" name="title" id="title">
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Details</label>
                        <textarea class="form-control" name="details" rows="3" id="details"></textarea>
                    </div>

                    <div class="form-group">

                    <label for="">Update Icon <i class="fa text-primary" id="icon"></i></label>
                        <button class="btn btn-secondary form-control" data-iconset="fontawesome4" data-arrow-prev-icon-class="fa fa-angle-left"
                        data-arrow-next-icon-class="fa fa-angle-right" data-iconset-version="4.7.0" role="iconpicker" name="icon" id="icon" data-icon=""></button>
                            
                    </div>


                    <div class="form-group">

                       <input type="submit" value="Update" class="btn btn-primary form-control"> 
                            
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>