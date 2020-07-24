<section class="call-in-ticket padding-top padding-bottom bg_img" data-background="{{asset('asset/admin/images/buyticket').'/'.@$content['buyticket']['image']}}">
    <ul id="parallax03">
        <li class="layer" data-depth="0.40">
            <img src="{{asset('asset/frontend/images/parallax/parallax06.png')}}" alt="parallax">
        </li>
        <li class="layer" data-depth="0.40">
            <img src="{{asset('asset/frontend/images/parallax/parallax07.png')}}" alt="parallax">
        </li>
    </ul>
    <div class="container">
        <div class="call-in-area text-center">
            <div class="header-area">
            <h2 class="title">{{@$content['buyticket']['title']}}</h2>
                <h2 class="title">{{@$content['buyticket']['subtitle']}}</h2>
            </div>
            <a href="#0" class="custom-button">Buy Ticket</a>
        </div>
    </div>
</section>