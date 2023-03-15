    @extends('layouts.app')
    @include('layouts.frontend_partial.header')
    @include('layouts.frontend_partial.navbar')

    @section('content')
        <div class="tool-details-container" style="background-color: #F0FAF8">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-lg-4">
                        <img src="{{ asset($data->thumbnail) }}" style="width:100%;height:350px" alt="">
                    </div>
                    <div class="col-lg-8">
                        <div class="details-container">
                            <h1 class="">{{ $data->title }}</h1>
                            @php
                                $category = DB::table('categories')
                                    ->where('id', $data->category_id)
                                    ->first();
                            @endphp
                            <h6 class="mt-3">Category : {{ $category->name }}</h6>
                            @if($data->price == 0)
                            <h3 class="py-3" style="color: #0D5EAF">Download For Free</h3>
                            @else
                            <h3 class="py-3" style="color: #0D5EAF">Price <span>$20</span></h3>
                            @endif
                            <p style="font-size: 20px">
                                {{ $data->subtitle }}
                            </p>
                            <div class="all-tools mt-4">
                                @if (Auth::user())
                                    @if ($data->type === 'free')
                                        <a href="{{ route('download', $data->id) }}">
                                            <button class="btn">Click To Download Now </button>
                                        </a>
                                    @elseif($data->type === 'paid')
                                        <a href="">
                                            <button class="btn"> Purchase Now </button>
                                        </a>
                                    @endif
                                @else
                                    <a href="{{ route('register') }}">
                                        <button class="btn">Sign Up To Download</button>
                                    </a>
                                @endif
                            </div>
                            <a href="">
                                <p class="mt-4" style="font-size: 20px"> <i class="fa fa-heart"
                                        style="color: #0D5EAF"></i>
                                    Add To Wishlist</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-5">
                        <iframe width="100%" height="350px" src="{{ $data->video }}" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-md-7">
                        <div class="documentation-container" style="font-size: 24px">
                            <p>{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-review-section py-5">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h4>Rating & Reviews of Quiz Generator</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="average-review ml-3">
                                        <h4>Average Review Of Quiz Generator</h4>
                                        <div class="pb-4">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                    </div>
                                    <form action="">
                                        @if (Auth::user())
                                            <div class="form-group">
                                                <label for="review">Write Your Review</label>
                                                <textarea name="review" class="form-control" id="" cols="30" rows="4"></textarea>
                                                <input type="hidden" name="product_id" value="">
                                            </div>
                                            <div class="form-group">
                                                <select name="rating" class="form-control"
                                                    style="min-width:150px;margin-left:0px">
                                                    <option selected disabled>Select Rating</option>
                                                    <option value="1">1 Start</option>
                                                    <option value="2">2 Start</option>
                                                    <option value="3">3 Start</option>
                                                    <option value="4">4 Start</option>
                                                    <option value="5">5 Start</option>
                                                </select>
                                            </div>
                                            <input class="btn btn-success" type="submit" value="sumbit your reveiew">
                                        @else
                                            <small>You have to be logged in to leave a review</small>
                                        @endif
                                    </form>
                                </div>
                                <div class="col-lg-6">
                                    <div class="all-review-container">
                                        <div class="review-container p-2" style="border:1px solid black">
                                            <div style="font-size: 18px; font-weight:bold">
                                                sakib
                                            </div>
                                            <div class="py-3">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <p style="font-size: 16px">Astoninshing tool to make quiz presentation</p>
                                        </div>
                                        <div class="review-container p-2" style="border:1px solid black">
                                            <div style="font-size: 18px; font-weight:bold">
                                                sakib
                                            </div>
                                            <div class="py-3">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <p style="font-size: 16px">Astoninshing tool to make quiz presentation</p>
                                        </div>
                                        <div class="review-container p-2" style="border:1px solid black">
                                            <div style="font-size: 18px; font-weight:bold">
                                                sakib
                                            </div>
                                            <div class="py-3">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <p style="font-size: 16px">Astoninshing tool to make quiz presentation</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                    </div>

                </div>


            </div>

            @php
                $tools = DB::table('freetools')->get();
            @endphp

            <div class="related-products mb-5">
                <div class="container">
                    <h1 class=" mb-5">Related Products</h1>
                    <div class="owl-carousel owl-theme">
                        @foreach ($tools as $tool)
                            <div class="item">
                                <img src="{{ asset($tool->thumbnail) }}" style="height: 200px" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.frontend_partial.footer')
    @endsection
