@extends('frontend.master')

@section('content')

@include('frontend.header')

<!-- ============Page Header Section Starts Here================== -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h2 class="title"> buy ticket</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    buy ticket
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ============Page Header Section Ends Here================== -->

<!-- ============Become Sponsor Section Starts Here================== -->
<section class="become-sponsor-section buy-ticket padding-bottom padding-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-lg-0 mb-5">
                <div class="become-sponsor-article">
                    <h3 class="title">{{$id->type}} packages <span>$ {{$id->price}}</span></h3>
                    <p class="main-para lead">@php echo $id->details @endphp</p>
                    <h4 class="sub-title">benifites of {{$id->type}} package</h4>
                    <p>@php echo $id->benefits @endphp</p>

                    <h4 class="sub-title">{{$id->type}} pack Features</h4>
                    <p class="last-para">@php echo $id->feature @endphp</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="application-form-area">
                    <h5 class="title">buy ticket</h5>

                    <form class="application-form" action="{{route('show',['id'=>$id->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="price" value="{{$id->price}}">
                        <div class="form-group">
                        <input type="text" placeholder="Full Name" name="name" required value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <input type="email" placeholder="Email" name="email" required value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="Phone" name="phone" required value="{{old('phone')}}">
                        </div>

                        <div class="form-group">
                            <input type="number" placeholder="Quantity" min="1" name="quantity" required >
                        </div>

                        <div class="form-group check-input d-flex flex-wrap align-items-center mb-2">
                            <input type="checkbox" id="check-ticket" value="accept" name="check">
                            <label for="check-ticket">I Accept The</label> <a href="#0">Terms & Policy</a>

                        </div>

                        <div class="form-group">
                            <input type="submit" value="Submit Now" class="form-control">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============Become Sponsor Section Ends Here================== -->

@endsection


