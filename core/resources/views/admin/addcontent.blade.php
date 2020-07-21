@extends('admin.master')

@section('content')

<!--leftPanel -->
@include('admin.leftpanel')
<!--#leftPanel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
        @include('admin.nav')
    <!-- /#header -->
    <section class="design-process-section" id="process-tab">
        <div class="container">
          <div class="row">
            <div class="col-xs-12"> 
              <!-- design process steps--> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs process-model more-icon-preocess" role="tablist">
                <li role="presentation" class="active"><a href="#discover" aria-controls="discover" role="tab" data-toggle="tab"><i class="fa fa-search" aria-hidden="true"></i>
                  <p>banner</p>
                  </a></li>
                <li role="presentation"><a href="#strategy" aria-controls="strategy" role="tab" data-toggle="tab"><i class="fa fa-send-o" aria-hidden="true"></i>
                  <p>about</p>
                  </a></li>
                <li role="presentation"><a href="#optimization" aria-controls="optimization" role="tab" data-toggle="tab"><i class="fa fa-qrcode" aria-hidden="true"></i>
                  <p>overview</p>
                  </a></li>
                <li role="presentation"><a href="#content" aria-controls="content" role="tab" data-toggle="tab"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                  <p>speakersection</p>
                  </a></li>
                <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                  <p>schedule</p>
                  </a></li>
                <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                  <p>ticket</p>
                  </a></li>
                <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                  <p>ticketsection</p>
                  </a></li>
                <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                  <p>event</p>
                  </a></li>
                <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                  <p>blog</p>
                  </a></li>
                <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                  <p>sponsor</p>
                  </a></li>
                <li role="presentation"><a href="#reporting" aria-controls="reporting" role="tab" data-toggle="tab"><i class="fa fa-clipboard" aria-hidden="true"></i>
                  <p>footer</p>
                  </a></li>
              </ul>
              <!-- end design process steps--> 
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="discover">
                  <div class="design-process-content">
                    <h3 class="semi-bold">Discovery</h3>
                   <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat</p>
                   </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="strategy">
                  <div class="design-process-content">
                    <h3 class="semi-bold">Strategy</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat</p>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="optimization">
                  <div class="design-process-content">
                    <h3 class="semi-bold">Optimization</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat</p>
                     </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="content">
                  <div class="design-process-content">
                    <h3 class="semi-bold">Content</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat</p>              
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="reporting">
                  <div class="design-process-content">
                    <h3>Reporting</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincid unt ut laoreet dolore magna aliquam erat volutpat. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
</div>

@endsection




