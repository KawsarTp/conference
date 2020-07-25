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
    <div class="row" style="margin-top:100px;">
        <div class="col-md-12">
            <div class="card" style="width:100%">
                <div class="card-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                    <strong class="card-title text-light">Blog Details</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">sl.</th>
                                <th class="avatar">Blog Image</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($blogs as $blog)
                            <tr>
                            <td class="serial">{{$i++}}</td>
                                <td class="avatar">
                                    <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="{{asset("asset/admin/images/blog").'/'.$blog->image}}" alt=""></a>
                                    </div>
                                </td>
                                <td>{{substr($blog->title,0,30)}}</td>
                                <td>{{substr($blog->details,0,100)}}</td>
                                <td>
                                    <button class="btn btn-primary modalButton" data-image="{{$blog->image}}" data-title="{{$blog->title}}" data-details="{{$blog->details}}" data-id="{{$blog->id}}"><span class="fa fa-edit"></span></button>
                                    <button class="btn btn-danger"><span class="ti-trash"></span></button>
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

@push('blog')

    <script>
        $(".modalButton").on('click',function(){
        $("#myModal").modal('show');
        var id = $(this).data('id');
        var image = $(this).data('image');
        var title = $(this).data('title');
        var details = $(this).data('details');
       

        $(".modal-body #id").val(id);
        $(".modal-body #title").val(title);
        $(".modal-body #editor").val(details);
      
    });
    </script>

@endpush

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-title text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                <h4 class="py-3 text-light">Blog Details</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.viewallblog')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="type">Title:</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
 
                    

                     <div class="form-group">
                         <label for="type">Details:</label>
                         <textarea name="details" id="editor" cols="10" rows="10" class="form-control"></textarea>
                     </div>
                     
                     
                 
                     
                     <div class="form-group">
                        <label for="type">Image:</label>
                        <input type="file" name="image" class="form-control" id="image">
                     </div>
               
                     
                     <div class="form-group">
                         
                         <input type="submit" value="Update Blog" class="from-control btn btn-primary" >
                     </div>
 
                </form>
            </div>
        </div>
    </div>
</div>