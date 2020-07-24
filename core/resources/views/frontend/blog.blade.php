<section class="blog-section padding-top">
    <div class="container">
        <div class="section-header wow fadeInUp" data-wow-duration="1s">
        <h2 class="title">{{@$content['blog']['title']}}</h2>
        <p>{{@$content['blog']['subtitle']}}</p>
        </div>
        <div class="row mb-30-none justify-content-center">
            @foreach($blogDetails as $blog)
            <div class="col-md-6 col-lg-4">
                <div class="post-item wow fadeInUp" data-wow-duration="1s">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="{{asset($blog->image)}}" alt="blog"></a>
                        <ul class="blog-date">
                        <h2>{{$blog->created_at->format('d')}}</h2>
                        <span>{{$blog->created_at->format('M')}}</span>
                        </ul>
                    </div>
                    <div class="post-content">
                    <h4 class="title"><a href="blog.html">{{$blog->title}}</a></h4>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</section>