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
                        <h4 class="mb-3">All Categories</h4>
                        <div>
                            <a href="{{ route('category.create') }}" class="btn btn-primary">Create new category</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success mr-2">Edit</a>
                                    <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.getElementById('delete-category-{{ $category->id }}').submit();">
                                        <i class="fa fa-lg fa-trash"></i>
                                        Del
                                    </a>
                                    <form method="POST" action="{{ route('category.delete', $category->id) }}" id="delete-category-{{ $category->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @empty
                            <p>No category found</p>
                        @endforelse

                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function deleteCategory(){
            document.getElementById("myForm").submit();
        }
    </script>
@endsection
