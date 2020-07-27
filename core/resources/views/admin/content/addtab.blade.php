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
                    <div class="card-header card-background">
                        <h3 class="text-center text-light">tab Content</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{route('admin.updatesection')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden" name="key" id="id" value="tab">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{@$content['tab']['title']}}" required>

                            </div>

                            <div class="form-row">

                                <div class="col">
                                    <label for="">Image: </label>
                                    <input type="file" name="image" class="form-control d-block" >
                                    <span class="image-size">N.B-Image Size will be 806 X 706 px</span>
                                </div>

                                <div class="col py-3">
                                    <div class="pl-5">
                                        <label for="" class="align-top">Current Image : </label>
                                        <img src="{{asset('asset/admin/images/tab/'. @$content['tab']['image'])}}"
                                            alt="tab" class="img-fluid w-25 img-thumbnail ">
                                    </div>

                                </div>


                            </div>


                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-info" value="Update" onclick="getCont()">
                            </div>


                        </form>

                    </div>



                </div>
            </div>
        </div>
    </div>


    {{-- button --}}
    <div class="container-fluid">
        <div class="row justify-content-center mt-3">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header"
                        style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                        <h3 class="text-center text-light">Tab Section Button

                            <button class="btn btn-outline-info float-right tabbutton">ADD <i
                                    class="fa fa-plus"></i></button>

                        </h3>

                    </div>

                    <div class="card-body">

                        <table class="table text-center">
                            <thead>
                                <tr>

                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tabs as $tab )
                                <tr>

                                    <td>{{substr($tab->title,0,100)}}</td>
                                    <td>{{substr($tab->details,0,100)}}</td>

                                    <td>
                                        <button class="btn btn-outline-primary edittab" data-id="{{$tab->id}}"
                                            data-title="{{$tab->title}}" data-description="{{$tab->details}}"><i
                                                class="fa fa-edit"></i></button>
                                        <a href="{{route('admin.deletetabbutton',['id'=>$tab->id])}}"
                                            class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>


                                @endforeach
                            </tbody>
                        </table>


                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('content')

<script type="text/javascript">
    $('.tabbutton').click(function () {
        $("#tabButtonModal").modal('show');
    });

    $('.edittab').click(function () {
        $("#edittabModal").modal('show');
        var id = $(this).data('id');
        var title = $(this).data('title');
        var description = $(this).data('description');

        $(".modal-body #id").val(id);
        $(".modal-body #title").val(title);
        $(".modal-body #description").val(description);
    });

</script>

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



{{-- BUtton --}}

<div id="tabButtonModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center"
                style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                <h3 class="modal-title text-light">Add Tab Button</h3>

            </div>
            <div class="modal-body">

                <form action="{{route('admin.addtabbutton')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>tab Button Title</label>
                        <input type="text" name="title" class="form-control" required>

                    </div>



                    <div class="form-group">
                        <label>tab Button Description</label>
                        <textarea name="description" class="form-control" rows="5" required></textarea>

                    </div>


                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-info" value="Save">
                    </div>


                </form>

            </div>

        </div>
    </div>
</div>


<div id="edittabModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center"
                style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                <h3 class="modal-title text-light">Update Tab Button</h3>

            </div>
            <div class="modal-body">

                <form action="{{route('admin.updatetabbutton')}}" method="post">
                    @csrf

                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Tab Button Title</label>
                        <input type="text" name="title" class="form-control" id="title" required>

                    </div>



                    <div class="form-group">
                        <label>Tab Button description</label>
                        <textarea name="description" class="form-control" rows="5" id="description" required></textarea>

                    </div>


                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-info" value="Update">
                    </div>


                </form>

            </div>

        </div>
    </div>
</div>
