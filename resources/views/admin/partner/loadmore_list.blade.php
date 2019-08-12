
<div class="card-header border-0">
    <h3 class="mb-0">Partner Background List</h3>
</div>
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Image Cover</th>
            <th class="text-center" scope="col">Position</th>
            <th class="text-center" scope="col">
                <a href="{{route('view.admin.partner.add_partner_background')}}" class="btn btn-sm btn-success">
                    <span class="ni ni-fat-add"></span>&nbsp;ADD
                </a>
            </th>
        </tr>
        </thead>
        <tbody id="body">
        @foreach($listBackground as $value)
            <tr id="row{{$value->id}}">
                <td style="width: 25%" class="text-center">{{$value->name}}</td>
                <td style="width: 25%" class="text-center">
                    <img src="{{$value->image_link}}" class="img-thumbnail" alt="image-event">
                </td>
                <td style="width: 25%" class="text-center">{{$value->position}}</td>
                <td style="width: 25%" class="text-center">
                    <a onclick="showModalDeleteEvent('{{$value->id}}','{{route('admin.partner.partner_background_list.delete')}}')"  href="#">
                        <img  style="width:10%; height:auto;"
                             src="https://image.flaticon.com/icons/png/128/61/61848.png"
                             alt="image">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer py-4">
    <nav aria-label="...">
        <ul class="pagination justify-content-end mb-0">
            {{$listBackground->links()}}
        </ul>
    </nav>
</div>
