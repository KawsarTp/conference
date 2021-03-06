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
                    <div class="card-header text-center text-light"
                        style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                        <strong class="card-title">Speaker's</strong>

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
                                            <img class="rounded-circle"
                                                src="{{asset("asset/admin/images/speaker").'/'.$speaker->image}}"
                                                alt="">
                                        </div>
                                    </td>
                                    <td> <span class="name">{{$speaker->name}}</span> </td>
                                <td>{{Str::limit($speaker->details, 100, '...')}}</td>
                                    <td><span class="count">{{$speaker->designation}}</span></td>
                                    <td>
                                        <button class="btn btn-outline-warning" data-target="#mymodal-{{$speaker->id}}"
                                            data-toggle="modal"><i class="fa fa-edit"></i></button>
                                        <a class="btn btn-outline-danger" href="{{route('admin.speakerdelete',['id'=>$speaker->id])}}"><i
                                                class="fa fa-trash"></i></a>
                                        
                                    </td>
                                </tr>
                                <div id="mymodal-{{$speaker->id}}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <p class="text-center text-light text-uppercase font-weight-bold">
                                                    Speaker Details</p>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.speakerlist')}}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$speaker->id}}">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Speaker
                                                            Name</label>
                                                        <input id="cc-payment" name="name" type="text"
                                                            class="form-control" placeholder="speaker Name"
                                                            value="{{$speaker->name}}">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Speaker
                                                            Bio</label>
                                                        <textarea name="details" id="" cols="5" rows="5"
                                                            class="form-control"
                                                            placeholder="Bio in Details">{{$speaker->details}}</textarea>
                                                        <span class="help-block" data-valmsg-for="cc-number"
                                                            data-valmsg-replace="true"></span>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Speaker
                                                            Expertise</label>
                                                        <input id="cc-payment" name="expertise" type="text"
                                                            class="form-control" placeholder="speaker Name"
                                                            value="{{$speaker->designation}}">
                                                    </div>



                                                    <div class="form-group">
                                                        <div class="d-flex">
                                                            <div class="round-img">
                                                                Current Image: <img class="rounded-circle"
                                                                    src="{{asset('asset/admin/images/speaker').'/'.$speaker->image}}"
                                                                    alt="" width="50">
                                                            </div>
                                                            <div class="ml-5">
                                                                <label for="cc-number" class="control-label mb-1">Update
                                                                    Image:</label>
                                                                <input type="file" name="image" class="form-control">
                                                            </div>

                                                        </div>
                                                    </div>




                                                    <button id="payment-button" type="submit"
                                                        class="btn btn-lg btn-info btn-block">
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
                        {{$allSpeaker->links()}}
                    </div> <!-- /.table-stats -->
                </div>
            </div>

        </div>
    </div>
</div>
<div class="clearfix"></div>
@endsection
