@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">


    <!-- Header-->
        @include('admin.nav')


        <div class="container">

            <div class="row">

                <div class="col-md-8">

                        <div class="card">
                            <div class="card-header">
                                @include('admin.alert')
                                <h3 class="text-center">Sponsor Details</h3>
                            </div>
                            <div class="card-body">
                            <form action="{{route('admin.sponsor')}}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="">Sponsor Details</label>
                                <textarea name="details" id="" cols="10" rows="5" class="form-control"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="">Sponsor Benefit</label>
                                <textarea name="benefit" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="">About Sponsorship</label>
                                <textarea name="about" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control">
                            </div>
                                </form>
                            </div>
                        </div>


                </div>

            </div>

        </div>

</div>


