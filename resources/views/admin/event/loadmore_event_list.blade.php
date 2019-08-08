
<div class="card-header border-0">
    <h3 class="mb-0">Event List</h3>
</div>
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Image Cover</th>
            <th class="text-center" scope="col">Date</th>
            <th class="text-center" scope="col">Begin time - End time</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
        </thead>
        <tbody id="body">
        @foreach($listEvent as $value)
            <tr id="rowEvent{{$value->id}}">
                <td style="width: 25%" class="text-center">{{$value->name}}</td>
                <td style="width: 25%" class="text-center">
                    <img src="{{$value->image_link}}" class="img-thumbnail" alt="image-event">
                </td>
                <td style="width: 25%" class="text-center">{{date_format(date_create($value->date_time),'d-m-Y')}}</td>
                <td style="width: 25%" class="text-center">{{date_format(date_create($value->begin_time),'G:i A')}} - {{date_format(date_create($value->end_time),'G:i A')}}</td>
                <td style="width: 25%" class="text-center">
                    <a onclick="showModelDeleteEvent('{{$value->id}}','{{route('admin.event.event_list.delete')}}')" href="#">
                        <img  style="width:30%; height:auto;"
                             src="https://image.flaticon.com/icons/png/128/61/61848.png"
                             alt="image">
                    </a> &nbsp;||
                    <a href="{{route('view.admin.event.edit',['id' => $value->id])}}">
                        <img  style="width:30%; height:auto;"
                             src="https://png.pngtree.com/svg/20151211/af2c28659c.svg"
                             alt="">
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
            {{$listEvent->links()}}
        </ul>
    </nav>
</div>
