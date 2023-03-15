<form action={{ route('tools.update') }} method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Type</label>
                <select class="form-control" name="type" id="">
                    <option value="free" @if ($data->type == 'free' ) selected="" @endif >Free</option>
                    <option value="paid"  @if ($data->type == 'paid' ) selected="" @endif >Paid</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                @php
                    $categories = DB::table('categories')->get();
                @endphp
                <select class="form-control" name="category_id" id="">
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @if ($item->id == $data->category_id) selected="" @endif>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Tool Title</label>
                <input type="text" name="title" id="" class="form-control" placeholder="Enter Tool Title"
                    aria-describedby="helpId" value="{{ $data->title }}">
                <input type="hidden" name="id" id="" class="form-control" placeholder="Enter Tool Title"
                    aria-describedby="helpId" value="{{ $data->id }}">
            </div>
            <div class="form-group">
                <label for="">Tool SubTitle</label>
                <input type="text" name="subtitle" id="" class="form-control"
                    placeholder="Enter Tool SubTitle" aria-describedby="helpId" value="{{ $data->subtitle }}">
            </div>
            <div class="form-group">
                <label for="">Tool Thumbnail</label>
                <input type="file" name="thumbnail" id="" class="form-control"
                    placeholder="Enter Tool Thumbnail" aria-describedby="helpId">
                <input type="hidden" name="old_thumbnail" id="" class="form-control"
                    placeholder="Enter Tool Thumbnail" aria-describedby="helpId" value="{{ $data->thumbnail }}">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Tool Price</label>
                <input type="text" name="price" value="{{ $data->price }}" id="" class="form-control"
                    placeholder="Enter Tool Price" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Tool Description</label>
                <input type="text" name="description" id="" class="form-control" value="{{$data->description }}" 
                    placeholder="Enter Tool Description" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Tool Video</label>
                <input type="text" name="video" id="" class="form-control" value="{{ $data->video }}""
                    placeholder="Enter Tool Video" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Upload Tool</label>
                <input type="file" name="tool" id="" class="form-control">
                <input type="hidden" value="{{ $data->tool }}" name="old_tool" id="" class="form-control">
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-success btn-block mt-5" value="Update Tool">
</form>
