      
@php
$settings = DB::table('settings')->first();
@endphp

      
      {{-- footer  --}}
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="single_footer">
                            <h4>Services</h4>
                            <ul>
                                <li><a href="#">Lorem Ipsum</a></li>
                                <li><a href="#">Simply dummy text</a></li>
                                <li><a href="#">The printing and typesetting </a></li>
                                <li><a href="#">Standard dummy text</a></li>
                                <li><a href="#">Type specimen book</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--- END COL -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single_footer single_footer_address">
                            <h4>Page Link</h4>
                            <ul>
                                <li><a href="{{route('tools.all')}}">Tools</a></li>
                                <li><a href="{{route('tools.free')}}">Free Utilities</a></li>
                                <li><a href="{{route('frontend.blogs.all')}}">Blogs </a></li>
                                <li><a href="{{route('frontend.about_us')}}">About Us</a></li>
                                <li><a href="{{route('frontend.contact_us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--- END COL -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single_footer single_footer_address">
                            <h4>Subscribe today</h4>
                            <div class="signup_form">
                                <form action="#" class="subscribe">
                                    <input type="text" class="subscribe__input" placeholder="Enter Email Address">
                                    <button type="button" class="subscribe__btn"><i
                                            class="fas fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="social_profile">
                            <ul>
                                <li><a href="{{$settings->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{$settings->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{$settings->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{$settings->youtube}}"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--- END COL -->
                </div>
                <!--- END ROW -->
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <p class="copyright">Copyright © 2023 <a href="masudwbd.com">masudwbd</a>.</p>
                    </div>
                    <!--- END COL -->
                </div>
                <!--- END ROW -->
            </div>
            <!--- END CONTAINER -->
        </div>