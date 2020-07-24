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
              <h3 class="text-center text-light">Sponsor Section 
                @if(array_key_exists('sponsor', $content))
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
                    <th scope="col">subtitle</th>
                   
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(array_key_exists('sponsor', $content))
                  <tr>
                    
                    <td>{{substr(@$content['sponsor']['title'],0,30)}}</td>
                    <td>{{substr(@$content['sponsor']['subtitle'],0,30)}}</td>
                    
            
                    
                    <td>
                      <button class="btn btn-outline-primary edit" data-key="sponsor" data-title="{{@$content['sponsor']['title']}}" data-subtitle="{{@$content['sponsor']['subtitle']}}"><i class="fa fa-edit"></i></button>
                      <a href="{{route('admin.section-delete',['key'=>"sponsor"])}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                      
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
</div>
@endsection

@push('banner')

  <script type="text/javascript">
    $('.add').click(function(){
      $("#sponsorModal").modal('show');
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

  </script>

@endpush


<div id="sponsorModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );">
        <h3 class="modal-title text-light">Add map Section Content</h3>
        
      </div>
      <div class="modal-body">

              <form action="{{route('admin.addsection')}}" method="post" >
                @csrf
                <input type="hidden" name="key" value="sponsor">
                <div class="form-group">
                  <label>sponsor Section Title</label>
                  <textarea name="title" class="form-control" rows="5"></textarea>
                  
                </div>
                @if($errors->has('title'))
                  <p class="alert alert-danger">{{$errors->first('title')}}</p>
                @endif

                <div class="form-group">
                  <label>Sub Title</label>
                  <textarea name="subtitle" class="form-control" rows="5"></textarea>
                  
                </div>
                @if($errors->has('subtitle'))
                  <p class="alert alert-danger">{{$errors->first('subtitle')}}</p>
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
        <h3 class="modal-title text-light">Update sponsor Section Content</h3>
        
      </div>
      <div class="modal-body">

              <form action="{{route('admin.updatesection')}}" method="post" >
                @csrf
                @method('put')
                <input type="hidden" name="key" id="id">
                <div class="form-group">
                  <label>sponsor Section Title</label>
                  <textarea name="title" class="form-control" rows="5" id="title"></textarea>
                  
                </div>
                @if($errors->has('title'))
                  <p class="alert alert-danger">{{$errors->first('title')}}</p>
                @endif



                 <div class="form-group">
                  <label>sponsor Section Sub Title</label>
                  <textarea name="subtitle" class="form-control" rows="5" id="subtitle"></textarea>
                  
                </div>
                @if($errors->has('subtitle'))
                  <p class="alert alert-danger">{{$errors->first('subtitle')}}</p>
                @endif     
                
                



                <div class="form-group">
                  <input type="submit" class="form-control btn btn-info" value="Update">
                </div>


              </form>
        
      </div>
     
    </div>
  </div>
</div>