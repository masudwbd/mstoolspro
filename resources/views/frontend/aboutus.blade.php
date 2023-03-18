@extends('layouts.app')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')
@section('content')
    <div class="aboutus-container">
        <div class="banner">
            <div class="d-flex text-center  justify-content-center align-items-center h-100 " style="">
                <h1 class="m-0 text-light" style="z-index: 1;font-size:60px">About Us <br> <span>
                        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium, nostrum!</p>
                    </span></h1>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6">
                    <img src="{{ asset('files/images/about.jpg') }}" style="width:100%" height="500px" alt="">
                </div>
                <div class="col-lg-6 mt-5">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae maiores consequuntur impedit quis officiis ipsa doloremque, maxime esse minus iusto veritatis nihil aliquam. Excepturi iste exercitationem sequi, porro itaque explicabo atque neque nulla, vel quo, ipsa ullam non eum? Magni praesentium eius quo quod alias optio culpa autem. Commodi enim dolorem, nesciunt quas voluptatibus omnis esse repellat sunt, eum cumque animi modi porro illum? Aspernatur itaque amet tenetur temporibus dolore minima ipsa harum quasi corporis nulla. Dolorem cum a obcaecati vitae esse. Ipsam provident quod modi recusandae fugiat. Nam omnis vero ab earum. Blanditiis ullam reiciendis fugiat dignissimos, fugit doloribus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae maiores consequuntur impedit quis officiis ipsa doloremque, maxime esse minus iusto veritatis nihil aliquam. Excepturi iste exercitationem sequi, porro itaque explicabo atque neque nulla, vel quo, ipsa ullam non eum? Magni praesentium eius quo quod alias optio culpa autem. Commodi enim dolorem, nesciunt quas voluptatibus omnis esse repellat sunt, eum cumque animi modi porro illum? Aspernatur itaque amet tenetur temporibus dolore minima ipsa harum quasi corporis nulla. Dolorem cum a obcaecati vitae esse. Ipsam provident quod modi recusandae fugiat. Nam omnis vero ab earum. Blanditiis ullam reiciendis fugiat dignissimos, fugit doloribus?</p>
                </div>
            </div>
        </div>
    </div>






    @include('layouts.frontend_partial.footer')
@endsection
