@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="bg-white p-4 border">
                <img src="{{ asset('storage/'.$post->photo_path) }}" alt="{{ $post->title }}" width="1100" height="400" class="img-fluid">
                <div class="d-flex mt-4 mb-2">
                    <div><span class="font-weight-bold">Posted at </span>{{ $post->created_at->diffForHumans() }}</div>
                </div>
                <div class="d-flex">
                    <div>
                        Categories :
                        @foreach($post->categories as $category)
                            <div class="badge badge-secondary">{{ $category->name }}</div>
                        @endforeach
                    </div>

                </div>
                <h4>{{ $post->title }}</h4>
                <p>{{ $post->body }}</p>




            </div>
        </div>
    </div>
@endsection
