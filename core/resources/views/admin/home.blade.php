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
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">

            
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                    <div class="stat-text">$<span class="count">{{@$bookings}}</span></div>
                                        <div class="stat-heading">Ticket Sale Amount</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7s-cart"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$quantity}}</span></div>
                                        <div class="stat-heading">Total Ticket Bookings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-browser"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$topic}}</span></div>
                                        <div class="stat-heading">Total Topics</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$speakerCount}}</span></div>
                                        <div class="stat-heading">Total Speaker</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widgets -->




            
            <div class="clearfix"></div>
            <!-- Orders -->

            <div class="orders">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="box-title">Ticket Bookings </h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            
                                            <tr>
                                                <th class="serial">#</th>
                                                <th class="avatar">Name</th>
                                                <th>Ticket Type</th>
                                                <th>Ticket Number</th>
                                                <th>Email </th>
                                                <th>Phone</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($allBookings->count() <= 0)

                                            <tr>
                                                <td colspan="8" class="text-center text-danger">No Data Found</td>
                                            </tr>
                                                
                                            @else
                                            @php($i = 1)
                                            @foreach($allBookings as $booking)
                                            <tr>
                                            <td class="serial">{{$i++}}</td>
                                            <td>{{$booking->name}}</td>
                                            <td>{{$booking->ticket->type}}</td>
                                            <td class="text-danger">{{$booking->ticket_number}}</td>
                                            <td>{{$booking->email}}</td>
                                            <td>{{$booking->phone}}</td>
                                            <td>{{$booking->quantity}}</td>
                                            <td class="text-info">$ {{$booking->price}}</td>
                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                        {{$allBookings->links()}}
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-8 -->

                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-lg-6 col-xl-12">
                                <div class="card br-0" style="background: linear-gradient(#2193b0,#6dd5ed)">
                                    <div class="card-body ">
                                        <div class="chart-container ov-h">
                                            <div id="flotPie1" class="float-chart ">
                                                <h3 class="text-light font-weight-bold">Conference Date :</h3>
                                                <p class="mt-4 font-weight-bold text-light"> <span>Start Date :</span>    {{ Date_format(Date_create($setting->start_date),'Y m d')}} </p> 
                                                <p class="font-weight-bold text-danger"> <span>End Date :</span>  {{ Date_format(Date_create($setting->end_date),'Y m d')}} </p> 
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.card -->
                            </div>

                            <div class="col-lg-6 col-xl-12">
                                <div class="card bg-flat-color-3  ">
                                    <div class="card-body">
                                    <h4 class="card-title m-0  white-color ">Current Date : {{\Carbon\Carbon::now()->format('F d Y')}}</h4>
                                    </div>
                                     <div class="card-body">
                                         <div id="flotLine5" class="flot-line">
                                         <h4 class="card-title m-0  white-color ">Total Sponsors : {{$sponsor->count()}}</h4>
                                         </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.col-md-4 -->
                </div>
            </div>
            <!-- /.orders -->
            <!-- To Do and Live Chat -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-title text-center py-3" style="background-image: linear-gradient( 181deg,  rgba(249,97,100,1) 0.4%, rgba(250,126,129,1) 89.6% );">
                            <h4 class="text-light font-weight-bold">Event Tickets : </h4>
                        </div>
                        <div class="card-body">
                            
                            <div class="card-content">
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th class="text-secondary">Ticket Type</th>
                                               <th class="text-success">Available</th>
                                               <th class="text-danger">Sold</th>
                                           </tr>
                                       </thead>

                                       <tbody>
                                           @foreach($ticket as $data)
                                            <tr>
                                            <td>{{$data->type}}</td>
                                            <td>{{$data->stock}}</td>
                                            <td>
                                                $ {{$data->bookings->sum('price')}}
                                            </td>
                                            </tr>
                                            @endforeach
                                       </tbody>
                                   </table>
                            </div>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-title py-5 text-center text-light" style="background-image: linear-gradient( 109.1deg,  rgba(181,73,91,1) 7.1%, rgba(225,107,140,1) 86.4% );">
                            <h3 class="card-title font-weight-bold">Speakers</h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="card-content">
                                <table class="table table-light">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Expertise</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($speaker as $speakers)
                                        <tr>
                                        <td>{{$speakers->name}}</td>
                                        <td><img src="{{asset('asset/admin/images/speaker/'.$speakers->image)}}" alt="" width="50px"> </td>
                                        <td>{{$speakers->designation}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    {{$speaker->links()}}
                                </table>

                            </div>
                        </div> <!-- /.card-body -->
                    </div><!-- /.card -->
                </div>
            </div>
            <!-- /To Do and Live Chat -->
            <!-- Calender Chart Weather  -->
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="card h-100">
                        <div class="card-title bg-primary text-secondary py-3" style="background-image: linear-gradient( 95.2deg,  rgba(173,252,234,1) 26.8%, rgba(192,229,246,1) 64% );">
                            <h3 class="text-center font-weight-bold">Event Location:</h3>
                        </div>
                        <div class="card-body">
                            <!-- <h4 class="box-title">Chandler</h4> -->
                           
                                
                                    <embed class="w-100 h-100" src="https://maps.google.com/maps?q={{str_replace(" ", "+", $setting->location)}}&output=embed"/>

                              
                            
                        </div>
                    </div><!-- /.card -->
                </div>

               
            <!-- /Calender Chart Weather -->
            <!-- Modal - Calendar - Add New Event -->
            
            <!-- /#event-modal -->
            <!-- Modal - Calendar - Add Category -->

        <!-- /#add-category -->
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    <!-- Footer -->
        @include('admin.footer')
    <!-- /.site-footer -->
</div>


@endsection