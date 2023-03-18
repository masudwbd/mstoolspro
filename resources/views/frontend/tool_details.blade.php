    @extends('layouts.app')
    @include('layouts.frontend_partial.header')
    @include('layouts.frontend_partial.navbar')

    @section('content')

        <style type="text/css">
            .checked {
                color: orange;
            }
        </style>
        @php
            $review_5 = DB::table('toolreviews')
                ->where('tool_id', $data->id)
                ->where('rating', 5)
                ->count();
            $review_4 = DB::table('toolreviews')
                ->where('tool_id', $data->id)
                ->where('rating', 4)
                ->count();
            $review_3 = DB::table('toolreviews')
                ->where('tool_id', $data->id)
                ->where('rating', 3)
                ->count();
            $review_2 = DB::table('toolreviews')
                ->where('tool_id', $data->id)
                ->where('rating', 2)
                ->count();
            $review_1 = DB::table('toolreviews')
                ->where('tool_id', $data->id)
                ->where('rating', 1)
                ->count();
            
            $sum_rating = DB::table('toolreviews')
                ->where('tool_id', $data->id)
                ->sum('rating');
            $count_rating = DB::table('toolreviews')
                ->where('tool_id', $data->id)
                ->count('rating');
            $reviews = DB::table('toolreviews')->get();
        @endphp

        <div class="tool-details-container">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-lg-4">
                        <img src="{{ asset($data->thumbnail) }}" style="width:100%;height:350px" alt="">
                    </div>
                    <div class="col-lg-8">
                        <div class="details-container">
                            <h1 class="">{{ $data->title }}</h1>
                            <p style="font-size: 20px">
                                {{ $data->subtitle }}
                            </p>
                            <div class="">
                                @if ($sum_rating != null)
                                    @if (intval($sum_rating / $count_rating) == 5)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    @elseif(intval($sum_rating / $count_rating) >= 4 && intval($sum_rating / 5) < $count_rating)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                    @elseif(intval($sum_rating / $count_rating) >= 3 && intval($sum_rating / 5) < $count_rating)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                    @elseif(intval($sum_rating / $count_rating) >= 2 && intval($sum_rating / 5) < $count_rating)
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                    @else
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star "></span>
                                    @endif
                                @endif
                            </div>
                            @php
                                $category = DB::table('categories')
                                    ->where('id', $data->category_id)
                                    ->first();
                            @endphp
                            <h6 class="mt-3">Category : {{ $category->name }}</h6>
                            @if ($data->price == 0)
                                <h3 class="py-3" style="color: #0D5EAF">Download For Free</h3>
                            @else
                                <h3 class="py-3" style="color: #0D5EAF">Price <span>$20</span></h3>
                            @endif
                            <div class="all-tools mt-4">
                                @if (Auth::user())
                                    @if ($data->type === 'free')
                                        <a href="{{ route('download', $data->id) }}">
                                            <button class="btn">Click To Download Now </button>
                                        </a>
                                    @elseif($data->type === 'paid')
                                        <form action={{ route('payment', $data->id) }} method="POST">
                                            @csrf
                                            <button type="submit" class="btn">Click To Purchase Now</button>
                                        </form>
                                    @endif
                                @else
                                    <a href="{{ route('register') }}">
                                        <button class="btn">Sign Up To Download</button>
                                    </a>
                                @endif
                            </div>
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
                                            <div class="rating_r rating_r_4 product_rating my-2">
                                                @if ($sum_rating != null)
                                                    @if (intval($sum_rating / $count_rating) == 5)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                    @elseif(intval($sum_rating / $count_rating) >= 4 && intval($sum_rating / 5) < $count_rating)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star "></span>
                                                    @elseif(intval($sum_rating / $count_rating) >= 3 && intval($sum_rating / 5) < $count_rating)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star "></span>
                                                        <span class="fa fa-star "></span>
                                                    @elseif(intval($sum_rating / $count_rating) >= 2 && intval($sum_rating / 5) < $count_rating)
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star "></span>
                                                        <span class="fa fa-star "></span>
                                                        <span class="fa fa-star "></span>
                                                    @else
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star "></span>
                                                        <span class="fa fa-star "></span>
                                                        <span class="fa fa-star "></span>
                                                        <span class="fa fa-star "></span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('review.store') }}" method="POST">
                                        @csrf
                                        @if (Auth::user())
                                            <div class="form-group">
                                                <label for="review">Write Your Review</label>
                                                <textarea name="review" class="form-control" id="" cols="30" rows="4"></textarea>
                                                <input type="hidden" value="{{ $data->id }}" name="tool_id"
                                                    value="">
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
                                <div class="col-6">
                                    <div class="all-review-container">
                                        @foreach ($reviews as $row)
                                            @php
                                                $user = DB::table('users')
                                                    ->where('id', $row->user_id)
                                                    ->first();
                                            @endphp
                                            <div class="card-header">
                                                {{ $user->name }}
                                            </div>
                                            <div class="card-body">
                                                {{ $row->review }}
                                                @if ($row->rating == 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                @elseif($row->rating == 4)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($row->rating == 3)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($row->rating == 2)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($row->rating == 1)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @endif

                                            </div>
                                        @endforeach
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

            <div class="related-products">
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
            <div class="chatbox">
                <i class="fas fa-comment-alt text-right" style="color:black"></i>
            </div>
        </div>

        @include('layouts.frontend_partial.footer')
    @endsection
