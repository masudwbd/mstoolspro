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
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Priority</th>
                                            <th>Service</th>
                                            <th>Message</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                @php
                                                    $user = DB::table('users')->where('id', $item->user_id)->first();
                                                @endphp
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $item->subject }}</td>
                                                <td>{{ $item->priority }}</td>
                                                <td>{{ $item->service }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td><img src="{{asset($item->image)}}" alt=""></td>
                                                <td>
                                                    <a href="{{route('admin.ticket.show', $item->id)}}" class="btn btn-info edit"> <i class="fas fa-eye"></i> </a>
                                                    <a href="{{ route('categories.delete',$item->id) }}" class="btn btn-danger"
                                                        id="delete"> <i class="fas fa-trash"></i>
                                                    </a>
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

@endsection
