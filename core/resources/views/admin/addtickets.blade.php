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

    <div class="col-md-6 mx-auto" style="margin-top:100px">
        @include('admin.alert')
       <div class="card">
           <div class="card-body">
               <h2 class="card-title text-center">Ticket Information</h2>
           <form action="{{route('admin.tickets')}}" method="POST">
                   @csrf
                   <div class="form-group">
                       <label for="type">Ticket Type :</label>
                       <input type="text" name="type" class="form-control">
                   </div>

                   @if($errors->has('type'))
                        <p class="alert alert-danger">{{$errors->first('type')}}</p>
                    @endif

                   <div class="form-inline my-3">
                        
                            <div class="form-group">
                                <label for="type">Ticket Price :</label>
                                <input type="number" name="price" class="form-control w-100" value="0">
                            </div>
                    
                            <div class="form-group ml-auto">
                                <label for="type">Ticket Stock :</label>
                                <input type="number" name="stock" class="form-control w-100" min="0" value="0">
                            </div>
                        @if($errors->has('price'))
                            <p class="alert alert-danger">{{$errors->first('price')}}</p>
                        @endif
                        @if($errors->has('stock'))
                            <p class="alert alert-danger ml-auto">{{$errors->first('stock')}}</p>
                        @endif
                   </div>
                    

                    <div class="form-group">
                        <label for="type">Ticket Features :</label>
                        <textarea name="feature" id="" cols="10" rows="5" class="form-control"></textarea>
                    </div>
                    @if($errors->has('feature'))
                    <p class="alert alert-danger">{{$errors->first('feature')}}</p>
                @endif

                    <div class="form-group">
                        <label for="type">Ticket details :</label>
                        <textarea name="details" id="" cols="10" rows="5" class="form-control"></textarea>
                    </div>
                    @if($errors->has('details'))
                    <p class="alert alert-danger">{{$errors->first('details')}}</p>
                @endif
                    <div class="form-group">
                        <label for="type">Ticket benefits :</label>
                        <textarea name="benefits" id="" cols="10" rows="5" class="form-control"></textarea>
                    </div>
                    @if($errors->has('benefits'))
                    <p class="alert alert-danger">{{$errors->first('benefits')}}</p>
                    @endif
                    <div class="form-group">
                        
                        <input type="submit" value="Add Ticket" class="from-control btn btn-primary">
                    </div>

               </form>
           </div>
       </div>
    </div>
    
</div>


@push('js')
    <script>
        $('#benefit').each(function(e){
            
            alert($(this).val());
        });

    </script>
@endpush
