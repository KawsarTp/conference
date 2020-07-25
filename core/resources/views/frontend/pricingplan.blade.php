@extends('frontend.master')


@section('content')

@include('frontend.header')
<!-- ============Page Header Section Starts Here================== -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h2 class="title">pricing plan</h2>
            <ul class="breadcrumb">
                <li>
                <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    pricing plan
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ============Page Header Section Ends Here================== -->

<!-- ============Ticket Section Starts Here================== -->
<section class="ticket-section padding-bottom padding-top">
    <div class="container">
        
        <div class="section-header">
        <h2 class="title">{{@$content['ticket']['title']}}</h2>
        <p>{{@$content['ticket']['subtitle']}}</p>
        </div>

        @foreach($ticket as $data)
        <div class="row mb-30-none justify-content-center">
            <div class="col-xl-4 col-md-6">
                <div class="ticket-item">
                    <h3 class="title">{{$data->type}}</h3>
                    <div class="ticket-thumb">
                    <img src="{{asset('asset/admin/images/ticket').'/'.$data->image}}" alt="ticket">
                    </div>
                    <div class="ticket-content">
                    <p>{{substr($data->details,0,50)}}</p>
                    <h3 class="sub-title">{{$data->price}}</h3>
                    <a href="{{route('show',['id'=>$data->id])}}" class="custom-button active">Buy Ticket</a>
                    </div>
                </div>
            </div>
        </div>
@endforeach

    </div>
</section>
<!-- ============Ticket Section Ends Here================== -->

    @include('frontend.footer')

@endsection