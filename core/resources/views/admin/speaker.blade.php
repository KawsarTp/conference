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
    <div class="container">
    <div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                <strong class="card-title text-light">Add Speaker</strong>
        
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                    <form action="{{route('admin.speaker')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Speaker Name</label>
                                <input id="cc-payment" name="name" type="text" class="form-control" placeholder="speaker Name">
                            </div>

                           

                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Speaker Bio</label>
                                <textarea name="details" id="" cols="5" rows="5" class="form-control" placeholder="Bio in Details" ></textarea>
                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                            </div>

                           

                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Speaker Expertise</label>
                                <input id="cc-payment" name="expertise" type="text" class="form-control" placeholder="speaker Expertise">
                            </div>

                           

                            <div class="form-group">
                                <label for="cc-number" class="control-label mb-1">Speaker Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            

                            
                         
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                                    <i class="fa fa-save fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Save Speaker</span>
                                </button>
                            
                        </form>
                        
                    </div>
                </div>

            </div>
        </div> <!-- .card -->
    </div>

</div>  <!--row-->
</div>
    
</div>