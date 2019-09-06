@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @include('partials.breadcrumb')

                <div class="bg-white p-5 shadow-sm">
                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <h4 class="mb-3">All Posts</h4>
                        <div>
                            <button class="btn btn-primary">Create new post</button>
                        </div>
                    </div>
                    <form class="border-top pt-4">
                        <div class="form-group">
                            <label for="post_title">Title</label>
                            <input type="text" class="form-control" id="post_title" placeholder="Enter post title" name="post_title" value="{{ old('post_title') }}">
                        </div>
                        <div class="form-group">
                            <label for="post_content">Content</label>
                            <textarea name="post_content" id="post_cotnent" placeholder="Enter Content" class="form-control">{{ old('post_content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="post_title">Scheduler time to publish</label>
                            <input type="time" class="form-control" id="post_scheduler" name="post_scheduler" value="{{ old('post_scheduler') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </main>
        </div>
    </div>
@endsection
