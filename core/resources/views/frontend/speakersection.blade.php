<section class="speaker-section padding-bottom padding-top" id="speaker">
    <div class="container-fluid">
        <div class="section-header wow fadeInUp" data-wow-duration="1s">
            <h2 class="title">event speakers</h2>
            <p>a porttitor metus cupidatat nunc, luctus erat at. Amet class phasellus in eget sociosqu mi amet morbi
                taciti eu urna, mi nunc volutpat quis</p>
        </div>
        <div class="speaker-area d-flex flex-wrap justify-content-center">
        @foreach($speakerList as $speaker)
            <div class="speaker-item wow fadeInUp" data-wow-duration="1s">
                <div class="speaker-inner">
                    <div class="speaker-content">
                        <h3 class="sub-title">
                        <a href="#0">{{$speaker->name}}</a>
                        </h3>
                    <span>{{$speaker->designation}}</span>
                    </div>
                    <div class="speaker-thumb">
                        <img src="{{asset("$speaker->image")}}" alt="speaker">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>