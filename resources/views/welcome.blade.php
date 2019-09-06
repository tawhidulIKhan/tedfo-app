@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @forelse($posts as $post)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ asset('storage/'.$post->photo_path) }}" class="img-fluid" alt="{{$post->title}}">
                            <div class="card-body">
                                <a href="{{ route('post.details', $post->id) }}">
                                    <h4 class="card-text">{{ $post->title }}</h4>
                                </a>
                                <p class="card-text">{{ $post->body }}</p>

                            </div>
                        </div>
                    </div>

                @empty
                    @endforelse

                {{ $posts->links() }}

            </div>
        </div>
    </div>
@endsection
