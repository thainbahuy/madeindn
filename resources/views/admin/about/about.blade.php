@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">ABOUT US</a>
            @include('admin.common_layouts.language')
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-12 message">
                        {{Session::get('msg')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row mt-8">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="table-responsive">
                    <table id ="about_table" class="table align-items-center ">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center" scope="col">Title</th>
                            <th class="text-center" scope="col">Image</th>
                            <th class="text-center" scope="col">Position</th>
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
                                <td class="text-center">{{$value->name}}</td>
                                <td class="text-center">
                                    <img width="100px" height="100px" class="img img-thumbnail" src="{{Helpers::$URL_THUMBNAIL.$value->image_link}}">
                                </td>
                                <td class="text-center">{{$value->position}}</td>
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
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-danger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="delete-save" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script>
        var config = {
            routes: {
                zone: "{{ route('admin.about.about_delete') }}"
            }
        };
    </script>
    <script src="{{ asset('admin') }}/about.js"></script>
@endsection
