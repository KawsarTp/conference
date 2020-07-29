@extends('frontend.master')

@section('content')

@include('frontend.header')

<!-- ============Page Header Section Starts Here================== -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h2 class="title"> buy ticket</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    buy ticket
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ============Page Header Section Ends Here================== -->

<!-- ============Become Sponsor Section Starts Here================== -->

       
            <div class="container my-5 py-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-8">
                        <div class="p-3 bg-white rounded">
                                
                            <div class="row">
                                  
                          
                                <div class="col-md-6">
                                    <h1 class="text-uppercase">Invoice</h1>
                                <div class="billed"><span class="font-weight-bold text-uppercase">Billed:</span><span class="ml-1">{{session('invoice.name')}}</span></div>
                                <div class="billed"><span class="font-weight-bold text-uppercase">Date:</span><span class="ml-1">{{date('d-m-Y')}}</span></div>
                                <div class="billed"><span class="font-weight-bold text-uppercase">Order ID:</span><span class="ml-1">{{session('invoice.ticketNumber')}}</span></div>
                                </div>
                                <div class="col-md-6 text-right mt-3">
                                <h4 class="text-danger mb-0">{{$title->name}}</h4>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Unit</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <td>{{session('invoice.ticket_id')}}</td>
                                            <td>{{session('invoice.quantity')}}</td>
                                            <td>{{session('invoice.unitPrice')}}</td>
                                            <td>{{session('invoice.price')}}</td>
                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-right mb-3">

                                <a class="btn btn-danger btn-sm mr-5" type="button" href="{{route('show',['id'=>session('invoice.id')])}}">Cancle <i class="fa fa-times"></i></a>
                                <a class="btn btn-info btn-sm mr-5" type="button" href="{{route('checkout')}}">Checkout</a>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>             
            
    
<!-- ============Become Sponsor Section Ends Here================== -->
@include('frontend.footer')

@endsection


@push('css')



@endpush