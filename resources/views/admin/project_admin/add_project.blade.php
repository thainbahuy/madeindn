@extends("admin.common_layouts.master")
@section('myheadscript')
    <script src="{{asset('admin/libraries/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">ADD PROJECT</a>
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
                      action="{{route('admin.project_admin.add_project')}}">
                    {{csrf_field()}}
                    <div class="form-group row setup-content" id="step-1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select class="form-control" id="category" name="category">
                                            @foreach($listCategory as $value)
                                                <option value="{{$value->id}}" @if(old('category') == $value->id) selected @endif>
                                                    {{Helpers::changeLanguage($value->name,$value->jp_name)}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Name Project</label>
                                        <input class="form-control" type="text" name="name"
                                               placeholder="" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Location appears</label>
                                        <input class="form-control" type="number" min="1" max="100" name="position"
                                               placeholder="" value="{{old('position')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Author description</label>
                                        <textarea class="form-control" name="author_description">{{old('author_description')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="custom-control custom-radio mb-3">
                                                <input checked @if(old('status') == 1) checked @endif type="radio" value="1" id="customRadio1" name="status" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">SHOW</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" @if(old('status') == 2) checked @endif value="2" id="customRadio2" name="status" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">HIDE</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Author Information</label><br/>
                                        <table class="table configuration">
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Author name" readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="author_name"
                                                           type="text" value="{{old('author_name')}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Author email" readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="author_email"
                                                           type="email" value="{{old('author_email')}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Author phone" readonly>
                                                </td>
                                                <td>
                                                    <input class="form-control" name="author_phone"
                                                           type="text" value="{{old('author_phone')}}">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <label>Author Image</label> <br/>
                                        <input type="file" name="author_image" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Overview</label> <br/>
                                <textarea id="editor1" style="width: 100%" name="overview">{{old('overview')}}</textarea>
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
                                        <label>Name Project Japanese</label>
                                        <input class="form-control" type="text" name="name_jp"
                                               placeholder="" value="{{old('name_jp')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Author description Japanese</label>
                                        <textarea class="form-control" name="author_description_jp">{{old('author_description_jp')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Image</label>
                                        <input type="file" style="display:none" id="upload-input"
                                               name="imageProject" accept="image/*">
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
                                <textarea id="editor2" style="width: 100%" name="overview_jp">{{old('overview_jp')}}</textarea>
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
    <style>
        .custom-radio{
            margin-left:1em;
        }
    </style>
@endsection
@section("myscript")
    <script src = "{{asset('admin/libraries/ckfinder/ckfinder.js')}}"></script>
    <script>
        var editor = CKEDITOR.replace('editor1');
        CKFinder.setupCKEditor(editor, '{{asset('admin/libraries/ckfinder/ckfinder.js')}}');
        CKEDITOR.replace('editor2');
    </script>
@endsection