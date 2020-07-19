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
            <div class="card-header">
                <strong class="card-title">Custom Table</strong>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">sl.</th>
                            <th class="avatar">Name</th>
                            <th>Ticket Type</th>
                            <th>Email</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Ticket Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach($bookings as $booking)
                        <tr>
                        <td class="serial">{{$i++}}</td>
                        <td>{{$booking->name}}</td>
                        <td>  <span class="name">{{$booking->ticket->type}}</span></td>
                        <td> <span class="product">{{$booking->email}}</span> </td>
                        <td><span class="count">{{$booking->quantity}}</span></td>
                        <td>{{$booking->price}}</td>
                        <td>{{$booking->ticket_number}}</td>
                        <td>
                        <button class="btn btn-info"><span class="ti-eye"></span></button>
                        </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>
@endsection