<div class="p2">
    <div class="form-group">
        <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-warning" onclick="update({{$data->id}})">Modify</button>
    </div>
</div>