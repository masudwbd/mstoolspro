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
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa-duotone fa-gear"></i></span>

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
                    $tools = DB::table('freetools')->where('type' , 'free')->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Free Tools</span>
                        <span class="info-box-number">{{$tools->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $tools = DB::table('freetools')->where('type' , 'paid')->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Paid Tools</span>
                        <span class="info-box-number">{{$tools->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
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
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

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
                    $tools = DB::table('freetools')->where('type' , 'free')->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Free Tools</span>
                        <span class="info-box-number">{{$tools->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                @php
                    $tools = DB::table('freetools')->where('type' , 'paid')->get();
                @endphp
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Paid Tools</span>
                        <span class="info-box-number">{{$tools->count()}}</span>
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
                      $recent_customers = DB::table('users')->where('is_admin', '0')->orderBy('id', 'DESC')->take(8)->get()
                  @endphp
                  <div class="row">
                    @foreach ($recent_customers as $customer)
                    @if($customer->email_verified_at !== Null)
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        @if($customer->image==Null)
                        <div class="profile-picture text-center">
                            <img class="card-img-top" style="height: 50px; width:50px" src="https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg">
                        </div>
                        @else
                            <div class="profile-picture text-center">
                                <img class="card-img-top rounded-circle" style="height: 50px; width:50px" src="{{asset($customer->image)}}">
                            </div>
                        @endif
                          <div class="mt-2">
                            <span class="description-text mt-4">{{$customer->name}}</span>
                            <h5 class="description-header">{{$customer->email}}</h5>
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
    </div>
@endsection
