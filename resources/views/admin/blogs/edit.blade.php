<form action="{{ route('blog.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="form-group">
                <label for="">Blog Title</label>
                <input type="text" name="title" id=""
                    class="form-control" value="{{$blog->title}}" placeholder="Enter Blog Title"
                    aria-describedby="helpId">
            </div>
            <input type="hidden" name="user_id" value="{{$blog->user_id}}">
            <input type="hidden" name="id" value="{{$blog->id}}">
            <div class="form-group">
                <label for="">Blog Description</label>
                <textarea class="form-control" placeholder="Enter Blog Description" id="exampleFormControlTextarea1" name="description" rows="5">{{$blog->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Blog Thumbnail</label>
                <input type="file" name="thumbnail" id=""
                    class="form-control" placeholder="Enter Blog Thumbnail"
                    aria-describedby="helpId">
                <input type="hidden" name="old_thumbnail" id=""
                    aria-describedby="helpId">
            </div>
            <input type="submit" class="btn btn-success btn-block mt-5" value="Update Blog">
        </div>
    </div>
   
</form>