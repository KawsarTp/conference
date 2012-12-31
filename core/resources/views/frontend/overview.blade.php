<section class="overview-section">
    <div class="container-fluid p-0">
        <div class="row flex-wrap-reverse">
            <div class="col-xl-6 p-0">
                <div class="overview-left padding-bottom padding-top">
                    <div class="left-content">
                        <div class="row m-0">
                            @foreach($overView as $overview)
                            <div class="col-md-6">
                                <div class="overview-item wow fadeInUp" data-wow-duration="1s">
                                    <div class="overview-header">
                                    <i class="fas {{$overview->icon}}"></i>
                                    <h4 class="title">{{$overview->title}}</h4>
                                    </div>
                                    <div class="overview-item-content">
                                    <p>{{$overview->details}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 p-0">
                <div class="overview-right h-100 bg_img" data-background="{{asset('asset/admin/images/overview').'/'.@$content['overview']['image']}}">
                    <img src="{{asset('asset/admin/images/overview').'/'.@$content['overview']['image']}}" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>