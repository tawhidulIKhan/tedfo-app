@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @include('partials.breadcrumb', [
                    'label' => 'Post Edit'
                ])

                <div class="bg-white p-5 shadow-sm">
                    @include('partials.notification')

                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <h4 class="mb-3">All Posts</h4>
                        <div>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form method="post" action="{{ route('post.update', $post->id) }}" class="border-top pt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="post_title">Title</label>
                            <input type="text" class="form-control @error('post_title') is-invalid @enderror" id="post_title" placeholder="Enter post title" name="post_title" value="{{ $post->title }}">
                            @error('post_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_content">Content</label>
                            <textarea name="post_content" id="post_cotnent" placeholder="Enter Content" class="form-control @error('post_content') is-invalid @enderror">{{ $post->body }}</textarea>
                            @error('post_content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('storage/'.$post->photo_path) }}" alt="" class="img-fluid" width="200" height="200">
                            <label>Upload featured image</label>
                            <input type="file" name="post_featured_image" id="post_featured_image">

                            @error('post_featured_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_categories">Categories</label>
                            <select name="post_categories[]" id="post_categories" class="form-control" multiple>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id, $post->categories ? $post->categories->pluck('id')->toArray() : []) ? 'selected' : ''  }}>{{ $category->name }}</option>
                                @empty
                                    <option value="*">No Category found</option>
                                @endforelse
                            </select>
                            @error('post_categories')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_scheduler">Scheduler time to publish</label>
                            <input type="date" class="form-control  @error('post_scheduler') is-invalid @enderror" id="post_scheduler" name="post_scheduler" value="{{ $post->schedule_date ? $post->schedule_date->format('Y-m-d') : '' }}">
                            @error('post_scheduler')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </main>
        </div>
    </div>
@endsection
