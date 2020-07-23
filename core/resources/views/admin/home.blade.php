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




            <!--  Traffic  -->
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Traffic </h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <!-- <canvas id="TrafficChart"></canvas>   -->
                                    <div id="traffic-chart" class="traffic-chart"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <div class="progress-box progress-1">
                                        <h4 class="por-title">Visits</h4>
                                        <div class="por-txt">96,930 Users (40%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-2">
                                        <h4 class="por-title">Bounce Rate</h4>
                                        <div class="por-txt">3,220 Users (24%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-2">
                                        <h4 class="por-title">Unique Visitors</h4>
                                        <div class="por-txt">29,658 Users (60%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-box progress-2">
                                        <h4 class="por-title">Targeted  Visitors</h4>
                                        <div class="por-txt">99,658 Users (90%)</div>
                                        <div class="progress mb-2" style="height: 5px;">
                                            <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div> <!-- /.card-body -->
                            </div>
                        </div> <!-- /.row -->
                        <div class="card-body"></div>
                    </div>
                </div><!-- /# column -->
            </div> --}}
            <!--  /Traffic -->
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
                                            <td class="text-info">{{$booking->price}}</td>
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
                                                <p class="mt-4 font-weight-bold text-light"> <span>Start Date :</span>    {{ \Carbon\Carbon::createFromFormat('Y-m-d',$setting->start_date)->format('F d Y') }} </p> 
                                                <p class="font-weight-bold text-light"> <span>End Date :</span>  {{\Carbon\Carbon::createFromFormat('Y-m-d',$setting->end_date)->format('F d Y')}} </p> 
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
                                               <th class="text-secondary">Total Tickets</th>
                                               <th class="text-success">Available</th>
                                               <th class="text-danger">Sold</th>
                                           </tr>
                                       </thead>

                                       <tbody>
                                           {{-- @foreach($ticket as $ticket)
                                            <tr>
                                            <td>{{$ticket->type}}</td>
                                            <td>{{$ticket->stock}}</td>
                                            <td></td>
                                            </tr>
                                            @endforeach --}}
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

                <div class="col-lg-4 col-md-6">
                    <div class="card ov-h">
                        <div class="card-body bg-flat-color-2">
                            <div id="flotBarChart" class="float-chart ml-4 mr-4"></div>
                        </div>
                        <div id="cellPaiChart" class="float-chart"></div>
                    </div><!-- /.card -->
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card weather-box">
                        <h4 class="weather-title box-title">Weather</h4>
                        <div class="card-body">
                            <div class="weather-widget">
                                <div id="weather-one" class="weather-one"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
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