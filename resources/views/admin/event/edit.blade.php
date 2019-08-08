@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
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


                <form method="POST" action="#" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row">
                        <input type="text" style="display: none" value="{{$event->id}}" name="id" class="form-control" id="inputPassword4">
                        <div class="form-group col-md-1">
                            <label for="inputPassword4">Position</label>
                            <input type="number" value="{{$event->position}}" name="position" min="1" max="100" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Name</label>
                            <input type="text" value="{{$event->name}}"  name="name" class="form-control" id="inputName" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Name Jp</label>
                            <input type="text" value="{{$event->name}}"  name="jp_name" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Sort description</label>
                            <textarea rows="10" name="sort_description" class="form-control">{{$event->sort_description}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">jp Sort description</label>
                            <textarea rows="10" name="jp_sort_description" class="form-control">{{$event->jp_sort_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Overview</label>
                            <textarea rows="10" name="overview" class="form-control">{{$event->overview}}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">jp Overview	</label>
                            <textarea rows="10" name="jp_overview" class="form-control">{{$event->jp_overview}}</textarea>
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
                                    <input type="text" value="{{$location[0]}}"  name="location[]" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Number,Street</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location[1]}}"  name="location[]" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">City</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location[2]}}"  name="location[]" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Address jp</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location_jp[0]}}"  name="jp_location[]" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Number,Street jp</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location_jp[1]}}"  name="jp_location[]" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">City jp</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$location_jp[2]}}"  name="jp_location[]" class="form-control" id="inputPassword4">
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
                                    <input type="text" value="{{$social_link['fb.png']}}" name="facebook" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Messanger</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['ms.png']}}"  name="messanger" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Telegram</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['share.png']}}" name="telegram" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Twitter</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['twice.png']}}" name="twitter" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="inputEmail">Instagram</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="{{$social_link['in.png']}}" name="instagram" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="inputPassword4">Date</label>
                            <input type="text" value="{{$event->date_time}}" style="background-color: white" readonly  name="date_time" class="form-control" id="datepicker">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEmail">Begin time</label>
                            <input type="time" value="{{date_format(date_create($event->begin_time),'H:i')}}"  name="begin_time" class="form-control" id="time" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputPassword4">End time</label>
                            <input type="time" value="{{date_format(date_create($event->end_time),'H:i')}}"  name="end_time" class="form-control timepicker2" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div id="thumbnail"></div>
                            <label for="upload-file">Image</label>
                            <input type="file" name="image_link" class="form-control" id="upload-file" accept="image/*" >
                            <input type="text" style="display: none" value="{{$event->image_link}}" name="image_display" class="form-control" id="image_display" >
{{--                            <span>Hifnh cu</span>--}}
{{--                            <img src="" alt="">--}}
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script>
        $( function() {
            $( "#datepicker" ).datepicker({
                dateFormat: "dd-mm-yy"
            });

        } );
    </script>

    <style>
        .imgKLIK5 {
            width:50%;
            float: left;
        }
        .closeDiv {
            width: 20px;
            height: 21px;
            background-color: rgb(35, 179, 119);
            float: left;
            cursor: pointer;
            color: white;
            box-shadow: 2px 2px 7px rgb(74, 72, 72);
            text-align: center;
            margin: 5px;
        }
        .pDiv {
            float:left;
            width:100%
        }
    </style>
    <script>
        jQuery(function ($) {
            $('div').on('click', '.closeDiv', function () {
                $(this).prev().remove();
                $(this).remove();
                $('#upload-file').val("");
            });
            var fileDiv = document.getElementById("upload");
            var fileInput = document.getElementById("upload-file");

            fileInput.addEventListener("change", function (e) {

                var filesVAR = this.files;
                $('.pDiv').remove();
                showThumbnail(filesVAR);

            }, false);



            function showThumbnail(files) {
                var file = files[0]
                var thumbnail = document.getElementById("thumbnail");
                var pDiv = document.createElement("div");
                var image = document.createElement("img");
                var div = document.createElement("div");


                pDiv.setAttribute('class', 'pDiv');
                thumbnail.appendChild(pDiv);


                image.setAttribute('class', 'imgKLIK5');
                pDiv.appendChild(image)

                div.innerHTML = "X";
                div.setAttribute('class', 'closeDiv');
                pDiv.appendChild(div)

                image.file = file;
                var reader = new FileReader()
                reader.onload = (function (aImg) {
                    return function (e) {
                        aImg.src = e.target.result;
                    };
                }(image))
                var ret = reader.readAsDataURL(file);
                var canvas = document.createElement("canvas");
                ctx = canvas.getContext("2d");
                image.onload = function () {
                    ctx.drawImage(image, 100, 100);
                }
            }
        });
    </script>
@endsection