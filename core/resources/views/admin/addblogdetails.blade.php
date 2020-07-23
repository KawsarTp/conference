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

    <div class="col-md-8 mx-auto" style="margin-top: 100px;">
        <div class="card">
            <div class="card-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                <strong class="card-title text-light">Add Blog</strong>
                {{-- @include('admin.alert') --}}
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                    <form action="{{route('admin.blog')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Blog Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Blog Details</label>
                                <textarea name="details" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                         
                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Blog Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                         
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
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