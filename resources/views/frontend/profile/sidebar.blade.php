<div class="card" style="height: 715px">
    <div class="card-header">Welcome , {{ Auth::user()->name }}</div>
    <div class="card-body">
        @php
            $user = DB::table('users')
                ->where('id', Auth::id())
                ->first();
        @endphp
        @if (!Auth::user()->image)
            <div class="profile-picture text-center">
                <img class="card-img-top"
                    src="https://thumbs.dreamstime.com/b/businessman-icon-vector-male-avatar-profile-image-profile-businessman-icon-vector-male-avatar-profile-image-182095609.jpg">
                <div class="text-center mt-4 p-1" style="background-color: lightgray">
                    <a href="" class="text-dark " data-toggle="modal" data-target="#addprofileModal">Add Your Own
                        Picture</a>
                </div>

            </div>
        @else
            <div class="profile-picture text-center">
                <img class="card-img-top rounded-circle" style="height:260px;width:260px"
                    src="{{ asset(Auth::user()->image) }}">
            </div>
            <div class="text-center mt-4 p-1" style="background-color: lightgray">
                <a href="" class="text-dark" data-toggle="modal" data-target="#updateprofileModal">Update Your
                    Profile Picture</a>
            </div>
        @endif
        <ul class="list-group list-group-flush mt-4">
            <a href="{{ route('user.profile') }}" class="text-muted">
                <li class="list-group-item"><i class="fas fa-home"></i> Dashboard</li>
            </a>
            <a href="{{ route('user.open_ticket') }}" class="text-muted">
                <li class="list-group-item"> <i class="fab fa-telegram-plane"></i> Open Ticket</li>
            </a>
            <a href="" class="text-muted">
                <li class="list-group-item"> <i class="fas fa-file-alt"></i> My Order</li>
            </a>
        </ul>

    </div>
</div>


<div class="modal fade" id="addprofileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.picture.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" class="form-control" name="profile_picture" id="">
                        <input type="hidden" name="id" value="{{ Auth::id() }}">
                    </div>
                    <input type="submit" class="form-control" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateprofileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.picture.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="profile_picture" id="">
                        <input type="hidden" value="" name="old_profile_picture" id="">
                        <input type="hidden" name="id" value="{{ Auth::id() }}">
                    </div>
                    <input type="submit" class="form-control" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
