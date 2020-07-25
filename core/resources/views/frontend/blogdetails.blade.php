@extends('frontend.master')


@section('content')
@include('frontend.header')


    <!-- ============Page Header Section Starts Here================== -->
    <section class="page-header">
        <div class="container">
            <div class="page-header-content">
                <h2 class="title">Blog post</h2>
                <ul class="breadcrumb">
                    <li>
                    <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>
                        Blog post
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ============Page Header Section Ends Here================== -->

    <!-- ============ Blog Section Starts Here================== -->
    <section class="blog-section padding-top padding-bottom">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8">
                        <div class="post-item style-two">
                            <div class="post-content">
                            <h3 class="title">{{$id->title}}</h3>
                                <ul class="meta-post">
                                    <li>
                                        02 <a href="#0"> Comment</a>
                                    </li>
                                    <li>
                                        By <a href="#0"> Admin</a>
                                    </li>
                                    <li>
                                        In <a href="#0"> Event</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-thumb">
                            <img src="{{asset('asset/admin/images/blog').'/'.$id->image}}" alt="blog">
                                <ul class="blog-date">
                                <h2>{{$id->created_at->format('d')}}</h2>
                                    <span>{{$id->created_at->format('M')}}</span>
                                </ul>
                            </div>
                            <div class="entry-content">
                            <p>{{$id->details}}</p>
                                <a href="#0">Read More <i class="fas fa-caret-right"></i></a>
                            </div>
                        </div>
                       
                        
                        
                </div>
                
            </div>
        </div>
    </section>
    <!-- ============ Blog Section Ends Here================== -->

    @endsection