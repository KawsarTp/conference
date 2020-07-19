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

        <div class="row justify-content-center">
            <div class="col-md-12">

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="one">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseThree">
                                    Heading-Section
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="one">
                                    <div class="panel-body">
                                    <form action="{{route('admin.addContent')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="section" value="header">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" class="form-control" name="title">
                                            </div>

                                            <div class="form-group">
                                                <label for="title">description</label>
                                               <textarea name="details" id="" cols="30" rows="5" class="form-control"></textarea>
                                            </div>


                                            <div class="form-group">
                                                <label for="title">Time for Conference</label>
                                                <input type="date" class="form-control" name="date">
                                            </div>

                                            <div class="form-group">
                                               
                                                <input type="submit" class="form-control btn btn-danger">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>



                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="one">
                                <h4 class="panel-title">
                                    <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseThree">
                                       
                                        <span> About Section </span>
                                    </a>
                                </h4>
                            </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="one">
                                        <div class="panel-body">
                                            <form action="{{route('admin.addContent')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="section" value="about">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" name="title">
                                                </div>

                                                <div class="form-group">
                                                    <label for="title">sub Title</label>
                                                    <input type="text" class="form-control" name="sub">
                                                </div>
    
                                                <div class="form-group">
                                                    <label for="title">description</label>
                                                   <textarea name="details" id="" cols="30" rows="5" class="form-control"></textarea>
                                                </div>
    
                                                <div class="form-group">
                                                    <label for="title">Image </label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
    
                                                <div class="form-group">
                                                   
                                                    <input type="submit" class="form-control btn btn-danger">
                                                </div>
    
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>



                        {{-- About Section --}}
                        <div class="col-md-5">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="one">
                                    <h4 class="panel-title">
                                        <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Banner Section
                                            <span> </span>
                                        </a>
                                    </h4>
                                </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="one">
                                            <div class="panel-body">
                                                <p>Nulla vitae ipsum diam. Pellentesque vitae metus vitae massa egestas posuere justo turpis, blandit nec ex eu, tempus placerat diam. Morbi a felis commodo eros consectetur rhoncus sed eget lectus. Praesent non erat vehicula, posuere massa id, ultricies est. Pellentesque sit amet venenatis est, quis posuere ipsum.</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
    

                            {{-- Overview Section --}}
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="one">
                                        <h4 class="panel-title">
                                            <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Banner Section
                                                <span> </span>
                                            </a>
                                        </h4>
                                    </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="one">
                                                <div class="panel-body">
                                                    <p>Nulla vitae ipsum diam. Pellentesque vitae metus vitae massa egestas posuere justo turpis, blandit nec ex eu, tempus placerat diam. Morbi a felis commodo eros consectetur rhoncus sed eget lectus. Praesent non erat vehicula, posuere massa id, ultricies est. Pellentesque sit amet venenatis est, quis posuere ipsum.</p>
                                                </div>
                                            </div>
                                    </div>
                                </div>


                                {{-- Speaker Section --}}
                                <div class="col-md-5">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="one">
                                            <h4 class="panel-title">
                                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Banner Section
                                                    <span> </span>
                                                </a>
                                            </h4>
                                        </div>
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="one">
                                                    <div class="panel-body">
                                                        <p>Nulla vitae ipsum diam. Pellentesque vitae metus vitae massa egestas posuere justo turpis, blandit nec ex eu, tempus placerat diam. Morbi a felis commodo eros consectetur rhoncus sed eget lectus. Praesent non erat vehicula, posuere massa id, ultricies est. Pellentesque sit amet venenatis est, quis posuere ipsum.</p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection




