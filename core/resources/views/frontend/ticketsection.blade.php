<section class="ticket-section padding-bottom padding-top" id="ticket">
    <div class="container">
        <div class="section-header wow fadeInUp" data-wow-duration="1s">
            <h2 class="title">{{@$content['ticket']['title']}}</h2>
            <p>{{@$content['ticket']['subtitle']}}</p>
        </div>
        <div class="row mb-30-none justify-content-center">
            @foreach($tickets as $ticket )
            <div class="col-xl-4 col-md-6">
                <div class="ticket-item wow fadeInUp" data-wow-duration="1s">
                <h3 class="title">{{$ticket->type}}</h3>
                    <div class="ticket-thumb">
                    <img class="img-fluid" src="{{asset('asset/admin/images/ticket').'/'.$ticket->image}}" alt="">
                    </div>
                    <div class="ticket-content">
                    <p>{{substr($ticket->details,0,40)}}</p>
                    <h3 class="sub-title">$ {{$ticket->price}}</h3>
                    <a href="{{route('show',['id'=>$ticket->id])}}" class="custom-button active">Buy Ticket</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>