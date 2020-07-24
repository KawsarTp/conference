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
      <div class="row justify-content-center mt-3">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
              <h3 class="text-center text-light">tab Section 
                @if(array_key_exists('tab', $content))
                  <span></span>
                @else
                  <button class="btn btn-outline-info float-right add">ADD <i class="fa fa-plus"></i></button>
                  @endif
              </h3>
              
            </div>
          
            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(array_key_exists('tab', $content))
                  <tr>
                    
                    <td>{{substr(@$content['tab']['title'],0,30)}}</td>
                    

                    <td><img src="{{asset('asset/admin/images/tab').'/'.@$content['tab']['image']}}" width="50px"></td>
                    
                    <td>
                      <button class="btn btn-outline-primary edit" data-key="tab" data-title="{{@$content['tab']['title']}}" data-subtitle="{{@$content['tab']['subtitle']}}"><i class="fa fa-edit"></i></button>
                      <a href="{{route('admin.section-delete',['key'=>"tab"])}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                      
                    </td>
                  </tr>
                  @else
                    <tr>
                      <td colspan="3" class="text-danger font-weight-bold text-center">No Data Found</td>
                    </tr>
                  @endif
                </tbody>
              </table>

              
            </div>
            


          </div>
        </div>
      </div>
    </div>


{{-- button --}}
    <div class="container">
      <div class="row justify-content-center mt-3">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
              <h3 class="text-center text-light">tab Button 
               
                  <button class="btn btn-outline-info float-right tabbutton">ADD <i class="fa fa-plus"></i></button>
                 
              </h3>
              
            </div>
          
            <div class="card-body">

              <table class="table">
                <thead>
                  <tr>
                    
                    <th scope="col">Title</th>
                    <th scope="col">description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($tabs as $tab )
                  <tr>
                    
                    <td>{{$tab->title}}</td>
                    <td>{{$tab->details}}</td>
                    
                    <td>
                      <button class="btn btn-outline-primary edittab" data-id="{{$tab->id}}" data-title="{{$tab->title}}" data-description="{{$tab->details}}"><i class="fa fa-edit"></i></button>
                      <a href="{{route('admin.deletetabbutton',['id'=>$tab->id])}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                      
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

@push('banner')

  <script type="text/javascript">
    $('.add').click(function(){
      $("#tabModal").modal('show');
    });

    $('.edit').click(function(){
      $("#editModal").modal('show');
      var key = $(this).data('key');
      var title = $(this).data('title');
      var subtitle = $(this).data('subtitle');

          $(".modal-body #id").val(key);
          $(".modal-body #title").val(title);
          $(".modal-body #subtitle").val(subtitle);
    });



    $('.tabbutton').click(function(){
      $("#tabButtonModal").modal('show');
    });

    $('.edittab').click(function(){
      $("#edittabModal").modal('show');
      var id = $(this).data('id');
      var title = $(this).data('title');
      var description = $(this).data('description');

          $(".modal-body #id").val(id);
          $(".modal-body #title").val(title);
          $(".modal-body #description").val(description);
    });

  </script>

@endpush


<div id="tabModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
        <h3 class="modal-title text-light">Add Tab Section Content</h3>
        
      </div>
      <div class="modal-body">

              <form action="{{route('admin.addsection')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="key" value="tab">
                <div class="form-group">
                  <label>tab Section Title</label>
                  <textarea name="title" class="form-control" rows="5"></textarea>
                  
                </div>
                @if($errors->has('title'))
                  <p class="alert alert-danger">{{$errors->first('title')}}</p>
                @endif


                <div class="form-group">
                  <label>tab Section Image</label>
                  <input type="file" name="image" class="form-control">
                  
                </div>  
                @if($errors->has('image'))
                  <p class="alert alert-danger">{{$errors->first('image')}}</p>
                @endif

                
                <div class="form-group">
                  <input type="submit" class="form-control btn btn-info" value="Save">
                </div>


              </form>
        
      </div>
     
    </div>
  </div>
</div>

{{-- Edit Modal --}}


<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
        <h3 class="modal-title text-light">Update Tab Section Content</h3>
        
      </div>
      <div class="modal-body">

              <form action="{{route('admin.updatesection')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="key" id="id">
                <div class="form-group">
                  <label>Tab Section Title</label>
                  <textarea name="title" class="form-control" rows="5" id="title"></textarea>
                  
                </div>
                @if($errors->has('title'))
                  <p class="alert alert-danger">{{$errors->first('title')}}</p>
                @endif


               

                <div class="form-group">
                  <label>tab Section Image</label>
                  <input type="file" name="image" class="form-control">
                  
                </div>  
                @if($errors->has('image'))
                  <p class="alert alert-danger">{{$errors->first('image')}}</p>
                @endif
                
                <div class="form-group">
                  <input type="submit" class="form-control btn btn-info" value="Update">
                </div>


              </form>
        
      </div>
     
    </div>
  </div>
</div>



{{-- BUtton --}}

<div id="tabButtonModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
        <h3 class="modal-title text-light">Add Tab Button</h3>
        
      </div>
      <div class="modal-body">

              <form action="{{route('admin.addtabbutton')}}" method="post">
                @csrf
                <div class="form-group">
                  <label>tab Button Title</label>
                  <input type="text" name="title" class="form-control">
                  
                </div>
                @if($errors->has('title'))
                  <p class="alert alert-danger">{{$errors->first('title')}}</p>
                @endif


                <div class="form-group">
                  <label>tab Button Description</label>
                  <textarea name="description" class="form-control" rows="5"></textarea>
                  
                </div>  
                @if($errors->has('description'))
                  <p class="alert alert-danger">{{$errors->first('description')}}</p>
                @endif

                
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
      <div class="modal-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
        <h3 class="modal-title text-light">Update Tab Button</h3>
        
      </div>
      <div class="modal-body">

              <form action="{{route('admin.updatetabbutton')}}" method="post">
                @csrf

                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label>Tab Button Title</label>
                  <input type="text" name="title" class="form-control" id="title">
                  
                </div>
                @if($errors->has('title'))
                  <p class="alert alert-danger">{{$errors->first('title')}}</p>
                @endif


                <div class="form-group">
                  <label>Tab Button description</label>
                  <textarea name="description" class="form-control" rows="5" id="description"></textarea>
                  
                </div>
                @if($errors->has('description'))
                  <p class="alert alert-danger">{{$errors->first('description')}}</p>
                @endif


               

                
                <div class="form-group">
                  <input type="submit" class="form-control btn btn-info" value="Update">
                </div>


              </form>
        
      </div>
     
    </div>
  </div>
</div>
