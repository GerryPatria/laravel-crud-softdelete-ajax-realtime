<table class="table table-responsive">
    <tr>
        <th>Data</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
                <button class="btn btn-warning" onClick="show({{$item->id}})">Modify</button>
                <button class="btn btn-danger" onClick="destroy({{$item->id}})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>