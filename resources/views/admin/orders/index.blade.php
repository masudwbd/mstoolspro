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
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row px-3">
                    <div class="form-group col-3">
                        <label>Date</label>
                        <input type="date" name="date" id="date" class="form-control submitable">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Tools List Here</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped ytable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Order Id</th>
                                            <th>User</th>
                                            <th>Tool</th>
                                            <th>Price</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
    <div class="modal fade" class="" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_child_category">Edit Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal-body">

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        $(function tools() {
            var table = $('.ytable').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": true,
                "ajax": {
                    "url": "{{ route('orders.all') }}",
                    "data": function(e) {
                        e.date = $("#date").val();
                    }
                },
                columns: [{
                    
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'order_id',
                        name: 'order_id'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'tool_name',
                        name: 'tool_name'
                    },
                    {
                        data: 'tool_price',
                        name: 'tool_price'
                    },
                    {
                        data: 'customer_email',
                        name: 'customer_email'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'delivered',
                        name: 'delivered'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });

        $(document).on('change', '.submitable', function() {
            $('.ytable').DataTable().ajax.reload();
        });
    </script>
@endsection
