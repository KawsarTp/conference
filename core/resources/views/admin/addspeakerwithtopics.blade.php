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
                <strong class="card-title text-light">Add Topics To Speaker</strong>
                @include('admin.alert')
            </div>
            <div class="card-body">
                <!-- Credit Card -->
                <div id="pay-invoice">
                    <div class="card-body">
                    <form action="{{route('admin.topicsaddtospeaker')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label class="control-label mb-1">Topic Name</label>
                                <select name="topic" id="" class="form-control">
                                    @foreach($topics as $topic)
                                        <option value="{{$topic->id}}">{{$topic->name}}</option>
                                    @endforeach
                                </select>
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
                                <input name="date" type="date" class="form-control" placeholder="Topic Name">
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
    </div>
    
</div>