<div class="card-header border-0">
    <h3 class="mb-0">List About US</h3>
</div>
<div class="table-responsive">
    <table id ="about_table" class="table align-items-center ">
        <thead class="thead-light">
        <tr>
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Image</th>
            <th class="text-center" scope="col">Position</th>
            <th class="text-center" scope="col">Created at</th>
            <th class="text-center sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="ADD">
                <a href="{{route('view.admin.about.add_about')}}" class="btn btn-sm btn-success">
                    <span class="ni ni-fat-add"></span>&nbsp;ADD
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($listAbout as $value)
            <tr id="delete-coloum-{{$value->id}}">
                <td class="text-center">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</td>
                <td class="text-center">
                    <img width="100px" height="100px" class="img img-thumbnail" src="{{$value->image_link}}">
                </td>
                <td class="text-center">{{$value->position}}</td>
                <td class="text-center">{{$value->created_at}}</td>
                <td class="text-center">
                    <a onclick="showModalAbout('{{$value->id}}')" href="javascript:">
                        <img style="width: 25px; height: 25px;"
                             src="https://image.flaticon.com/icons/png/128/61/61848.png" alt="">
                    </a> ||&nbsp;
                    <a href="{{route('view.admin.about.edit_about',$value->id)}}">
                        <img style="width: 25px; height: 25px;" src="https://png.pngtree.com/svg/20151211/af2c28659c.svg" alt="">
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
        </ul>
    </nav>
</div>