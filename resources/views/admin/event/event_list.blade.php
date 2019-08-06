@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Event</a>
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
                        {{__('admin_message.delete_success')}}
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
                            @include('admin.event.loadmore_event_list')
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
                    <h5 class="modal-title" id="exampleModalLabel">{{__('admin_message.modal-header')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{__('admin_message.modal-body')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('admin_message.modal-footer-btn-close')}}</button>
                    <button type="button" id="delete-save" class="btn btn-primary">{{__('admin_message.modal-footer-btn-yes')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script src="{{asset('admin/event.js')}}"></script>
@endsection


