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
                    <div class="form-group col-3">
                        <label>Service</label>
                        <select class="form-control submitable" name="service" id="service">
                            <option value="0" selected>All</option>
                            <option value="technical">Technical</option>
                            <option value="setup">Setup</option>
                            <option value="others">Others</option>
                        </select>
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
                                            <th>Name</th>
                                            <th>Subject</th>
                                            <th>Priority</th>
                                            <th>Service</th>
                                            <th>Message</th>
                                            <th>Image</th>
                                            <th>Date</th>
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
                    "url": "{{ route('admin.ticket.index') }}",
                    "data": function(e) {
                        e.date = $("#date").val();
                        e.service = $("#service").val();

                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'subject',
                        name: 'subject'
                    },
                    {
                        data: 'priority',
                        name: 'priority'
                    },
                    {
                        data: 'service',
                        name: 'service'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, full, meta) {
                            return "<img src=\"" + data + "\"  height=\"30\" />";
                        }
                    },
                    {
                        data: 'date',
                        name: 'date'
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



        $('body').on('click', '.edit', function() {
            let subcat_id = $(this).data('id');
            $.get("freetools/edit/" + subcat_id, function(data) {
                $("#modal-body").html(data);
            });
        });
    </script>
@endsection
