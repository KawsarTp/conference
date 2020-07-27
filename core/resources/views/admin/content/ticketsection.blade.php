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
      <div class="row justify-content-center ">
        <div class="col-md-12 mt-3">
          <div class="card">
            <div class="card-header card-background">
              <h3 class="text-center text-light">Ticket Content</h3>
              
            </div>
          
            <div class="card-body">

              <form action="{{route('admin.updatesection')}}" method="post" >
                @csrf
                @method('put')
                <input type="hidden" name="key" id="id" value="ticket">
                <div class="form-group">
                  <label>Title</label>
                  <input class="form-control" type="text" name="title" required value="{{@$content['ticket']['title']}}">
                  
                </div>
                



                 <div class="form-group">
                  <label>Sub Title</label>
                  <textarea name="subtitle" class="form-control nicEdit" rows="8" required>{{@$content['ticket']['subtitle']}}</textarea>
                  
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
</div>
@endsection

@push('content')

<script src="http://blast.thesoftking.com/lab/xenwallet/assets/admin/js/nicEdit.js"></script>
<script>
    bkLib.onDomLoaded(function () {
        $(".nicEdit").each(function (index) {
            $(this).attr("id", "nicEditor" + index);
            new nicEditor({
                fullPanel: true
            }).panelInstance('nicEditor' + index, {
                hasPanel: true
            });
        });
    });

    function getCont() {
        var c = ndinstance.getContent();

        var start_ptn = /(<.[^>]+>)*/gmi; //Filter label opening	
        var end_ptn = /<\/?\w+>$/; //Filter tag ends
        var space_ptn = /(&nbsp;)*/; //Filter spaces
        var c1 = c.replace(start_ptn, "").replace(end_ptn).replace(space_ptn, "");

    }

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



