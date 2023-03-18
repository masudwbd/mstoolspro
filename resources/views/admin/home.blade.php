@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <div class="row mt-5">
            @php
                $users = DB::table('users')->get();
            @endphp
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Users</span>
                        <span class="info-box-number">
                            {{ $users->count() }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $tools = DB::table('freetools')->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-toolbox"></i></span>

                    <div class="info-box-content">

                        <span class="info-box-text">Total Tools</span>
                        <span class="info-box-number">{{ $tools->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $tools = DB::table('freetools')
                        ->where('type', 'free')
                        ->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-brands fa-free-code-camp"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Free Tools</span>
                        <span class="info-box-number">{{ $tools->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $tools = DB::table('freetools')
                        ->where('type', 'paid')
                        ->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-hand-holding-dollar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Paid Tools</span>
                        <span class="info-box-number">{{ $tools->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $tools = DB::table('orders')
                        ->where('status', 'paid')
                        ->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">

                        <span class="info-box-text">Total Orders</span>
                        <span class="info-box-number">{{ $tools->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $orders = DB::table('orders')
                        ->where('date', date('m.d.y'))
                        ->get();
                @endphp
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Orders Today</span>
                        <span class="info-box-number">
                            {{ $orders->count() }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $tools = DB::table('tooldownloads')->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-download"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Downloads</span>
                        <span class="info-box-number">{{ $tools->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $tools = DB::table('tooldownloads')
                        ->where('date', date('d.m.y'))
                        ->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-download"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Downloads Today</span>
                        <span class="info-box-number">{{ $tools->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Recently Signed In Users</h5>

                    </div>
                    <!-- ./card-body -->
                    <div class="card-body">
                        @php
                            $recent_customers = DB::table('users')
                                ->where('is_admin', '0')
                                ->orderBy('id', 'DESC')
                                ->take(8)
                                ->get();
                        @endphp
                        <div class="row">
                            @foreach ($recent_customers as $customer)
                                @if ($customer->email_verified_at !== null)
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            @if ($customer->image == null)
                                                <div class="profile-picture text-center">
                                                    <img class="card-img-top" style="height: 50px; width:50px"
                                                        src="https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg">
                                                </div>
                                            @else
                                                <div class="profile-picture text-center">
                                                    <img class="card-img-top rounded-circle"
                                                        style="height: 50px; width:50px"
                                                        src="{{ asset($customer->image) }}">
                                                </div>
                                            @endif
                                            <div class="mt-2">
                                                <span class="description-text mt-4">{{ $customer->name }}</span>
                                                <h5 class="description-header">{{ $customer->email }}</h5>
                                            </div>

                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-lg-8">
                @php
                    $orders = DB::table('orders')
                        ->where('status', 'paid')
                        ->orderBy('date' , 'DESC')
                        ->get();
                @endphp
                <tbody>
                    <table class="table">
                        <h3 class="mt-5">Recent Orders</h3>
                        <thead>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>OrderId</th>
                                    <th>User Name</th>
                                    <th>Tool Name</th>
                                    <th>Date</th>
                                    <th>Tool Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    @php
                                        $user = DB::table('users')
                                            ->where('id', $item->user_id)
                                            ->first();
                                    @endphp
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $item->tool_name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->customer_email }}</td>
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
                </tbody>
            </div>
            <div class="col-lg-4 mt-5">
               <div class="card-header">
                <h3 class="mt-5">Recent Downloads</h3>
               </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                      @php
                          $tools = DB::table('tooldownloads')->orderBy('date' , 'ASC')->take(10)->get()
                      @endphp
                      @foreach ($tools as $tool)
                      @php
                          $tool = DB::table('freetools')->where('id', $tool->tool_id)->first();
                      @endphp
                        <li class="item">
                          <div class="product-img">
                            <img src="{{asset($tool->thumbnail)}}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <h6 class="product-title">{{$tool->title}}
                            <span class="product-description">
                              {{$tool->subtitle}}
                            </span>
                          </div>
                        </li>
                      @endforeach
    
                      <!-- /.item -->
                    </ul>
                  </div>
            </div>
        </div>
    </div>
@endsection
