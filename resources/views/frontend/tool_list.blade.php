@extends('layouts.app')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')
@section('content')
    <div class="tool-container vh-100">
        <div class="container">
            <div class="row">
                @if ($tools)
                    @foreach ($tools as $tool)
                        <div class="col-lg-4">
                            <a href="{{ route('tool.details', $tool->id) }}">
                                <div class="course_card" style="border:1px solid black;height:400px">
                                    <div class="course_card_img">
                                        <img src='{{ asset($tool->thumbnail) }}', alt='course' />
                                    </div>
                                    <div class="course_card_content">
                                        <h3 class="text-center">{{ $tool->title }}</h3>
                                        <p class="text-center" style="font-size: 18px">{{ $tool->subtitle }}</p>
                                        <div class="d-flex justify-content-center">
                                            @if ($tool->price === '0')
                                                <p class="text-center badge badge-primary" style="font-size: 24px">Free Tool
                                                </p>
                                            @else
                                                <p class="text-center badge badge-primary" style="font-size: 24px">Price:
                                                    {{ $tool->price }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <h1 class="text-center mt-5" style="font-size: 60px">No tool found with this name!</h1>
                @endif
            </div>
        </div>
    </div>

    @include('layouts.frontend_partial.footer')
@endsection
