@extends("admin.common_layouts.master")
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
                                               placeholder="" value="{{$infoCoworking->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Location appears</label>
                                        <input class="form-control" type="number" name="position"
                                               placeholder="" value="{{$infoCoworking->position}}">
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
                                                           type="text" value="Tên địa điểm" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           type="text" value="{{$location[0]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Số nhà, tên đường" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           type="text" value="{{$location[0]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="Thành phố" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location[]"
                                                           type="text" value="{{$location[2]}}">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Social Link</label><br/>
                                        <table class="table configuration">
                                            @foreach($social_link as $key => $value)
                                                <tr>
                                                    <td width="200px">
                                                        <input class="form-control"
                                                               type="text" value="{{$key}}" name="social[key][]"
                                                               readonly>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" name="social[value][]"
                                                               type="text" value="{{$value}}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Overview</label> <br/>
                                <textarea style="width: 100%" name="overview">{{$infoCoworking->overview}}</textarea>
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
                                        <label>名前のコワーキング</label>
                                        <input class="form-control" type="text" name="name_jp"
                                               placeholder="Xin nhập tên cowrking" value="{{$infoCoworking->jp_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>ロケーション</label>
                                        <table class="table configuration">
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="地名" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" value="{{$location_jp[0]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="住所" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" value="{{$location_jp[1]}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="200px">
                                                    <input class="form-control"
                                                           type="text" value="シティ" readonly></td>
                                                <td>
                                                    <input class="form-control" name="location_jp[]"
                                                           type="text" value="{{$location_jp[2]}}">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hình ảnh Coworking</label>
                                        <input type="file" style="display:none" id="upload-input"
                                               name="imageCoworking" accept="image/*">
                                        <div id="upload" class="form-control drop-area">
                                            <h3> Drag &amp; drop photos here! </h3>
                                            <button type="button" class="btn btn-primary btn-sm " id="btn_select">or
                                                Click here to select a photo!
                                            </button>
                                            <div id="thumbnail"></div>
                                            <span>Hình cũ</span> <br/>
                                            <img style="max-width: 120px !important; max-height: 120px !important;"
                                                 class="img-thumbnail  listimage-edit"
                                                 src="{{$infoCoworking->image_link}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>概要</label> <br/>
                                <textarea style="width: 100%"
                                          name="overview_jp">{{$infoCoworking->jp_overview}}</textarea>
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