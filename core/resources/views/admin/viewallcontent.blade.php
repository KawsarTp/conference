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
                <strong class="card-title">View All Site Data</strong>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">sl.</th>
                            <th class="avatar">Avatar</th>
                            <th>title</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="serial">1.</td>
                            <td class="avatar">
                                <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                </div>
                            </td>
                            <td> #5469 </td>
                            <td>  <span class="name">Louis Stanley</span> </td>
                            <td> <span class="product">iMax</span> </td>
                            <td><span class="count">231</span></td>
                            <td>
                                <span class="badge badge-complete">Complete</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="serial">2.</td>
                            <td class="avatar">
                                <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="images/avatar/2.jpg" alt=""></a>
                                </div>
                            </td>
                            <td> #5468 </td>
                            <td>  <span class="name">Gregory Dixon</span> </td>
                            <td> <span class="product">iPad</span> </td>
                            <td><span class="count">250</span></td>
                            <td>
                                <span class="badge badge-complete">Complete</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="serial">3.</td>
                            <td class="avatar">
                                <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg" alt=""></a>
                                </div>
                            </td>
                            <td> #5467 </td>
                            <td>  <span class="name">Catherine Dixon</span> </td>
                            <td> <span class="product">SSD</span> </td>
                            <td><span class="count">250</span></td>
                            <td>
                                <span class="badge badge-complete">Complete</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="serial">4.</td>
                            <td class="avatar">
                                <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="images/avatar/4.jpg" alt=""></a>
                                </div>
                            </td>
                            <td> #5466 </td>
                            <td>  <span class="name">Mary Silva</span> </td>
                            <td> <span class="product">Magic Mouse</span> </td>
                            <td><span class="count">250</span></td>
                            <td>
                                <span class="badge badge-pending">Pending</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>
@endsection