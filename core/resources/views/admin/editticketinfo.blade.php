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
                        <h2 class="card-title text-center text-light">Edit Ticket </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.edittickets',['ticket'=>$ticket->id])}}" method="post" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-row ">
                            
                                <div class="col">
                                    <label class="control-label mb-1">Type : </label>
                                    <input name="type" type="text" class="form-control" placeholder="Ticket Type"
                                required value="{{$ticket->type}}">
                                </div>

                                <div class="col">
                                    <div class="pl-5">
                                        <label for="type">Ticket Price :</label>
                                    <input type="number" name="price" class="form-control w-100" value="{{$ticket->price}}" min="0">
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="pl-5">
                                        <label for="type">Ticket Stock :</label>
                                        <input type="number" name="stock" class="form-control w-100" min="0" value="{{$ticket->stock}}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-row pt-3">

                                <div class="col">
                                    <label for="type">Ticket Features :</label>
                                    <textarea name="feature" rows="5" class="form-control nicEdit" >{{$ticket->feature}}</textarea>
                                </div>

                                <div class="col">
                                    <div class="">
                                        <label for="type">Ticket details :</label>
                                        <textarea name="details" rows="5" class="form-control nicEdit" >{{$ticket->details}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group pt-3">
                                <label for="type">Ticket benefits :</label>
                                <textarea rows="5" class="form-control nicEdit" name="benefits" >{{$ticket->benefits}}</textarea>
                            </div>

                            <div class="form-row">

                                <div class="col">
                                    <label for="">Image: </label>
                                    <input type="file" name="image" class="form-control d-block">
                                    <span class="image-size">N.B-Image Size will be 193 X 175 px</span>
                                </div>

                                <div class="col py-3">
                                    <div class="pl-5">
                                        <label for="" class="align-top">Current Image : </label>
                                        <img src="{{asset('asset/admin/images/ticket/'.$ticket->image)}}"
                                            alt="Banner" class="img-fluid w-25 img-thumbnail ">
                                    </div>

                                </div>


                            </div>

                         



                            <div class="form-group">

                                <input type="submit" value="update Ticket" class="form-control btn btn-info">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="clearfix"></div>
@endsection
@push('content')

<script src="{{asset('asset/admin/js/nicEdit.js')}}"></script>
<script>
    bkLib.onDomLoaded(function() {
        $(".nicEdit").each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
    });
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
