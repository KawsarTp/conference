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
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                    <strong class="card-title text-light">Manage Sponsor Application</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">sl.</th>
                                <th class="avatar">Sponsor Type</th>
                                <th class="avatar">Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($applicaitons as $application)
                            <tr>
                            <td class="serial">{{$i++}}</td>
                            <td>{{$application->types->name}}</td>
                            <td>{{$application->name}}</td>
                            <td>{{$application->company}}</td>
                            <td>{{$application->Email}}</td>
                            <td>{{$application->website}}</td>
                            <td><img class="img-fluid" src="{{asset('asset/admin/images/sponsor').'/'.$application->image}}" alt=""></td>
                            <td>
                                <a href="{{route('admin.sponsorstatus',['id'=>$application->id])}}" class="btn {{$application->status ? "btn btn-outline-success":"btn-outline-danger"}}"><i class="fa {{$application->status ? "fa-check":"fa-times"}}"></i></a>
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
<div class="clearfix"></div>
@endsection


