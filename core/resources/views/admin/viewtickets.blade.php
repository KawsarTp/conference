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

                    <div class="card-header text-center"
                        style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                        <strong class="card-title text-light">All Ticket Inforamation</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">sl.</th>
                                    <th class="avatar">Ticket Type</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Feature</th>
                                    <th>Details</th>
                                    <th>Benefits</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($tickets as $ticket)
                                <tr>
                                    <td class="serial">{{$i++}}</td>
                                    <td>{{$ticket->type}}</td>
                                    <td> <span class="name">{{$ticket->price}}</span> </td>
                                    <td> <span class="product">{{$ticket->stock}}</span> </td>
                                    <td><span class="count">{{substr($ticket->feature,0,20)}}</span></td>
                                    <td>{{substr($ticket->details,0,20)}}</td>
                                    <td>{{substr($ticket->benefits,0,20)}}</td>
                                    <td><img src="{{asset('asset/admin/images/ticket').'/'.$ticket->image}}" alt="">
                                    </td>
                                    <td>
                                    <a href="{{route('admin.edittickets',['ticket'=>$ticket->id])}}" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('admin.deleteticket',['ticket'=>$ticket->id])}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>

        </div>
    </div>
    @endsection

 