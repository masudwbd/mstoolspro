@extends('layouts.app')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')
@section('content')
    <div class="tools-container">
        <div class="container">
            <div class="row">
                @foreach ($tools as $tool)
                    <div class="col-lg-4">
                        <div class="course_card">
                            <div class="course_card_img">
                                <img src='{{ asset( $tool->thumbnail) }}', alt='course' />
                            </div>
                            <div class="course_card_content">
                                <h3 class="text-center">{{ $tool->title }}</h3>
                                <p class="text-center" style="font-size: 18px">{{ $tool->subtitle }}</p>
                            </div>
                            <div class="course_card_footer text-center">
                                <a href="{{route('tool.details' , $tool->id )}}" class="nav-item">Click To See Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('layouts.frontend_partial.footer')
@endsection
