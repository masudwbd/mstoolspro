<form action="{{route('categories.update')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" name="name" id="" value="{{$data->name}}" class="form-control"
            placeholder="Enter Category Name" aria-describedby="helpId">
        <input type="hidden" value="{{$data->id}}" name="id">
        <small id="helpId" class="text-muted">category for tool</small>
    </div>
    <input type="submit" class="btn btn-success" value="Update Category">
</form>