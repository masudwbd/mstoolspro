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
                                        @php
                                            $categories = DB::table('categories')->get();
                                        @endphp
                                        <form action={{ route('tools.store') }} method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">Type</label>
                                                        <select class="form-control" name="type" id="">
                                                            <option value="free">Free</option>
                                                            <option value="paid">Paid</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Category</label>
                                                        <select class="form-control" name="category_id" id="">
                                                            @foreach ($categories as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tool Title</label>
                                                        <input type="text" name="title" id=""
                                                            class="form-control" placeholder="Enter Tool Title"
                                                            aria-describedby="helpId">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tool SubTitle</label>
                                                        <input type="text" name="subtitle" id=""
                                                            class="form-control" placeholder="Enter Tool SubTitle"
                                                            aria-describedby="helpId">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tool Thumbnail</label>
                                                        <input type="file" name="thumbnail" id=""
                                                            class="form-control" placeholder="Enter Tool Thumbnail"
                                                            aria-describedby="helpId">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="">Tool Price</label>
                                                        <input type="text" name="price" id=""
                                                            class="form-control" placeholder="Enter Tool Price"
                                                            aria-describedby="helpId">
                                                        <small style="color:red">Keep the price to 0, if the tool is for free!</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tool Description</label>
                                                        <input type="text" name="description" id=""
                                                            class="form-control" placeholder="Enter Tool Description"
                                                            aria-describedby="helpId">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tool Video</label>
                                                        <input type="text" name="video" id=""
                                                            class="form-control" placeholder="Enter Tool Video"
                                                            aria-describedby="helpId">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Upload Tool</label>
                                                        <input type="file" name="tool" id=""
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-success btn-block mt-5" value="Add Tool">
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
