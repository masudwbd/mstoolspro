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
                        </div>

                        <div class="card-body ">
                            <h3 class="mt-5">Recent Orders</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>OrderId</th>
                                        <th>Date</th>
                                        <th>Tool Name</th>
                                        <th>Tool Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->order_id }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->tool_name }}</td>
                                            <td>{{ $item->tool_price }}</td>
                                            <td>
                                                @if ($item->delivered === null)
                                                    <span class="badge badge-warning p-2">Pending</span>
                                                @else
                                                    <span class="badge badge-success p-2">Delivered</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
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
