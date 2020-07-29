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
            <div class="col-md-12 mt-3">

                <div class="card">
                    <div class="card-header card-background">
                        <h2 class="card-title text-center text-light">Add Ticket </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.tickets')}}" method="post" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-row ">

                                <div class="col">
                                    <label class="control-label mb-1">Type : </label>
                                    <input name="type" type="text" class="form-control" placeholder="Ticket Type"
                                        required value="{{old('type')}}">
                                </div>

                                <div class="col">
                                    <div class="pl-5">
                                        <label for="type">Ticket Price :</label>
                                        <input type="number" name="price" class="form-control w-100" value="0" min="0">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="pl-5">
                                        <label for="type">Ticket Stock :</label>
                                        <input type="number" name="stock" class="form-control w-100" min="0" value="0">
                                    </div>
                                </div>
                            </div>


                            <div class="form-row pt-3">

                                <div class="col">
                                    <label for="type">Ticket Features :</label>
                                    <textarea name="feature" rows="5" class="form-control nicEdit">{{old('feature')}}</textarea>
                                </div>

                                <div class="col">
                                    <div class="">
                                        <label for="type">Ticket details :</label>
                                        <textarea name="details" rows="5" class="form-control nicEdit">{{old('details')}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group pt-3">
                                <label for="type">Ticket benefits :</label>
                                <textarea rows="5" class="form-control nicEdit" name="benefits">{{old('benefits')}}</textarea>
                            </div>



                          <div class="form-group">
                                <label for="type">Ticket Image</label>
                                <input type="file" name="image" class="form-control" required>
                                <span class="image-size">Image size should be 193 X 175 px</span>
                            </div>



                            <div class="form-group">

                                <input type="submit" class="btn btn-info" value="Add Ticket" onclick="getCont()">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="clearfix"></div>
@push('content')

<script src="{{asset('asset/admin/js/nicEdit.js')}}"></script>
<script>
    bkLib.onDomLoaded(function() {
        $(".nicEdit").each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
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
