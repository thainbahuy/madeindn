@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">COWORKING SPACE</a>
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
                <div class="row">
                    <div class="col">
                        <div  class="card shadow">
                            <div class="card-header border-0">
                                <h3 class="mb-0">List Coworking Space</h3>
                            </div>
                            <div class="table-responsive">
                                <table id="coworkingTable" class="table align-items-center ">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" scope="col">Name</th>
                                        <th class="text-center" scope="col">Image</th>
                                        <th class="text-center" scope="col">position</th>
                                        <th class="text-center" scope="col">Created at</th>
                                        <th class="text-center sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="ADD">
                                            <a href="{{route('view.admin.coworking.add_coworking_space')}}" class="btn btn-sm btn-success">
                                                <span class="ni ni-fat-add"></span>&nbsp;ADD
                                            </a>
                                        </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
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
                zone: "{{ route('admin.coworking.coworking_space_delete') }}"
            }
        };
    </script>
    <script src="{{ asset('admin') }}/coworking.js"></script>
@endsection