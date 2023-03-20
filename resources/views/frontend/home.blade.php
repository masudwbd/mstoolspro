@extends('layouts.app')
@section('content')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')
    @php
        $settings = DB::table('settings')->first();
    @endphp


    {{-- header  --}}

    <div class="main-header-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-content">
                        <h1 class="text-light text-center ">Welcome to MsToolsPro</h1>
                        <p class="text-light text-center lead ">Study, Learn, Teach while playing</p>
                    </div>
                    <div class="buttons-container mt-3">
                        <div class="buttons-container d-flex justify-content-between text-center">
                            <div class="all-tools mr-3">
                                <a href="{{ route('tools.all') }}">
                                    <button class="btn">See Tools</button>
                                </a>
                            </div>
                            @if (Auth::user())
                                <a href="{{ route('frontend.contact_us') }}">
                                    <div class="sign-up ml-3">
                                        <button>
                                            Contact Us
                                        </button>
                                    </div>
                                </a>
                            @else
                                <div class="sign-up ml-3">
                                    <button>
                                        <a href="{{ route('register') }}">
                                            Sign Up
                                        </a>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- cards  --}}

    <div class="cards-container">
        <div class="container">
            <div class="header-content-below ">
                <p class="text-center " style="margin-bottom: 0px">Convert Word tests to PowerPoint presentations</p>
                <p class="text-center ">Make you presentations attractive by adding drag and drop activity</p>
            </div>
        </div>
        {{-- cards for each type tools --}}

        <div class="row mx-auto pt-2" style="width: 75%">
            <!-- DEMO 3 Item-->
            <div class="col-lg-4 mb-3 mb-lg-0">
                <a href="{{ route('tools.all') }}">
                    <div class="hover hover-3 text-white rounded"><img
                            src="https://img.freepik.com/premium-vector/spreadsheet-design-vector-illustration_24877-31338.jpg?size=626&ext=jpg&uid=R94946501&ga=GA1.2.191617848.1677514035&semt=popular"
                            alt="">
                        <div class="hover-overlay"></div>
                        <div class="hover-3-content px-5 py-4">
                            <h3 class="hover-3-title text-uppercase font-weight-bold mb-1"><span
                                    class="font-weight-light">All
                                </span>Tools</h3>
                            <p class="hover-3-description small text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur
                                <br>adipisicing elit.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- DEMO 3 Item    -->
            <div class="col-lg-4">
                <a href={{ route('tools.free') }}>
                    <div class="hover hover-3 text-white rounded"><img src="files/images/free.jpg" alt="">
                        <div class="hover-overlay"></div>
                        <div class="hover-3-content px-5 py-4">
                            <h3 class="hover-3-title text-uppercase font-weight-bold mb-1"><span
                                    class="font-weight-light">Free
                                </span>Tools</h3>
                            <p class="hover-3-description small text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur
                                <br>adipisicing elit.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{ route('tools.paid') }}">
                    <div class="hover hover-3 text-white rounded"><img src="files/images/premium.jpg" alt="">
                        <div class="hover-overlay"></div>
                        <div class="hover-3-content px-5 py-4">
                            <h3 class="hover-3-title text-uppercase font-weight-bold mb-1"><span
                                    class="font-weight-light">Premium
                                </span>Tools</h3>
                            <p class="hover-3-description small text-uppercase mb-0">Lorem ipsum dolor sit amet, consectetur
                                <br>adipisicing elit.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- tools  --}}
    <div class="tools-container">
        <div class="container">
            <div class="tools-header pt-5">
                <h1 class="text-center text-light">Our Tools</h1>
                <p class="text-center lead text-light">Creation that brings speed</p>
            </div>
            @php
                $tools = DB::table('freetools')->get();
            @endphp
            <div class="">
                <div class="row">
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
                </div>
            </div>
        </div>
    </div>

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
