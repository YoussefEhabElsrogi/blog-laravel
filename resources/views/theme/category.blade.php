@extends('theme.master')

@section('title', 'Category')

@section('categories-active', 'active')

@section('content')

@section('title-hero', $categoryName)
@include('theme.partials.hero')


<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @forelse ($blogs as $blog)
                        <div class="col-md-6">
                            <div class="single-recent-blog-post card-view">
                                <div class="thumb">
                                    <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}"
                                        alt="{{ $blog->name }}">
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                        <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                        <li><a href="#"><i
                                                    class="ti-notepad"></i>{{ $blog->created_at->format('d M Y H:i') }}</a>
                                        </li>
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
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 text-danger">No Blogs Later Try Later</div>
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
    </div>
</section>
<!--================ End Blog Post Area =================-->

@endsection
