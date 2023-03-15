@extends('layouts.app')

@section('content')
    <div class="register-container vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="margin-top: 50px">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    <p class="" style="font-size: 24px">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </p>
                                </div>
                            @endif
                            <p class="" style="font-size: 24px">
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                            </p>
                            <p class="" style="font-size: 24px">
                                {{ __('If you did not receive the email') }},
                            </p>
                           
                           
                            <form method="POST" action="{{ route('verification.resend') }}" >
                                @csrf
                                <button type="submit"
                                    class="btn btn-warning" style="text-align:center">{{ __('click here to request another') }}
                                </button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
