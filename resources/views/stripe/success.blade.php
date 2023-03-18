@extends('layouts.app')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')
@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="d-flex justify-content-center">
                <div class="">
                    <div class="d-flex justify-content-center">
                        <img src="https://img.freepik.com/free-photo/design-space-black-board_53876-14488.jpg?w=1380&t=st=1679050348~exp=1679050948~hmac=267cae2f557a93726a40c96bb97ea24f7ed9c7520e296b91613827a42539ad12" style="width: 450px" alt="">
                    </div>
                    <h1 class="text-center " style="margin-top: 60px">Your tool will be sent to your email
                        within 12hours!</h1>
                </div>
              
            </div>
        </div>
    </div>

    @include('layouts.frontend_partial.footer')
@endsection
