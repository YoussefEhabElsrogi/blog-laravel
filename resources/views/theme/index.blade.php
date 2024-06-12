@extends('theme.master')

@section('title', 'Index')

@section('home-active', 'active')

@section('content')

    <main class="site-main">

        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Amazing Places on earth</h1>
                        <h4>June 6, 2024</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->


        <!--================ Blog slider start =================-->
        <section>
            <div class="container">
                <div class="owl-carousel owl-theme blog-slider">
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/blog-slider/blog-slide1.png"
                                alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href="#">Fashion</a>
                            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/blog-slider/blog-slide2.png"
                                alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href="#">Fashion</a>
                            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/blog-slider/blog-slide3.png"
                                alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href="#">Fashion</a>
                            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/blog-slider/blog-slide1.png"
                                alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href="#">Fashion</a>
                            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/blog-slider/blog-slide2.png"
                                alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href="#">Fashion</a>
                            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="card blog__slide text-center">
                        <div class="blog__slide__img">
                            <img class="card-img rounded-0" src="{{ asset('assets') }}/img/blog/blog-slider/blog-slide3.png"
                                alt="">
                        </div>
                        <div class="blog__slide__content">
                            <a class="blog__slide__label" href="#">Fashion</a>
                            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
                            <p>2 days ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Blog slider end =================-->

        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @forelse ($blogs as $blog)
                            <div class="single-recent-blog-post">
                                <div class="thumb">
                                    <img class=" w-100 img-fluid mt-5" src="{{ asset('storage/blogs/' . $blog->image) }}"
                                        alt="{{ $blog->name }}">
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                        <i class="ti-notepad"></i>{{ $blog->created_at->format('d M Y H:i') }}</a></li>
                                        <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                        <h3>{{ $blog->name }}</h3>
                                    </a>
                                    <p>{{ $blog->desc }}</p>
                                    <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read More <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            @empty
                                <div class="text-danger">No Blogs For You</div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $blogs->render('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                @include('theme.partials.sidebar')
            </div>
        </section>
        <!--================ End Blog Post Area =================-->

    </main>

@endsection
