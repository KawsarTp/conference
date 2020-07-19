@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
        @include('admin.nav')
    <!-- /#header -->
<div class="container">
    <div class="row justify-content-center" style="margin-top:100px;">
        <div class="card">
            <div class="card-header text-center">
                <strong class="card-title">Topic List</strong>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="serial">sl.</th>
                            <th class="avatar">Topic Name</th>
                            <th>Time Slot</th>
                            <th>Date</th>
                            <th>Speaker</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i =1)
                        @foreach($topics as $topic)
                        <tr>
                        <td class="serial">{{$i++}}</td>
                        <td>  <span class="name">{{$topic->name}}</span> </td>
                        <td><span class="count">{{$topic->time_slot}}</span></td>
                        <td><span class="count">{{$topic->date}}</span></td>
                        <td>{{$topic->speaker->name}}</td>
                        <td>
                            <button class="btn btn-warning fa fa-edit" data-target="#mymodal-{{$topic->id}}" data-toggle="modal">Edit</button>
                        </td>
                        </tr>

                    <div id="mymodal-{{$topic->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <p class="text-center text-light text-uppercase font-weight-bold">Topic Details</p>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Topic Name</label>
                                                <input id="cc-payment" name="name" type="text" class="form-control" placeholder="speaker Name" value="{{$topic->name}}">
                                                </div>
                    
                                                @if($errors->has('name'))
                                                    <p class="alert alert-danger">{{$errors->first('name')}}</p>
                                                @endif
                    
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Topic Slot</label>
                                                <textarea name="details" id="" cols="5" rows="5" class="form-control" placeholder="Bio in Details">{{$topic->time_slot}}</textarea>
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                    
                                                @if($errors->has('details'))
                                                    <p class="alert alert-danger">{{$errors->first('details')}}</p>
                                                @endif
                    
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Topic Date</label>
                                                <input id="cc-payment" name="expertise" type="text" class="form-control" placeholder="speaker Name" value="{{$topic->date}}">
                                                </div>
                    
                                                @if($errors->has('expertise'))
                                                    <p class="alert alert-danger">{{$errors->first('expertise')}}</p>
                                                @endif
                                                

                                                
                    
                                                @if($errors->has('image'))
                                                    <p class="alert alert-danger">{{$errors->first('image')}}</p>
                                                @endif
                    
                                             
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Topic Update</span>
                                                    </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>
@endsection 