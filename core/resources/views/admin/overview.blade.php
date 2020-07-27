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
    	<div class="row justify-content-center">
    		<div class="col-md-12 mt-3">
	    		<div class="card">
	    			<div class="card-header card-background">
	    				<h3 class="text-center text-light">Over View Content <span class="float-right"><a href="javascript:void(0)" class="btn btn-outline-primary overview">ADD <i class="fa fa-plus"></i></a></span></h3>
	    				
                    </div>
                    
	    			<div class="card-body">
	    				<table class="table">
                            <thead class="text-center bg-dark text-light">
                                <tr>
                                    <th>sl</th>
                                    <th>title</th>
                                    <th>Details</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>

                            </thead>

                            <tbody class="text-center">
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



    <div class="container-fluid">
    	<div class="row justify-content-center mt-3">
    		<div class="col-md-12">
	    		<div class="card">
	    			<div class="card-header card-background">
	    				<h3 class="text-center text-light">Over View Section Image</h3>
	    				
                    </div>
                    
	    			<div class="card-body">
	    				<form action="{{route('admin.updatesection')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                                <input type="hidden" name="key" value="overview">
            
                                <div class="form-row">

                                    <div class="col">
                                        <label for="">Image: </label>
                                        <input type="file" name="image" class="form-control d-block" required>
                                        <span class="image-size">N.B-Image Size will be 982 X 627 px</span>
                                    </div>
    
                                    <div class="col py-3">
                                        <div class="pl-5">
                                            <label for="" class="align-top">Current Image : </label>
                                            <img src="{{asset('asset/admin/images/overview/'. @$content['overview']['image'])}}"
                                                alt="Banner" class="img-fluid w-25 img-thumbnail ">
                                        </div>
    
                                    </div>
    
    
                                </div>
            
                                <div class="form-group">
            
                                   <input type="submit" value="Update" class="btn btn-primary form-control"> 
                                        
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

    bkLib.onDomLoaded(function () {
        $(".nicEdit").each(function (index) {
            $(this).attr("id", "nicEditor" + index);
            new nicEditor({
                fullPanel: true
            }).panelInstance('nicEditor' + index, {
                hasPanel: true
            });
        });
    });

    function getCont() {
        var c = ndinstance.getContent();

        var start_ptn = /(<.[^>]+>)*/gmi; //Filter label opening	
        var end_ptn = /<\/?\w+>$/; //Filter tag ends
        var space_ptn = /(&nbsp;)*/; //Filter spaces
        var c1 = c.replace(start_ptn, "").replace(end_ptn).replace(space_ptn, "");

    }

</script>


<style>
    .card-background {
        background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(151, 10, 130, 1) 0%, rgba(33, 33, 33, 1) 100.2%);
    }


    .image-size {
        color: brown;
    }

    textarea {
        background-color: white;
    }

</style>

    
@endpush

<div id="myModal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-header bg-info text-center text-light card-background">
                <h3>Add Overview Section</h3>
            </div>
            <div class="modal-body">
            <form action="{{route('admin.overview')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <input type="hidden">

                    <div class="form-group">
                        <label for="">Title</label>
                        <input class="form-control" type="text" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Details</label>
                        <textarea id="my-textarea" class="form-control" name="details" rows="8" required></textarea>
                    </div>

                    <div class="form-group">

                        <label for="">Pick Icon For This section</label>
                        <button class="btn btn-secondary form-control" data-iconset="fontawesome4" data-arrow-prev-icon-class="fa fa-angle-left"
                        data-arrow-next-icon-class="fa fa-angle-right" data-iconset-version="4.7.0" role="iconpicker" name="icon" id="icon" data-icon=""></button>
                            
                    </div>


                    <div class="form-group">

                       <input type="submit" value="Add Overview" class="btn btn-primary form-control"> 
                            
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
                        <input class="form-control" type="text" name="title" id="title" required>
                    </div>

                    <div class="form-group">
                        <label for="my-textarea">Details</label>
                        <textarea class="form-control" name="details" rows="3" id="details" required></textarea>
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

