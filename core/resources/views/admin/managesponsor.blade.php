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
                            <button class="btn btn-info modalButton" data-id={{$application->id}}><span class="ti-eye" ></span></button>
                        </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>
@endsection


@push('bookings')
    
  <script>
      
      $(".modalButton").on('click',function(){
       
       $("#myModal").modal('show');

       var id = $(this).data('id');
       

       $(".modal-body #id").val(id);
      
   });

  </script>
@endpush

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
            <form action="{{route('admin.managersponsor')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="type">Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
 
                    
                     
                     <div class="form-group">
                         <input type="submit" value="Update Image" class="from-control btn btn-primary" >
                     </div>
 
                </form>
            </div>
        </div>
    </div>
</div>
