@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
        @include('admin.nav')
    <!-- /#header -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header text-center card-background" >
                    <strong class="card-title text-light">Topic List</strong>
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
                                <button class="btn btn-outline-warning" data-target="#mymodal-{{$topic->id}}" data-toggle="modal"> <i class="fa fa-edit text-warning"></i></button>
                            <a class="btn btn-outline-danger" href="{{route('admin.topic-delete',['id'=>$topic->id])}}"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                            </tr>
    
                        <div id="mymodal-{{$topic->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <p class="text-center text-light text-uppercase font-weight-bold">Topic Details</p>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{route('admin.showallconference')}}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Topic Name</label>
                                                    <input id="cc-payment" name="name" type="text" class="form-control" placeholder="topic Name" value="{{$topic->name}}" required>
                                                    </div>
                        
                                                  
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Topic Slot</label>
                                                        <input type="text">
                                                    </div>
                        
                                                  
                        
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Topic Date</label>
                                                        <input id="cc-payment" name="expertise" type="text" class="form-control" placeholder="speaker Name" value="{{$topic->date}}">
                                                    </div>
                        
                                                   
    
                                                    
                        
                                                   
                        
                                                 
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
</div>
<div class="clearfix"></div>
@endsection 

@push('content')

<style>
	.card-background{
		background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );
	}
	

	.image-size{
		color: brown;
	}

	textarea {
      background-color: white;
  }

	
</style>

@endpush