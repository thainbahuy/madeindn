@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">ADD Partner Background </a>
            <!-- Form -->
            {{--            @include("admin.common_layouts.language")--}}
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-6 pt-5 pt-md-6">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data"
                      action="{{route('admin.partner.add_partner_background')}}">
                    {{csrf_field()}}
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Position</label>
                                            <input class="form-control" type="number" min="1" max="500" name="position"
                                                   value="{{old('position')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label>Picture About</label>
                                    <input type="file" style="display:none" id="upload-input"
                                           name="image_link" accept="image/*">
                                    <div id="upload" class="form-control drop-area">
                                        <h3> Drag &amp; drop photos here! </h3>
                                        <button type="button" class="btn btn-primary btn-sm " id="btn_select">or
                                            Click here to select a photo!
                                        </button>
                                        <div id="thumbnail"></div>
                                    </div>
                                </div>
                                <div class="form-group">

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="text-center" >
                        <a onclick="back('{{route('view.admin.partner.partner_background_list')}}')" href="#" class="btn btn-danger PreviousBtn btn-lg">Back</a>
                        <button type="submit" class="btn btn-success PreviousBtn btn-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("myscript")

@endsection