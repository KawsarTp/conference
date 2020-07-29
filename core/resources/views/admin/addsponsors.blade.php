@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">


    <!-- Header-->
    @include('admin.nav')


    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12 mt-3">

                <div class="card">
                    <div class="card-header card-background">
                        <h3 class="text-center text-light">Sponsor Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.sponsor')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Sponsor Details</label>
                                <textarea name="details" id="details" cols="10" rows="5"
                            class="form-control nicEdit">{{$sponsor->details}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="">Sponsor Benefit</label>
                                <textarea name="benefit" id="" cols="30" rows="5"
                                    class="form-control nicEdit">{{$sponsor->benefit}}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="">About Sponsorship</label>
                                <textarea name="about" id="" cols="30" rows="5" class="form-control nicEdit">{{$sponsor->about}}</textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-info form-control" value="Save" >
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

<script src="http://blast.thesoftking.com/lab/xenwallet/assets/admin/js/nicEdit.js"></script>
<script>
    bkLib.onDomLoaded(function () {
        $(".nicEdit").each(function (index) {
            $(this).attr("id", "nicEditor" + index);
            new nicEditor({fullPanel: true}).panelInstance('nicEditor' + index, {hasPanel: true});
            $("div.nicEdit-main").html('');            
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
