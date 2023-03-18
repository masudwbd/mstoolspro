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
                                <h3 class="card-title">Add New Tool</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="p-5">
                                        <form action={{ route('blog.store') }} method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 mx-auto">
                                                    <div class="form-group">
                                                        <label for="">Blog Title</label>
                                                        <input type="text" name="title" id=""
                                                            class="form-control" placeholder="Enter Blog Title"
                                                            aria-describedby="helpId">
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                    <div class="form-group">
                                                        <label for="">Blog Description</label>
                                                        <textarea class="form-control" placeholder="Enter Blog Description" id="exampleFormControlTextarea1" name="description" rows="5"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Blog Thumbnail</label>
                                                        <input type="file" name="thumbnail" id=""
                                                            class="form-control" placeholder="Enter Blog Thumbnail"
                                                            aria-describedby="helpId">
                                                    </div>
                                                    <input type="submit" class="btn btn-success btn-block mt-5" value="Add Tool">
                                                </div>
                                            </div>
                                           
                                        </form>
                                    </div>
                                </div>
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
