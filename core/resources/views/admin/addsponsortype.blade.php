@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">


    <!-- Header-->
    @include('admin.nav')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header text-center"
                        style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                        <strong class="card-title text-light">Sponsor Type</strong>
                        <button class="float-right btn btn-outline-primary add">ADD <i class="fa fa-plus"></i></button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">sl.</th>
                                    <th class="avatar">Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($sponsorType as $type)
                                <tr>
                                    <td class="serial">{{$i++}}</td>
                                    <td>{{$type->name,0,30}}</td>

                                    <td>
                                        <button class="btn btn-outline-primary type" data-name="{{$type->name}}"
                                            data-id="{{$type->id}}"><span class="fa fa-edit"></span></button>
                                        <a href="{{route('admin.sponsor-type-delete',['id'=>$type->id])}}"
                                            class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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

    @push('content')
    <script>
        $(".type").on('click', function () {
            $("#typeModal").modal('show');
            var id = $(this).data('id');
            var name = $(this).data('name');
            $(".modal-body #id").val(id);
            $(".modal-body #name").val(name);
        });

        $(".add").on('click', function () {
             $("#addModal").modal('show');
        });

    </script>
    @endpush

    <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-title text-center"
            style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
            <h4 class="py-3 text-light">Add Sponsor Type</h4>
        </div>
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{route('admin.sponsortype')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Sponsor Type</label>
                            <input type="text" name="name" class="form-control">
                        </div>



                        <div class="form-group">
                            <input type="submit" class="btn btn-primary form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="typeModal" class="modal fade">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-title text-center"
                style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                <h4 class="py-3 text-light">Sponsor Type</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.managersponsordata')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">

                        <input type="submit" value="Update Sponsor Type" class="from-control btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
