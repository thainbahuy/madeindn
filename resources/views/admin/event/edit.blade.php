@extends("admin.common_layouts.master")
@section('myheadscript')
    <script src="{{asset('admin/libraries/ckeditor/ckeditor.js')}}"></script>
@endsection
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Edit Event({{$event->id}}
                )</a>
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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form method="POST" action="{{route('admin.event.edit',$event->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="inputPassword4">Position</label>
                            <input type="number" value="{{$event->position}}" name="position" min="1" max="100"
                                   class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" value="{{$event->name}}" name="name" class="form-control" id="inputName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Name Japanese</label>
                            <input type="text" value="{{$event->name}}" name="jp_name" class="form-control"
                                   id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Sort description</label>
                            <textarea rows="5" name="sort_description"
                                      class="form-control">{{$event->sort_description}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Sort description Japanese</label>
                            <textarea rows="5" name="jp_sort_description"
                                      class="form-control">{{$event->jp_sort_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Overview</label>
                            <textarea rows="10" id="editor1" name="overview"
                                      class="form-control">{{$event->overview}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Overview Japanese</label>
                            <textarea rows="10" id="editor2" name="jp_overview"
                                      class="form-control">{{$event->jp_overview}}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        @php
                            $location = Helpers::convertToJson($event->location);
                            $location_jp = Helpers::convertToJson($event->jp_location);
                        @endphp
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Address</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location[0]}}" name="location[]" class="form-control"
                                           id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Number,Street</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location[1]}}" name="location[]" class="form-control"
                                           id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">City</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location[2]}}" name="location[]" class="form-control"
                                           id="inputPassword4">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Location name Japanese</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location_jp[0]}}" name="jp_location[]"
                                           class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Location address Japanese</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location_jp[1]}}" name="jp_location[]"
                                           class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">City Japanese</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location_jp[2]}}" name="jp_location[]"
                                           class="form-control" id="inputPassword4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        @php
                            $social_link = Helpers::convertToJson($event->social_link);
                        @endphp
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Facebook</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['fb.png']}}" name="facebook"
                                           class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Messanger</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['ms.png']}}" name="messanger"
                                           class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Telegram</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['share.png']}}" name="telegram"
                                           class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Twitter</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['twice.png']}}" name="twitter"
                                           class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Instagram</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['in.png']}}" name="instagram"
                                           class="form-control" id="inputPassword4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputPassword4">Date</label>
                            <input type="text" value="{{date_format(date_create($event->date_time),'d-m-Y')}}"
                                   style="background-color: white" readonly name="date_time" class="form-control"
                                   id="datepicker">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail">Begin time</label>
                            <input type="time" value="{{date_format(date_create($event->begin_time),'H:i')}}"
                                   name="begin_time" class="form-control" id="time">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPassword4">End time</label>
                            <input type="time" value="{{date_format(date_create($event->end_time),'H:i')}}"
                                   name="end_time" class="form-control timepicker2" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Picture Coworking</label>
                            <input type="file" style="display:none" id="upload-input"
                                   name="image_link" accept="image/*">
                            <div id="upload" class="form-control drop-area">
                                <h3> Drag &amp; drop photos here! </h3>
                                <button type="button" class="btn btn-primary btn-sm " id="btn_select">or
                                    Click here to select a photo!
                                </button>
                                <div id="thumbnail"></div>
                                <img style="width:200px" src="{{$event->image_link}}" alt="">
                                <input style="display: none" type="text" value="{{$event->image_link}}"
                                       name="image_display">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script src="{{asset('admin/libraries/ckfinder/ckfinder.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script>
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy"
            });
            var editor = CKEDITOR.replace('editor1');
            CKFinder.setupCKEditor(editor, '{{asset('admin/libraries/ckfinder/ckfinder.js')}}');
            CKEDITOR.replace('editor2');
        });
    </script>

@endsection