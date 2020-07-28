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
                <div class="card-header card-background text-center">
                    <strong class="card-title text-light">Booking Information</strong>
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
                            <button class="btn btn-info" data-id={{$booking->id}}><span class="ti-eye" ></span></button>
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

@push('content')


<style>
    .card-background {
        background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(151, 10, 130, 1) 0%, rgba(33, 33, 33, 1) 100.2%);
    }


    .image-size {
        color: brown;
    }

    textarea {
        background-color: white;
    }

</style>
    
@endpush