<section class="sponsor-section padding-top padding-bottom">
    <div class="container">
        <div class="section-header wow fadeInUp" data-wow-duration="1s">
        <h2 class="title">{{$sponsor->content['title']}}</h2>
        <p>{{$sponsor->content['para']}}</p>
        </div>
        <div class="sponsor-wrapper">
            @foreach($itterator as $itterators)
            <h4 class="sub-title">{{$itterators->types->name}}</h4>
                    
                    
        <div class="sponsor-area">
            @foreach($allSponsor as $sponsor)
                @if($itterators->sponsor_type_id == $sponsor->sponsor_type_id)
                        <div class="sponsor-thumb">
                        <a href="#0"><img src="{{asset('asset/admin/images/sponsor').'/'.$sponsor->image}}" alt="sponsor"></a>
                        </div>

                    @endif
            @endforeach
            </div>
        
            @endforeach
        </div>
        
        <div class="text-center">
        <a href="{{route('sponsor')}}" class="custom-button">Become a Sponsor</a>
        </div>
    </div>
</section>