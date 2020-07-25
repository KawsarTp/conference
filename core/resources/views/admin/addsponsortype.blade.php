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
       
                                <h3 class="text-center">Sponsor Type</h3>
                            </div>
                            <div class="card-body">
                            <form action="{{route('admin.sponsortype')}}" method="post">
                                @csrf
                            <div class="form-group">
                                <label for="">Sponsor Type</label>
                                <input type="text" name="name" class="form-control">
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


