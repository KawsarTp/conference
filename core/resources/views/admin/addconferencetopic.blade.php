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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header text-center card-background">
                    <strong class="card-title text-light">Add Topics For Conference</strong>
                    {{-- @include('admin.alert') --}}
                </div>
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                        <form action="{{route('admin.conference')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label class="control-label mb-1">Topic Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Topic Name" required value="{{old('name')}}">
                                </div>
    
                               
    
                                <div class="form-group">
                                    <label class="control-label mb-1">Time Slot For A Topic</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="time" name="from" class="form-control" placeholder="From" required>
                                                
                                            </div>
                                           
                                        </div>
                                        TO
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <input type="time" name="to" class="form-control" placeholder="To" required>
                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label class="control-label mb-1">Date for this Topic</label>
                                <input name="date" type="text" class="form-control" id="datepicker" placeholder="Date start {{$setting->event}}">
                                </div>
                                
    
                               
    
                                <div class="form-group">
                                    <label class="control-label mb-1">Add Speaker</label>
                                    <select name="speaker" id="" class="form-control">
                                        @foreach($speakers as $speaker)
                                                <option value="{{$speaker->id}}">{{$speaker->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
    
    
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Save Topic</span>
                                    </button>
                                
                            </form>
                            
                        </div>
                    </div>
    
                </div>
            </div> <!-- .card -->
           
        </div>
    </div>
</div>
</div>
<div class="clearfix"></div>
@endsection

@push('content')

<script src="http://blast.thesoftking.com/lab/xenwallet/assets/admin/js/nicEdit.js"></script>
<script>
   
    bkLib.onDomLoaded(function() {
        $( ".nicEdit" ).each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
	});
	
function getCont(){
		var c = ndinstance.getContent();

		var start_ptn = /(<.[^>]+>)*/gmi; //Filter label opening	
		 var end_ptn = /<\/?\w+>$/; //Filter tag ends
		 var space_ptn = /(&nbsp;)*/; //Filter spaces
		var c1 = c.replace(start_ptn,"").replace(end_ptn).replace(space_ptn,"");

    }




    $( function() {
      $( "#datepicker" ).datepicker({
          minDate:+0,
          maxDate:"{{$setting->days}}",
          dateFormat: "yy-mm-dd",

        });
        
    });
    
</script>
<style>
	.card-background{
		background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(151,10,130,1) 0%, rgba(33,33,33,1) 100.2% );
	}
	

	.image-size{
		color: brown;
	}

	textarea {
      background-color: white;
  }

	
</style>

@endpush
