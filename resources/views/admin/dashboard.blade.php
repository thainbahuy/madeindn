@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Dashboard</a>
            <!-- Form -->
            @include("admin.common_layouts.language")
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    @foreach($boxes as $box)
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 style="font-size: 1em;" class="card-title text-uppercase text-muted mb-0">{{ $box['title'] }}</h5>
                                            <a href="{{ $box['url'] }}">
                                                <span class="h2 font-weight-bold mb-0">{{ $box['count'] }}</span>
                                            </a>
                                        </div>
                                        <div class="col-auto">
                                            <div class="{{ $box['icon'] }}">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Background Home Page</h3>
                            </div>
                            <div class="col text-right">
                                <a onclick="showModalBackground()" href="#!" class="btn btn-sm btn-primary">CHANGE
                                    BACKGROUND</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <td class="text-center">Image
                                </th>
                                <td class="text-center">Created_at
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">
                                    <img width="25%" height="25%" class="img img-thumbnail"
                                         src="{{Helpers::$URL_BASIC.$backgroundHome->image_link}}">
                                </th>
                                <td class="text-center">
                                    {{$backgroundHome->created_at}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-danger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <form method="POST" id="backgroundForm" action="{{route('change_background_home')}}"
              enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="text" name="image_link" value="{{Helpers::getNameImage($backgroundHome->image_link)}}" hidden>
            <input type="text" name=id_background"" value="{{$backgroundHome->id}}" hidden>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">CHANGE BACKGROUND</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input required type="file" style="display:none" id="upload-input"
                                   name="imageBackground" accept="image/*">
                            <div id="upload" class="form-control drop-area">
                                <h3> Drag &amp; drop photos here! </h3>
                                <button type="button" class="btn btn-primary btn-sm " id="btn_select">or
                                    Click here to select a photo!
                                </button>
                                <div id="thumbnail"></div>
                            </div>
                        </div>
                        <div style="text-align:center;" class="form-group">
                            <span id="error" style="color:red;font-weight: bold; text-transform: uppercase"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        <button id="save" type="submit"
                                class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('myscript')
    <script>
        function showModalBackground() {
            $('#modal-danger').modal('show');
        }

        $('#save').on('click', function () {
            $("#error").html("<span style='color:blue'> Please select a photo before saving </span> <br/> Please wait to reload the page after pressing save");
        });
    </script>
@endsection