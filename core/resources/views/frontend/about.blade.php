<section class="about-section padding-top">
    <div class="about-overview-item padding-bottom">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-10">
                    <div class="about-overview-left wow fadeIn" data-wow-duration="1s">
                    <h2 class="title">{{@$about->content['title']}}</h2>
                        <h5 class="sub-title">{{@$about->content['subtitle']}}</p>
                            <a href="#0" class="custom-button">get ticket</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-10">
                    <div class="about-overview-right wow fadeIn" data-wow-duration="1s">
                        <div class="shape">
                            <img src="{{asset('asset/frontend/images/about/about01.jpg')}}" alt="about">
                        </div>
                        <ul id="parallax01">
                            <li class="layer" data-depth="0.90">
                                <img src="{{asset('asset/frontend/images/parallax/parallax01.png')}}" alt="parallax">
                            </li>
                            <li class="layer" data-depth="0.20">
                                <img src="{{asset('asset/frontend/images/parallax/parallax02.png')}}" alt="parallax">
                            </li>
                            <li class="layer" data-depth="0.50">
                                <img src="{{asset('asset/frontend/images/parallax/parallax03.png')}}" alt="parallax">
                            </li>
                            <li class="layer" data-depth="0.40">
                                <img src="{{asset('asset/frontend/images/parallax/parallax04.png')}}" alt="parallax">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-overview-item padding-bottom">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center flex-row-reverse">
                <div class="col-xl-6 col-lg-10">
                    <div class="about-overview-left wow fadeIn" data-wow-duration="1s">
                    <h2 class="title">{{@$tab->content['title']}}</h2>
                        <div class="about-tab-wrapper tab">
                            <ul class="tab-menu common-menu">
                                {{-- @dd($tab->content['tabs']) --}}
                                @foreach($tab->content['tabs'] as $value)
                                {{-- {{dd($value)}} --}}
                                <li>{{$value['title']}}</li>
                                @endforeach
                            </ul>


                            <div class="tab-area">
                                
                                @foreach($tab->content['tabs'] as $tabdata)
                                    @if($tabdata['title'] !== "Testimonial")
                                    <div class="tab-item">
                                            <p>{{$tabdata['details']}}</p>
                                    </div> 
                                    @endif

                                    @if($tabdata['title'] == "Testimonial")
                                        
                                    @foreach($tabdata['quotes'] as $quote)
                                
                                    <div class="tab-item">
                                        <div class="blockquote-slider owl-carousel owl-theme">
                                            <div class="item">
                                                <blockquote>
                                                    {{$quote['title']}}
                                                </blockquote>
                                                <div class="blockquote-speaker d-flex">
                                                    <div class="blockquote-speaker-thumb">
                                                        <img src="{{asset('asset/frontend/images/about/about-tab01.jpg')}}" alt="about">
                                                    </div>
                                                    <div class="blockquote-speaker-content">
                                                    <h6>{{$quote['name']}}</h6>
                                                        <span>{{$quote['designation']}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                    @endif  
                                                       
                                @endforeach



                               
                             
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-6 col-lg-10">
                    <div class="about-overview-right wow fadeIn" data-wow-duration="1s">
                        <div class="shape"><img src="{{asset('asset/frontend/images/about/about02')}}.jpg" alt="about"></div>
                        <ul id="parallax02">
                            <li class="layer" data-depth="0.90">
                                <img src="{{asset('asset/frontend/images/parallax/parallax01.png')}}" alt="parallax">
                            </li>
                            <li class="layer" data-depth="0.20">
                                <img src="{{asset('asset/frontend/images/parallax/parallax02.png')}}" alt="parallax">
                            </li>
                            <li class="layer" data-depth="0.50">
                                <img src="{{asset('asset/frontend/images/parallax/parallax03.png')}}" alt="parallax">
                            </li>
                            <li class="layer" data-depth="0.40">
                                <img src="{{asset('asset/frontend/images/parallax/parallax04.png')}}" alt="parallax">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-left-animation"><img src="{{asset('asset/frontend/images/parallax/parallax05.png')}}" alt="parallax"></div>
</section>