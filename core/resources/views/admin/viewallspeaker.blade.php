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
                <strong class="card-title">Speaker List</strong>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th class="serial">sl.</th>
                            <th class="avatar">Speaker Image</th>
                            <th>Speaker Name</th>
                            <th>Speaker Details</th>
                            <th>Speaker Expertise</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i =1)
                        @foreach($allSpeaker as $speaker)
                        <tr>
                        <td class="serial">{{$i++}}</td>
                            <td class="avatar">
                                <div class="round-img">
                                <img class="rounded-circle" src="{{asset("$speaker->image")}}" alt="">
                                </div>
                            </td>
                        <td>  <span class="name">{{$speaker->name}}</span> </td>
                        <td> <span class="product">
                            
                            @if (strlen($speaker->details) >= 50) 
                                {{substr($speaker->details, 0, 25). " ... " . substr($speaker->details, -20)}}
                            @endif
                            
                        
                        </span> </td>
                        <td><span class="count">{{$speaker->designation}}</span></td>
                        <td><span class="count">{{$speaker->status ? 'Active' : 'Inactive'}}</span></td>
                        <td>
                            <button class="btn btn-warning fa fa-edit" data-target="#mymodal-{{$speaker->id}}" data-toggle="modal">Edit</button>
                            <button class="btn {{$speaker->status ? 'btn-success':'btn-danger'}} fa fa-eye">{{$speaker->status ? 'Active' :'Inactive'}}</button>
                        </td>
                        </tr>

                    <div id="mymodal-{{$speaker->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-info">
                                            <p class="text-center text-light text-uppercase font-weight-bold">Speaker Details</p>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="cc-payment" class="control-label mb-1">Speaker Name</label>
                                                <input id="cc-payment" name="name" type="text" class="form-control" placeholder="speaker Name" value="{{$speaker->name}}">
                                                </div>
                    
                                                @if($errors->has('name'))
                                                    <p class="alert alert-danger">{{$errors->first('name')}}</p>
                                                @endif
                    
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Speaker Bio</label>
                                                <textarea name="details" id="" cols="5" rows="5" class="form-control" placeholder="Bio in Details">{{$speaker->details}}</textarea>
                                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                                </div>
                    
                                                @if($errors->has('details'))
                                                    <p class="alert alert-danger">{{$errors->first('details')}}</p>
                                                @endif
                    
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Speaker Expertise</label>
                                                <input id="cc-payment" name="expertise" type="text" class="form-control" placeholder="speaker Name" value="{{$speaker->designation}}">
                                                </div>
                    
                                                @if($errors->has('expertise'))
                                                    <p class="alert alert-danger">{{$errors->first('expertise')}}</p>
                                                @endif
                                                
                                                <div class="form-group">
                                                <div class="d-flex">
                                                        <div class="round-img">
                                                            Current Image: <img class="rounded-circle" src="{{asset("$speaker->image")}}" alt="" width="50">
                                                        </div>
                                                        <div class="ml-5">
                                                            <label for="cc-number" class="control-label mb-1">Update Image:</label>
                                                            <input type="file" name="image" class="form-control">
                                                        </div>
                                                        
                                                </div>    
                                                </div>
                                                
                    
                                                @if($errors->has('image'))
                                                    <p class="alert alert-danger">{{$errors->first('image')}}</p>
                                                @endif
                    
                                             
                                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="payment-button-amount">Update Speaker</span>
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