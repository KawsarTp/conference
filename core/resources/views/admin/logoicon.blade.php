@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">

{{-- @dd(gd_info()) --}}
    <!-- Header-->
        @include('admin.nav')
    <!-- /#header -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header card-background text-center">
                        <h3 class="text-light">Generel Settings</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.logo-icon')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col">
                                    
                                        <div class="form-group">
                                            <label for="">Logo</label>
                                        <img src="{{asset('asset/admin/images'.'/'.@$setting->logo)}}" alt="Logo">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="file" name="icon" class="form-control">
                                        </div>
                                   
                                </div>
                                <div class="col">
                                   
                                        <div class="form-group">
                                            <label for="">Icon</label>
                                            <img src="{{asset('asset/admin/images'.'/'.@$setting->logo)}}" alt="Icon">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Application Name</label>
                                <input type="text" name="name" class="form-control" value="">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Event Starting Date</label>
                                        <input type="text" name="event" class="form-control" value="" id="datepicker">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Total Days of Event</label>
                                        <input type="number" name="days" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Location</label>
                                        <input type="text" name="location" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Ticket buy Limit:</label>
                                        <input type="number" name="limit" class="form-control" value="">
                                    </div>
                                </div>
                            </div>                  
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary form-control" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>




    <div class="clearfix"></div>
    <!-- Footer -->
       
</div>


@endsection

@push('content')
<script>
    $( function() {
      $( "#datepicker" ).datepicker({minDate:+1});
    } );
    </script>
    <style>

        .card-background{
            background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );
        }

    </style>
@endpush
