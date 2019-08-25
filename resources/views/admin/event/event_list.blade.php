@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Events</a>
            <!-- Form -->
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
                    <div style="display: none" class="col-xl-12 message">
                        Delete Successful
                    </div>

                        <div class="col-xl-12 message text-center">
                            @if(Session::has('message'))
                                {{Session::get('message')}}
                            @endif
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
                        <div id="tableEvent" class="card shadow">
                            <div class="card-header border-0">
                                <h3 class="mb-0">Event List</h3>
                            </div>
                            <div class="table-responsive">
                                <table id="event-table" style="width: 100%" class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" scope="col">Name</th>
                                        <th class="text-center" scope="col">Image Cover</th>
                                        <th class="text-center" scope="col">Date</th>
                                        <th class="text-center" scope="col">Begin time</th>
                                        <th class="text-center" scope="col">End time</th>
                                        <th class="text-center" scope="col">Set Background Event</th>
                                        <th class="text-center" scope="col">
                                            <a href="{{route('view.admin.event.addnew')}}" class="btn btn-sm btn-success">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="button" id="delete-save" class="btn btn-primary">{{__('Yes')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script src="{{asset('admin/event.js')}}"></script>

@endsection


