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
                        <form action="{{route('admin.tickets')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="form-row ">

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
                                    <textarea name="feature" rows="5" class="form-control nicEdits" required>{{old('feature')}}</textarea>
                                </div>

                                <div class="col">
                                    <div class="">
                                        <label for="type">Ticket details :</label>
                                        <textarea name="details" rows="5" class="form-control nicEdits" required>{{old('details')}}</textarea>
                                    </div>
                                </div>

                            </div> --}}

                            <div class="form-group pt-3">
                                <label for="type">Ticket benefits :</label>
                                <textarea rows="5" class="form-control nicEdit" name="benifits" required></textarea>
                            </div>



                            {{-- <div class="form-group">
                                <label for="type">Ticket Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>  --}}



                            <div class="form-group">

                                <button type="submit">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@push('content')


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
