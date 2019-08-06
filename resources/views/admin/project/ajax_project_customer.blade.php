<div class="card-header border-0">
    <h3 class="mb-0">Customer Project</h3>
</div>
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Author name</th>
            <th scope="col">author email</th>
            <th scope="col">Name Startup</th>
            <th scope="col">Created at</th>
            <th scope="col">Feature</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listCustomerProject as $value)
            <tr id="delete-coloum-{{$value->id}}">
                <td class="text-center">{{$value->id}}</td>
                <td class="text-center">{{$value->author_name}}</td>
                <td class="text-center">{{$value->author_email}}</td>
                <td class="text-center">{{$value->name}}</td>
                <td class="text-center">{{$value->created_at}}</td>
                <td class="text-center">
                    <a onclick="showModalProject('{{$value->id}}')" href="javascript:">
                        <img src="https://image.flaticon.com/icons/png/128/61/61848.png" width="10%" alt="">
                        </image>
                    </a> &nbsp;
                    || &nbsp;
                    <a href="{{route('view.admin.project.detail_project_submit',$value->id)}}">
                        <img style="width: 10%;"
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
            {{$listCustomerProject->links()}}
        </ul>
    </nav>
</div>