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
                                            <th>Currency</th>
                                            <th>Phone One</th>
                                            <th>Phone Two</th>
                                            <th>Main Email</th>
                                            <th>Support Email</th>
                                            <th>Logo</th>
                                            <th>Address</th>
                                            <th>Facebook</th>
                                            <th>Twitter</th>
                                            <th>Instagram</th>
                                            <th>Youtube</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $settings->currency }}</td>
                                            <td>{{ $settings->phone_one }}</td>
                                            <td>{{ $settings->phone_two }}</td>
                                            <td>{{ $settings->main_email }}</td>
                                            <td>{{ $settings->support_email }}</td>
                                            <td>
                                                <img src="{{ $settings->logo }}" style="height: 50px" alt="">
                                            </td>
                                            <td>{{ $settings->address }}</td>
                                            <td>{{ $settings->facebook }}</td>
                                            <td>{{ $settings->twitter }}</td>
                                            <td>{{ $settings->instagram }}</td>
                                            <td>{{ $settings->youtube }}</td>
                                            <td>
                                                <a href="#" class="btn btn-info edit" data-id=""
                                                    data-toggle="modal" data-target="#editModal" id="edit"> <i
                                                        class="fas fa-edit"></i> </a>
                                                </a>
                                            </td>
                                        </tr>
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


    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{ route('settings.update', $settings->id) }}"
                        enctype="multipart/form-data" method="Post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">currency</label>
                                        <select type="text" value="{{ $settings->currency }}" class="form-control"
                                            name="currency">
                                            <option value="£" {{ $settings->currency == '£' ? 'selected' : '' }}>
                                                Pound</option>
                                            <option value="$" {{ $settings->currency == "$" ? 'selected' : '' }}>
                                                USD</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone One</label>
                                        <input type="text" value="{{ $settings->phone_one }}" class="form-control"
                                            name="phone_one" placeholder="Enter Phone One">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Two</label>
                                        <input type="text" value="{{ $settings->phone_two }}" class="form-control"
                                            name="phone_two" placeholder="Enter Phone Two">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Main Email</label>
                                        <input type="text" value="{{ $settings->main_email }}" class="form-control"
                                            name="main_email" placeholder="Enter Main Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Support Email</label>
                                        <input type="text" value="{{ $settings->support_email }}" class="form-control"
                                            name="support_email" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Adress</label>
                                        <input type="address" value="{{ $settings->address }}" class="form-control"
                                            name="address" placeholder="Enter address">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Facebook</label>
                                        <input type="address" value="{{ $settings->facebook }}" class="form-control"
                                            name="facebook" placeholder="Enter Facebook">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Twitter</label>
                                        <input type="address" value="{{ $settings->twitter }}" class="form-control"
                                            name="twitter" placeholder="Enter Twitter">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Instagram</label>
                                        <input type="address" value="{{ $settings->instagram }}" class="form-control"
                                            name="instagram" placeholder="Enter Instagram">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Youtube</label>
                                        <input type="address" value="{{ $settings->youtube }}" class="form-control"
                                            name="youtube" placeholder="Enter Youtube">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Logo</label>
                                        <input type="file" name="logo">
                                        <input type="hidden" value="{{ $settings->logo }}" name="old_logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
