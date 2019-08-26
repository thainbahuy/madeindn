@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Memory Buffer Management</a>
            <!-- Form -->
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
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <h5 class="mb-0 text-uppercase"><i class="fas fa-sync"></i> The basic cache removal
                                    commands</h5>
                            </div>
                            <div class="table-responsive">
                                <table id="cache" class="table table-bordered vertical-middle table-hover">
                                    <colgroup>
                                        <col width="80%">
                                        <col width="20%">
                                    </colgroup>
                                    <tbody>
                                    <tr style="display: none" id="hideMe">
                                        <td class="text-center">
                                            <img style='max-width: 10%;'
                                                 src='{{asset("/web/images/icons/check-icon-small-16.jpg")}}'
                                                 alt=''><br/>
                                        </td>
                                        <td class="text-center">
                                            <div class='alert alert-success' role='alert'>Update successful</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Delete application cache: database, static content ... Run this command when you try to update data but the interface does not change</td>
                                        <td>
                                            <button class="btn btn-danger btn-block btn-clear-cache"
                                                    data-type="clear_cms_cache"
                                                    data-url="{{route('admin.config.cache')}}">
                                                Delete all existing application buffers
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Refresh the interface buffer to make the interface always the latest</td>
                                        <td>
                                            <button class="btn btn-warning btn-block btn-clear-cache"
                                                    data-type="refresh_compiled_views"
                                                    data-url="{{route('admin.config.cache')}}">
                                                Refresh the interface buffer
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>You need to refresh the configuration buffer when you make any changes to the finished environment.</td>
                                        <td>
                                            <button class="btn green-meadow btn-block btn-clear-cache bg-green"
                                                    data-type="clear_config_cache"
                                                    data-url="{{route('admin.config.cache')}}">
                                                Clear the configuration cache
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>This operation needs to be performed when no new path appears.</td>
                                        <td>
                                            <button class="btn green-meadow btn-block btn-clear-cache bg-green"
                                                    data-type="clear_route_cache"
                                                    data-url="{{route('admin.config.cache')}}">
                                                Clear the path cache
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <style>
        #cache td {
            white-space: unset;
        }
    </style>
    <script src="{{ asset('admin/configJson.js') }}/"></script>
@endsection
