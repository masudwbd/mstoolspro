@extends('layouts.admin')
@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tools</h1>
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
                                <h3 class="card-title">All Tools List Here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>SubTitle</th>
                                            <th>Thumbnail</th>
                                            <th>Price</th>
                                            <th style="width: 25%">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                @php
                                                    $category = DB::table('categories')->where('id', $item->category_id )->first();
                                                @endphp
                                                <td>{{ $category ->name }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->subtitle }}</td>
                                                <td>
                                                    <img style="height: 50px" src="{{ $item->thumbnail }}" alt="">
                                                </td>
                                                <td>{{ $item->price }}</td>
                                                <td style="width: 25%">{{ $item->description}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info edit" data-id="{{$item->id}}" data-toggle="modal" data-target="#editModal" id="edit"> <i class="fas fa-edit"></i> </a>
                                                    <a href="{{ route('tools.delete',$item->id) }}" onclick="return confirm('Are you sure you want to delete this post?')" class="btn btn-danger "
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


    {{-- Edit Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tool</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        $('body').on('click', '.edit', function() {
            let cat_id = $(this).data('id');
            $.get("freetools/edit/" + cat_id, function(data) {
                $(".modal-body").html(data);
            });
        });
    </script>
@endsection
