<section class="schedule-section padding-bottom">
    <div class="container">
        <div class="section-header wow fadeInUp" data-wow-duration="1s">
        <h2 class="title">{{@$content['schedule']['title']}}</h2>
            <p>{{@$content['schedule']['subtitle']}}</p>
        </div>
        <div class="schedule-area tab">
            <ul class="tab-menu">
                @php($i = 1)
                @foreach($groupDate as $a)
                    <li value="{{$a->date}}"><span>Day {{$i++}}</span>{{$a->date}}</li>
                @endforeach
            </ul>
            {{-- @foreach($topic as $tp) --}}


            <div class="tab-area mb-30-none">
                @foreach($groupDate as $a)
                <div class="tab-item">
                    @foreach($topic as $data)
                        @if($a->date == $data->date)
                        <div class="schedule-item">
                            <div class="schedule-thumb">
                            {{-- <a href="#0"><img src="{{ asset($data->speaker->image) }}" alt="schedule"></a> --}}
                            </div>
                            <div class="schedule-content">
                            <h4 class="title"><a href="#0">{{ $data->name }}</a></h4>
                            <p><a href="#0">{{ @$data->speaker->name }}</a>at {{ $data->time_slot }}</p>
                            <p class="para">{{ @$data->speaker->details }}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                @endforeach
               
            </div>
            
            
        </div>
    </div>
</section>

