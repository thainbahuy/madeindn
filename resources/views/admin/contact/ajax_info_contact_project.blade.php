<div class="card-header border-0">
    <h3 class="mb-0">Customer Project</h3>
</div>
<div class="table-responsive">
    <table class="table align-items-center ">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Customer Content</th>
            <th scope="col">Created at</th>
            <th scope="col">Code Project</th>
            <th scope="col">Feature</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listInfoContactProject as $value)
            <tr id="delete-coloum-{{$value->id}}">
                <td class="text-center">{{$value->id}}</td>
                <td class="text-center">{{$value->email_customer}}</td>
                <td class="text-center">{{$value->mobile_customer}}</td>
                <td class="text-center">
                    <button class="btn btn-danger btn-xs" id="show_info" value="{{$value->content_customer}}">{{__('admin_message.show')}}</button>
                </td>
                <td class="text-center">{{$value->created_at}}</td>
                <td class="text-center">
                    @if($value->product_id <> null)
                        <a href="{{route('web.project.project_detail',['name'=>str_slug($value->project->name),'id'=>$value->project->id])}}">{{$value->project->id}}</a>
                    @endif
                </td>
                <td class="text-center">
                    <a onclick="showModalContact('{{$value->id}}')" href="javascript:">
                        <img style="width: 30%;" src="https://image.flaticon.com/icons/png/128/61/61848.png" alt="">
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
            {{$listInfoContactProject->links()}}
        </ul>
    </nav>
</div>