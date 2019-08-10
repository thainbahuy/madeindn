<div class="card-header border-0">
    <h3 class="mb-0">CONTACT CUSTOMER</h3>
</div>
<div class="table-responsive">
    <table class="table align-items-center ">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Content</th>
            <th scope="col">Created at</th>
            <th scope="col">Feature</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listInfoContact as $value)
            <tr id="delete-coloum-{{$value->id}}">
                <td class="text-center">{{$value->id}}</td>
                <td class="text-center">{{$value->title}}</td>
                <td class="text-center">{{$value->name}}</td>
                <td class="text-center">{{$value->email}}</td>
                <td class="text-center">{{$value->mobile}}</td>
                <td class="text-center">
                    <button class="btn btn-danger btn-xs" id="show_info" value="{{$value->content}}">SHOW CONTENT
                    </button>
                </td>
                <td class="text-center">{{$value->created_at}}</td>
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
            {{$listInfoContact->links()}}
        </ul>
    </nav>
</div>