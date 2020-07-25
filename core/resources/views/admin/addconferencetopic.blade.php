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
                <strong class="card-title text-light">Add Topics For Conference</strong>
                {{-- @include('admin.alert') --}}
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                    <form action="{{route('admin.conference')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="control-label mb-1">Topic Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Topic Name">
                            </div>

                           

                            <div class="form-group">
                                <label class="control-label mb-1">Time Slot For A Topic</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="time" name="from" class="form-control" placeholder="From ">
                                            <div class="input-group-append">
                                            <span class="input-group-text">PM</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    TO
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input type="time" name="to" class="form-control" placeholder="To">
                                            <div class="input-group-append">
                                            <span class="input-group-text">PM</span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label mb-1">Date for this Topic</label>
                                <input name="date" type="date" class="form-control" placeholder="Topic Name" min="{{$setting->start_date}}" max="{{$setting->end_date}}">
                            </div>
                            

                           

                            <div class="form-group">
                                <label class="control-label mb-1">Add Speaker</label>
                                <select name="speaker" id="" class="form-control">
                                    @foreach($speakers as $speaker)
                                            <option value="{{$speaker->id}}">{{$speaker->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Save Topic</span>
                                </button>
                            
                        </form>
                        
                    </div>
                </div>

            </div>
        </div> <!-- .card -->
        {{-- <iframe src="https://maps.google.com/maps?q={{str_replace(" ", "+", $setting->location)}}&output=embed"></iframe> --}}
    </div>
    
</div>


