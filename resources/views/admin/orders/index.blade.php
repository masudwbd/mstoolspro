@extends('layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Categories List Here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Order Id</th>
                                            <th>Customer Name</th>
                                            <th>Tool Name</th>
                                            <th>Date</th>
                                            <th>Customer Email</th>
                                            <th>Status</th>
                                        </tr>
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
                                                        <form action="{{ route('order.delivered') }}">
                                                            <div class="d-flex">
                                                                <input type="text" name="delivered"
                                                                    value="Mark As Delivered">
                                                                <input type="hidden" value="{{ $item->id }}"
                                                                    name="id">
                                                                <button type="submit">
                                                                    <i class="fa-solid fa-paper-plane ml-3"
                                                                        style="color:green;font-size:18px;"></i>
                                                                </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('order.not.delivered') }}">
                                                            <div class="d-flex">
                                                                <input type="text" name="delivered"
                                                                    value="Mark As Not Delivered Yet">
                                                                <input type="hidden" value="{{ $item->id }}"
                                                                    name="id">
                                                                <button type="submit">
                                                                    <i class="fa-solid fa-truck-ramp-box ml-3"
                                                                        style="color:red;font-size:18px;"></i>
                                                                </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>

    <script src="https://kit.fontawesome.com/150f6eaf61.js" crossorigin="anonymous"></script>
@endsection
