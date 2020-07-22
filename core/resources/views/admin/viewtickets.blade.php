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
                <strong class="card-title">All Ticket Inforamation</strong>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">sl.</th>
                            <th class="avatar">Ticket Type</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Feature</th>
                            <th>Details</th>
                            <th>Benefits</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach($tickets as $ticket)
                        <tr>
                        <td class="serial">{{$i++}}</td>
                        <td>{{$ticket->type}}</td>
                        <td>  <span class="name">{{$ticket->price}}</span> </td>
                        <td> <span class="product">{{$ticket->stock}}</span> </td>
                        <td><span class="count">{{substr($ticket->feature,0,20)}}</span></td>
                        <td>{{substr($ticket->details,0,20)}}</td>
                        <td>{{substr($ticket->benefits,0,20)}}</td>
                        <td><img src="{{asset('asset/admin/images/ticket').'/'.$ticket->image}}" alt=""></td>
                        <td>
                        <button class="btn btn-primary modalButton" data-type="{{$ticket->type}}" data-price="{{$ticket->price}}" data-stock="{{$ticket->stock}}" data-feature="{{$ticket->feature}}" data-details="{{$ticket->details}}" data-benefits="{{$ticket->benefits}}" data-id="{{$ticket->id}}"><span class="fa fa-edit"></span></button>
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
@endsection

@push('js')
    
  <script>

    $(".modalButton").on('click',function(){
        $("#myModal").modal('show');
        var id = $(this).data('id');
        var type = $(this).data('type');
        var price = $(this).data('price');
        var stock = $(this).data('stock');
        var feature = $(this).data('feature');
        var details = $(this).data('details');
        var benefits = $(this).data('benefits');

        $(".modal-body #id").val(id);
        $(".modal-body #type").val(type);
        $(".modal-body #price").val(price);
        $(".modal-body #stock").val(stock);
        $(".modal-body #feature").val(feature);
        $(".modal-body #details").val(details);
        $(".modal-body #benefits").val(benefits);
    });
    

  </script>
@endpush

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <form action="{{route('admin.viewtickets')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="type">Ticket Type :</label>
                        <input type="text" name="type" class="form-control" id="type">
                    </div>
 
                    @if($errors->has('type'))
                         <p class="alert alert-danger">{{$errors->first('type')}}</p>
                     @endif
 
                    
                         
                             <div class="form-group">
                                 <label for="type">Ticket Price :</label>
                                 <input type="number" name="price" class="form-control w-50" value="0" id="price">
                             </div>
                     
                             <div class="form-group ml-auto">
                                 <label for="type">Ticket Stock :</label>
                                 <input type="number" name="stock" class="form-control w-50" min="0" value="0" id="stock">
                             </div>
                         @if($errors->has('price'))
                             <p class="alert alert-danger">{{$errors->first('price')}}</p>
                         @endif
                         @if($errors->has('stock'))
                             <p class="alert alert-danger ml-auto">{{$errors->first('stock')}}</p>
                         @endif
                
                     
 
                     <div class="form-group">
                         <label for="type">Ticket Features :</label>
                         <textarea name="feature" id="feature" cols="10" rows="5" class="form-control"></textarea>
                     </div>
                     @if($errors->has('feature'))
                     <p class="alert alert-danger">{{$errors->first('feature')}}</p>
                 @endif
 
                     <div class="form-group">
                         <label for="type">Ticket details :</label>
                         <textarea name="details" id="details" cols="10" rows="5" class="form-control"></textarea>
                     </div>
                     @if($errors->has('details'))
                     <p class="alert alert-danger">{{$errors->first('details')}}</p>
                 @endif
                     <div class="form-group">
                         <label for="type">Ticket benefits :</label>
                         <textarea name="benefits" id="benefits" cols="10" rows="5" class="form-control"></textarea>
                     </div>
                     @if($errors->has('benefits'))
                     <p class="alert alert-danger">{{$errors->first('benefits')}}</p>
                     @endif


                     <div class="form-group">
                        <label for="type">Image:</label>
                       <input type="file" name="image" class="form-control">
                    </div>
                    @if($errors->has('image'))
                    <p class="alert alert-danger">{{$errors->first('image')}}</p>
                    @endif


                     <div class="form-group">
                         
                         <input type="submit" value="Update Tickets" class="from-control btn btn-primary" >
                     </div>
 
                </form>
            </div>
        </div>
    </div>
</div>

