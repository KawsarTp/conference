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
            <div class="card" >
                <div class="card-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                    <strong class="card-title text-light">All Information </strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="serial">sl.</th>
                                <th class="avatar">Details</th>
                                <th>Benefit</th>
                                <th>About</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach($requirements as $requirement)
                            <tr>
                                <td class="serial">{{$i++}}</td>
                                <td>{{substr($requirement->details,0,30)}}</td>
                                <td>{{substr($requirement->benefit,0,50)}}</td>
                                <td>{{substr($requirement->about,0,50)}}</td>
                                <td>
                                <button class="btn btn-outline-primary modalButton" data-details="{{$requirement->details}}" data-benefit="{{$requirement->benefit}}" data-id="{{$requirement->id}}" data-about="{{$requirement->about}}"><span class="fa fa-edit"></span></button>
                                <a href="{{route('admin.sponsor-details-delete',['id'=>$requirement->id])}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
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

@push('blog')

    <script>
        $(".modalButton").on('click',function(){
        $("#myModal").modal('show');
        var id = $(this).data('id');
        var details = $(this).data('details');
        var benefit = $(this).data('benefit');
        var about = $(this).data('about');
       
       

        $(".modal-body #id").val(id);
        $(".modal-body #details").val(details);
        $(".modal-body #benefit").val(benefit);
        $(".modal-body #about").val(about);
      
    });

   
    </script>

@endpush



<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-title text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
                <h4 class="py-3 text-light">Sponsor Requirements Details</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.managersponsordata')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                         <label for="type">Details:</label>
                         <textarea name="details" id="details" cols="10" rows="10" class="form-control"></textarea>
                     </div>
                       

                     <div class="form-group">
                         <label for="type">benefit:</label>
                         <textarea name="benefit" id="benefit" cols="10" rows="10" class="form-control"></textarea>
                     </div>
                     
                     
                 
                     
                 <div class="form-group">
                    <label for="type">about:</label>
                    <textarea name="about" id="about" cols="10" rows="10" class="form-control"></textarea>
                </div>
                
                     
                     <div class="form-group">
                         
                         <input type="submit" value="Update Sponsor Data" class="from-control btn btn-primary" >
                     </div>
 
                </form>
            </div>
        </div>
    </div>
</div>






