@extends('layouts.app')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')

@section('content')
    <div class="user-profile mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    @include('frontend.profile.sidebar')
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Dashboard') }}
                            <a href="{{ route('user.create.ticket') }}" style="float:right;"><i
                                    class="fas fa-pencil-alt"></i>Create Ticket</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3>Your Ticket Details</h3>
                                    <h6>Subject: {{ $ticket->subject }}</h6>
                                    <h6>Service: {{ $ticket->service }}</h6>
                                    <h6>Priority: {{ $ticket->priority }}</h6>
                                    <h6>Message: {{ $ticket->message }}</h6>
                                </div>
                                <div class="col-lg-4">
                                    <img src="{{ asset($ticket->image) }}" style="height: 150px;width:200px"
                                        alt="href="{{ asset($ticket->image) }}"">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>All Reply Messages</h4>
                        </div>
                        <div class="card-body " style="overflow-y: scroll;height:300px">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6>name</h6>
                                </div>
                                @foreach ($replies as $reply)
                                    <div class="card mt-3">
                                        <div class="card-header bg-primary" style="background-color: #fff;color:black">
                                            @php
                                                $user = DB::table('users')
                                                    ->where('id', $reply->user_id)
                                                    ->first();
                                            @endphp
                                            <h6 class="text-light">{{ $user->name }}</h6>
                                        </div>
                                        <div class="card-body" style="background-color: #fff;color:black">
                                            <div class="reply " style="border-left:5px solid #007bff!important">
                                                <p class="ml-3">{{ $reply->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <form action="{{ route('admin.ticket.reply') }}" method="POST">
                            @csrf
                            <div class="d-flex justify-content-between mx-4 pb-3 pt-3">
                                <div class="">
                                    <input type="text" style="width: 250%" class="form-control" name="message"
                                        placeholder="type your message">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                </div>
                                <div class="">
                                    <button class="btn-success " style="padding: 7px 60px 7px 60px;">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>



    @include('layouts.frontend_partial.footer')
@endsection
