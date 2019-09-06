@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
           @include('partials.sidebar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="h-100 bg-white shadow-sm p-5">
                    <h3>Hi, {{ Auth::user()->name }}</h3>
                </div>
            </main>
        </div>
    </div>
@endsection
