@extends('layouts.app')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')

@section('content')

<div class="blog-container mt-5">
    <div class="container">
        <div class="tools-header pt-5">
            <h1 class="text-center text-dark" style="font-size: 55px">Our Blogs</h1>
            <p class="text-center" style="font-size: 24px">Blog that inspires you to get up and do better!</p>
        </div>

        <div class="blog-body">
            @foreach ($blogs as $blog)
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <img class="img mt-4" src="{{ $blog->thumbnail }}" height="600px" width="100%" />
                    </div>
                    <div class="col-lg-6">
                        <h1>{{ $blog->title }}</h1>
                        <p>{{ $blog->description }}</p>
                        <p>Published On: {{ $blog->date }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

    @include('layouts.frontend_partial.footer')
@endsection
