@extends("admin.common_layouts.master")
@section('myheadscript')
    <script src="{{asset('admin/libraries/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">ADD NEW COWORKING</a>
            <!-- Form -->
            @include("admin.common_layouts.language")
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
                    <div class="stepwizard col-md-offset-2">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-circle btn-default btn-primary">1</a>
                                <p>Step 1 => EN</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-circle btn-default">2</a>
                                <p>Step 2 => JP</p>
                            </div>
                        </div>
                    </div>
                </div>
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
                      action="{{route('admin.coworking.add_coworking_space')}}">
                    {{csrf_field()}}
                    <div class="form-group row setup-content" id="step-1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name Coworking</label>
                                        <input class="form-control" type="text" name="name"
                                               placeholder="Please enter a value in this field" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input class="form-control" type="number" min="1" max="500" name="position"
                                               placeholder="This field may be blank" value="{{old('position')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Location Coworking</label>
                                        <table class="table configuration">
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Location name" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           placeholder="Please enter a value in this field"
                                                           type="text" value="{{old('location')[0]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Location address" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           placeholder="Please enter a value in this field"
                                                           type="text" value="{{old('location')[1]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="City" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           placeholder="Please enter a value in this field"
                                                           type="text" value="{{old('location')[2]}}">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Social Link</label><br/>
                                        <table class="table configuration">
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="fb.png" name="social[key][]" readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="social[value][]"
                                                           placeholder="This field may be blank"
                                                           type="text" value="{{old('social')['value']['0']}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="ms.png" name="social[key][]" readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="social[value][]"
                                                           placeholder="This field may be blank"
                                                           type="text" value="{{old('social')['value']['1']}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="share.png" name="social[key][]" readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="social[value][]"
                                                           placeholder="This field may be blank"
                                                           type="text" placeholder="This field may be blank"
                                                           value="{{old('social')['value']['2']}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="twice.png" name="social[key][]" readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="social[value][]"
                                                           placeholder="This field may be blank"
                                                           type="text" value="{{old('social')['value']['3']}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="in.png" name="social[key][]" readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="social[value][]"
                                                           placeholder="This field may be blank"
                                                           type="text" value="{{old('social')['value']['4']}}">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Overview</label> <br/>
                                <textarea id="editor1" class="editor1" style="width: 100%"
                                          name="overview">{{old('overview')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button class="btn btn-primary nextBtn btn-lg"
                                        type="button">{{__('admin_message.next')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row setup-content" id="step-2">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name Coworking Japanese</label>
                                        <input placeholder="This field may be blank" class="form-control" type="text"
                                               name="name_jp"
                                               value="{{old('name_jp')}}">
                                    </div>
                                    <div class="form-group">
                                        <label> Location Coworking Japanese
                                        </label>
                                        <table class="table configuration">
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Location name Japanese" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{old('location_jp')[0]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Location address Japanese" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{old('location_jp')[1]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="City Japanese" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{old('location_jp')[2]}}">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Coworking Image (Recommend image size : 1437 x 716 or Bigger)</label>
                                        <input type="file" style="display:none" id="upload-input"
                                               name="imageCoworking" accept="image/*">
                                        <div id="upload" class="form-control drop-area">
                                            <h3> Drag &amp; drop photos here! </h3>
                                            <button type="button" class="btn btn-primary btn-sm " id="btn_select">or
                                                Click here to select a photo!
                                            </button>
                                            <div id="thumbnail"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Overview Japanese</label> <br/>
                                <textarea id="editor2" class="editor2" style="width: 100%"
                                          name="overview_jp">{{old('overview_jp')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-success PreviousBtn btn-lg">{{__('admin_message.save')}}</button>
                                <button class="btn btn-primary PreviousBtn btn-lg"
                                        type="button">{{__('admin_message.previous')}} 1
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section("myscript")
    <script src="{{asset('admin/libraries/ckfinder/ckfinder.js')}}"></script>
    <script>
        var editor = CKEDITOR.replace('editor1');
        CKFinder.setupCKEditor(editor, '{{asset('admin/libraries/ckfinder/ckfinder.js')}}');
        CKEDITOR.replace('editor2');
    </script>
@endsection