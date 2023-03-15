@extends('layouts.app')
@include('layouts.frontend_partial.header')
@include('layouts.frontend_partial.navbar')

@section('content')

<div class="user-profile mt-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-4">
                @include('frontend.profile.sidebar')
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Dashboard') }}
                        <a href="" style="float:right;"><i class="fas fa-pencil-alt"></i> Write a review</a>
                    </div>
                   
                    <div class="card-body ">
                        <h3 class="mt-5">Recent Orders</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <th>Date</th>
                                    <th>Total Tool</th>
                                    <th>Total Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>3/15/22</td>
                                    <td>1</td>
                                    <td>20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layouts.frontend_partial.footer')
@endsection