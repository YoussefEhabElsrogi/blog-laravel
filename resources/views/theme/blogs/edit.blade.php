@extends('theme.master')
@section('title', 'Edit Blog')

@section('content')

@section('title-hero', $blog->name)
@include('theme.partials.hero')

<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session('updateData'))
                    <div class="alert alert-success text-center">
                        {{ session('updateData') }}
                    </div>
                @endif

                <form action="{{ route('blogs.update', ['blog' => $blog]) }}" class="form-contact contact_form"
                    method="POST" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <input class="form-control border" name="name" type="text"
                            placeholder="Enter your blog title" value="{{ $blog->name }}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <input class="form-control border" name="image" type="file">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <select class="form-control border" name="category_id" placeholder="Enter your blog title"
                            value="{{ old('category_id') }}">
                            <option value="">Select Category</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id === $blog->category_id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @empty
                                <option value="" disabled>No categories available</option>
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <textarea class="w-100 border" name="desc" placeholder="Enter your blog desc" rows="5">{{ $blog->desc }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection
