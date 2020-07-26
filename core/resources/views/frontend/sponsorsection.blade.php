@extends('frontend.master')

@section('content')

@include('frontend.header')
 <!-- ============Page Header Section Starts Here================== -->
 <section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h2 class="title"> become sponsor</h2>
            <ul class="breadcrumb">
                <li>
                <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    become sponsor
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- ============Page Header Section Ends Here================== -->

<!-- ============Become Sponsor Section Starts Here================== -->
<section class="become-sponsor-section padding-bottom padding-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-lg-0 mb-5">
                <div class="become-sponsor-article">
                    <h3 class="title">become our sponsor</h3>
                <p class="main-para">{{@$sponsor->details}}</p>
                    <h4 class="sub-title">benifites of sponsor</h4>
                <p>{{@$sponsor->benefit}}</p>
                    
                    <h4 class="sub-title">Know about sponsorship</h4>
                <p class="last-para">{{@$sponsor->about}}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="application-form-area">
                    <h5 class="title">Application Form</h5>

                <form class="application-form" action="{{route('sponsor')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <input type="text" placeholder="Full Name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Company Name" name="company">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Website" name="website">
                        </div>
                        <div class="form-group">
                            <select id="select-cata" name="type">
                                @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>    
<!-- ============Become Sponsor Section Ends Here================== -->

@endsection