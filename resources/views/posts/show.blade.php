@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @include('partials.breadcrumb', [
                    'label' => 'Post Details'
                ])

                <div class="bg-white p-5 shadow-sm">
                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <h4 class="mb-3">All Posts</h4>
                        <div>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/'.$post->photo_path) }}" alt="" class="img-fluid" width="450">
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ $post->body }}</p>
                            <p class="font-weight-bold">Categories:</p>
                            <ul class="list-unstyled">
                                @forelse($post->categories as $category)
                                    <li>{{ $category->name }}</li>
                                    @empty
                                    <li>No Category found</li>
                                    @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
