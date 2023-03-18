@extends('layouts.app')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')
@section('content')
    <div class="aboutus-container">
        <div class="contact-banner">
            <div class="d-flex text-center  justify-content-center align-items-center h-100 " style="">
                <h1 class="m-0 text-light" style="z-index: 1;font-size:60px">Contact Us <br> <span>
                        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium, nostrum!</p>
                    </span></h1>
            </div>
        </div>
        <div class="container mt-5">
            <h1 class="text-center text-dark" style="font-size: 60px">Let's Start A Convesation</h1>
            <div class="row mt-5">
                <div class="col-6">
                    <h1 class="text-dark mt-3">Ask how can we help you?</h1>
                    <p class="lead mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia culpa quam quasi a
                        soluta ratione expedita aut dolorum ipsam, voluptatem exercitationem iure ut, libero ipsum? Error
                        ratione, inventore voluptatum perferendis cum veritatis atque aspernatur minus, facere tempore
                        doloremque mollitia <br> saepe natus voluptates pariatur quaerat vel rerum animi esse distinctio
                        non. Possimus aliquam labore quis repellendus perferendis provident, quae in odio blanditiis minima
                        aspernatur rerum dolor accusantium tempore nemo, at sapiente. Harum alias nihil <br> </p>
                </div>
                <div class="col-md-6">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <p class="text-center">{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('contact.message.store') }}" class="mt-4" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="name" id="" class="form-control"
                                placeholder="Enter Your Full Name" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="text" name="email" id="" class="form-control"
                                placeholder="Enter Your Email Address" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Enter A Message</label>
                            <textarea name="message" class="form-control" id=""></textarea>
                        </div>
                        <input type="submit" value="Send Message" class="btn btn-block btn-success mt-4">
                    </form>
                </div>
            </div>
        </div>
    </div>






    @include('layouts.frontend_partial.footer')
@endsection
