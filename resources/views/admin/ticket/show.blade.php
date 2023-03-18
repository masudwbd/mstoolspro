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
                    <div class="col-10 mx-auto">
                        <div class="card-header" style="border: 1px solid black;padding:20px">
                            <div class="row">
                                <div class="col-lg-8">
                                    @php
                                        $user = DB::table('users')->where('id', $data->id)->first()
                                    @endphp
                                    <h3>{{$user->name}} Ticket Details</h3>
                                    <h6>Subject: {{ $data->subject }}</h6>
                                    <h6>Service: {{ $data->service }}</h6>
                                    <h6>Priority: {{ $data->priority }}</h6>
                                    <h6>Message: {{ $data->message }}</h6>
                                </div>
                                <div class="col-lg-4">
                                    <img src="{{ asset($data->image) }}" style="height: 150px;width:200px"
                                        alt="href="{{ asset($data->image) }}"">
                                </div>
                            </div>
                        </div>
                        <div class="card-body mt-5">
                           <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h5>Reply Text Message</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('admin.ticket.reply')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Message <span
                                                        style="color:'red'">*</span></label>
                                                <textarea name="message" class="form-control"></textarea>
                                                <input type="hidden" name="ticket_id" value="{{$data->id}}">
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Image <span
                                                        style="color:'red'">*</span></label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <a href="" class="btn btn-danger">Close</a>
                                                <div class="submit">
                                                    <input type="submit" class="btn btn-info" value="Reply Message">
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header  bg-primary">
                                        <h5>All Reply Messages</h5>
                                    </div>
                                    <div class="card-body " style="overflow-y:scroll;height:300px">
                                        @foreach($replies as $reply)
                                        @php
                                            $user = DB::table('users')->where('id', $data->user_id)->first()
                                        @endphp
                                        <div class="card mt-3">
                                            <div class="card-header" style="background-color: #fff;color:black">
                                                <h6>{{$user->name}}</h6>
                                            </div>
                                            <div class="card-body" style="background-color: #fff;color:black">
                                                <div class="reply " style="border-left:5px solid #007bff!important">
                                                    <p class="ml-3">{{$reply->message}}</p>
                                                    <p class="ml-3">Replied Date: {{$reply->date}}</p>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                           </div>
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
