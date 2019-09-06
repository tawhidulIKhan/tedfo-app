@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                @include('partials.breadcrumb')

                <div class="bg-white p-5 shadow-sm">
                    @include('partials.notification')

                    <div class="d-flex justify-content-between mb-4 align-items-center">
                        <h4 class="mb-3">Edit category</h4>
                        <div>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <form action="{{ route('category.update', $category) }}" method="post" class="border-top pt-4">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="category_name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="category_name" placeholder="Category name" name="name" value="{{ $category->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_slug">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="category_slug" placeholder="Category slug" name="slug" value="{{ $category->slug }}">
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
