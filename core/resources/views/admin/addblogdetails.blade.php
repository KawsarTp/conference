@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">


    <!-- Header-->
        @include('admin.nav')
    <!-- /#header -->


    <!-- Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3" >
                <div class="card">
                    <div class="card-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                        <strong class="card-title text-light">Add Blog Details</strong>
                        {{-- @include('admin.alert') --}}
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                            <form action="{{route('admin.blog')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
        
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Details</label>
                                        <textarea name="details" id="" cols="30" rows="10" class="form-control nicEdit"></textarea>
                                    </div>
                                 
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <span class="image-size">NB :- Image Should be 750 X 466 px</span>
                                    </div>
                                 
                                    <div>
                                        <button type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Save</span>
                                        </button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
        
                    </div>
                </div> <!-- .card -->
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