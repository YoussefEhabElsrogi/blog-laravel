@extends('theme.master')

@section('title', 'Single Blog')

@section('content')

@section('title-hero', $blog->name)
@include('theme.partials.hero')

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main_blog_details">
                    <img class=" w-100 img-fluid mt-5" src="{{ asset('storage/blogs/' . $blog->image) }}"
                        alt="{{ $blog->name }}"> <a href="#">
                        <h4>{{ $blog->name }}</h4>
                    </a>
                    <div class="user_details">
                        <div class="float-right mt-sm-0 mt-3">
                            <div class="media">
                                <div class="media-body">
                                    <h5>{{ $blog->user->name }}</h5>
                                    <p>{{ $blog->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div class="d-flex">
                                    <img width="42" height="42" src="{{ asset('assets') }}/img/avatar.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>{{ $blog->desc }}</p>

                    @if (count($blog->comments) > 0)
                        <div class="comments-area">
                            <h4>{{ count($blog->comments) }} Comments</h4>
                            @foreach ($blog->comments as $comment)
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{ url('assets/img/avatar.png') }}" width="50px"
                                                    alt="User Avatar">
                                            </div>
                                            <div class="desc">
                                                <h5>{{ $comment->name }}</h5>
                                                <p class="date">{{ $comment->created_at->format('d M Y H:i') }}</p>
                                                <p class="comment">{{ $comment->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    @endif

                    @if (session('commentCreateStatus'))
                        <div class="alert alert-success text-center">
                            {{ session('commentCreateStatus') }}
                        </div>
                    @endif

                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    placeholder="Enter Name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group col-lg-6 col-md-6">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="Enter email address">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" id="subject" class="form-control" name="subject"
                                placeholder="Subject">
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea id="message" class="form-control mb-10" rows="5" name="message" placeholder="Message" required></textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        </div>

                        <button type="submit" class="button submit_btn">Post Comment</button>
                    </form>

                </div>

                @include('theme.partials.sidebar')
            </div>
</section>
<!--================ End Blog Post Area =================-->
@endsection
