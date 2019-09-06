@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @include('partials.breadcrumb', [
                    'label' => 'Post Index'
                ])

                <div class="bg-white p-5 shadow-sm">
                    @include('partials.notification')

                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <h4 class="mb-3">All Posts</h4>
                        <div>
                            <a href="{{ route('post.create') }}" class="btn btn-primary">Create new post</a>
                        </div>
                    </div>
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                    <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>
                                <img src="{{ $post->photo_path ?  asset('storage/'.$post->photo_path) : '#' }}" alt="{{ $post->title }}" class="img-fluid" width="100">
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-info text-white btn-sm">Show</a>

                                <a class="btn btn-danger ml-1" href="#" onclick="event.preventDefault(); document.getElementById('delete-post-{{ $post->id }}').submit();">
                                    Del
                                </a>
                                <form method="POST" action="{{ route('post.delete', $post->id) }}" id="delete-post-{{ $post->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </div>
                        </td>
                        </tr>
                    @empty
                    <p>No post found</p>
                    @endforelse

                    </tbody>
                </table>
                </div>
            </main>
        </div>
    </div>
@endsection
