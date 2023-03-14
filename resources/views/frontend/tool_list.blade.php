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
                                <img src='{{ $tool->thumbnail }}', alt='course' />
                            </div>
                            <div class="course_card_content">
                                <h3>{{ $tool->title }}</h3>
                                <p style="font-size: 18px">{{ $tool->subtitle }}</p>
                            </div>
                            <div class="course_card_footer">
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
