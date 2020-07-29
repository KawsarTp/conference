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
    {{-- @include('admin.alert') --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header text-center card-background">
                        <strong class="card-title text-light">Add Speaker</strong>

                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <form action="{{route('admin.speaker')}}" method="post" novalidate="novalidate"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">

                                        <div class="col">
                                            <label class="control-label mb-1">Name</label>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="speaker Name" required value="{{old('name')}}">
                                        </div>

                                        <div class="col">
                                            <div class="pl-5">
                                                <label class="control-label mb-1">Expertise</label>
                                                <input name="expertise" type="text" class="form-control"
                                                    placeholder="speaker Expertise" required
                                                    value="{{old('expertise')}}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row py-4">

                                        <div class="col">
                                            <label for="cc-number" class="control-label mb-1">Bio</label>
                                            <textarea name="details" id="" cols="5" rows="6"
                                                class="form-control nicEdit" placeholder="Bio in Details"
                                                required>{{old('details')}}</textarea>
                                            <span class="help-block" data-valmsg-for="cc-number"
                                                data-valmsg-replace="true"></span>
                                        </div>

                                        <div class="col">
                                            <div class="pl-5">
                                                <label for="cc-number" class="control-label mb-1">Image</label>
                                                <input type="file" name="image" class="form-control" required>
                                                <span class="image-size">NB : Image Size should be 460 X 530 px</span>
                                            </div>
                                        </div>
                                    </div>

                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block card-background">
                                        <i class="fa fa-save fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Save Speaker</span>
                                    </button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->
            </div>

        </div>
        <!--row-->
    </div>

</div>
<div class="clearfix"></div>
@endsection


@push('content')

<script src="http://blast.thesoftking.com/lab/xenwallet/assets/admin/js/nicEdit.js"></script>
<script>
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