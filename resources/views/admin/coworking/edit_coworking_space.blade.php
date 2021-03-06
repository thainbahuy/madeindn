@extends("admin.common_layouts.master")
@section('myheadscript')
    <script src="{{asset('admin/libraries/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">EDIT COWORKING
                ( {{$infoCoworking->id}} )</a>
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
                      action="{{route('admin.coworking.edit_coworking_space',$infoCoworking->id)}}">
                    @csrf
                    <input type="text" hidden name="coworking_id" value="{{$infoCoworking->id}}">
                    <div class="form-group row setup-content" id="step-1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name Coworking</label>
                                        <input class="form-control" type="text" name="name"
                                               placeholder="Please enter a value in this field"
                                               value="{{$infoCoworking->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input class="form-control" min="1" max="500" type="number" name="position"
                                               placeholder="This field may be blank"
                                               value="{{$infoCoworking->position}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Location Coworking</label>
                                        <table class="table configuration">
                                            @php
                                                $location    = json_decode($infoCoworking->location,true);
                                                $location_jp = json_decode($infoCoworking->jp_location,true);
                                                $social_link = json_decode($infoCoworking->social_link,true);
                                            @endphp

                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Location name" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{$location[0]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Location address" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{$location[1]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="City" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{$location[2]}}">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Social Link</label><br/>
                                        <table class="table configuration">
                                            @if (!empty($social_link))
                                                @foreach($social_link as $key => $value)
                                                    <tr>
                                                        <td width="200px">
                                                            <input class="form-control"
                                                                   type="text" value="{{$key}}" name="social[key][]"
                                                                   readonly>
                                                        </td>
                                                        <td>
                                                            <input placeholder="This field may be blank"
                                                                   class="form-control" name="social[value][]"
                                                                   type="text" value="{{$value}}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Overview</label> <br/>
                                <textarea id="editor1" style="width: 100%"
                                          name="overview">{{$infoCoworking->overview}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <a onclick="back('{{route('view.admin.coworking.coworking_space')}}')" href="#" class="btn btn-danger PreviousBtn btn-lg">Back</a>
                                <button class="btn btn-primary nextBtn btn-lg" type="button">{{__('Next')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row setup-content" id="step-2">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name Coworking Japanese</label>
                                        <input class="form-control" type="text" name="name_jp"
                                               placeholder="This field may be blank"
                                               value="{{$infoCoworking->jp_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Location Coworking Japanese</label>
                                        <table class="table configuration">
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Location name Japanese" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{$location_jp[0]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Location address Japanese" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{$location_jp[1]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="City Japanese" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" placeholder="Please enter a value in this field"
                                                           value="{{$location_jp[2]}}">
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
                                            <span>Coworking old Image</span> <br/>
                                            <img style="max-width: 120px !important; max-height: 120px !important;"
                                                 class="img-thumbnail  listimage-edit"
                                                 src="{{Helpers::$URL_THUMBNAIL.$infoCoworking->image_link}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Overview Japanese</label> <br/>
                                <textarea id="editor2" style="width: 100%"
                                          name="overview_jp">{{$infoCoworking->jp_overview}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-success PreviousBtn btn-lg">Save</button>
                                <button class="btn btn-primary PreviousBtn btn-lg"
                                        type="button">{{__('Previous Step')}} 1
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