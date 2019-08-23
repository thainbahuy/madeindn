@extends("admin.common_layouts.master")
@section('myheadscript')
    <script src="{{asset('admin/libraries/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">EDIT ABOUT</a>
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
                      action="{{route('admin.about.edit_about',$infoAbout->id)}}">
                    {{csrf_field()}}
                    <input hidden type="text" name="about_id" value="{{$infoAbout->id}}">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6"><h3>English</h3>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{$infoAbout->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="editor1" rows="5" class="form-control" name="description">{!!$infoAbout->description!!}</textarea>
                                </div>
                                <div class="from-group">
                                    <label>Position</label>
                                    <input class="form-control" type="number" min="1" max="500" name="position"
                                           value="{{$infoAbout->position}}">
                                </div>
                                <div class="form-group">
                                    <label>About image</label>
                                    <input type="file" style="display:none" id="upload-input"
                                           name="imageAbout" accept="image/*">
                                    <div id="upload" class="form-control drop-area">
                                        <h3> Drag &amp; drop photos here! </h3>
                                        <button type="button" class="btn btn-primary btn-sm " id="btn_select">or
                                            Click here to select a photo!
                                        </button>
                                        <div id="thumbnail"></div>
                                        <span>Old picture</span> <br/>
                                        <img style="max-width: 120px !important; max-height: 120px !important;" class="img-thumbnail  listimage-edit" src="{{Helpers::$URL_THUMBNAIL.$infoAbout->image_link}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"><h3>Japan</h3>
                                <div class="form-group">
                                    <label>Title Japan</label>
                                    <input class="form-control" type="text" name="jp_name"
                                           value="{{$infoAbout->jp_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Description Japan</label>
                                    <textarea id="editor2" rows="5" class="form-control" name="jp_description">{!!$infoAbout->description!!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center" >
                                    <a onclick="back('{{route('view.admin.about.about')}}')" href="#" class="btn btn-danger PreviousBtn btn-lg">Back</a>
                                    <button type="submit" class="btn btn-success PreviousBtn btn-lg">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("myscript")
    <script src = "{{asset('admin/libraries/ckfinder/ckfinder.js')}}"></script>
    <script>
        var editor = CKEDITOR.replace('editor1');
        CKFinder.setupCKEditor(editor, '{{asset('admin/libraries/ckfinder/ckfinder.js')}}');
        CKEDITOR.replace('editor2');
    </script>
@endsection