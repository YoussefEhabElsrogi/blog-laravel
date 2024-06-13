@extends('theme.master')

@section('title', 'Add New Blog')

@section('content')

@section('title-hero', 'My Blogs')

@include('theme.partials.hero')
<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                User Blogs Will Be Here
                @if (session('deleteBlog'))
                    <div class="alert alert-success text-center">
                        {{ session('deleteBlog') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($blogs as $blog)
                            <tr>
                                <td scope="row">{{ $blog->id }}</td>
                                <td>
                                    <a href="{{ route('blogs.show', ['blog' => $blog]) }}"
                                        target="_blank">{{ $blog->name }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('blogs.edit', ['blog' => $blog]) }}"
                                        class="btn btn-sm btn-primary mr-2">Edit</a>
                                    <form action="{{ route('blogs.destroy', ['blog' => $blog]) }}" method="POST"
                                        id="delete_form" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger mr-2"
                                            onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="text-danger">
                                        No Blogs Found. <a href="{{ route('blogs.create') }}">Add New Blog</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if (count($blogs) > 0)
                    {{ $blogs->render('pagination::bootstrap-5') }}
                @endif

            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection
