@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Customer
                Project</a>
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
                    <div class="col-xl-12 order-xl-1">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    {{--                                    <div class="col-4 text-right">--}}
                                    {{--                                        <a href="#!" class="btn btn-sm btn-primary">Settings</a>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                            <div style="background:#fbfbfc" class="card-body">
                                <h6 style="text-align: center; color: red">{{Session::get('FILES')}}</h6>
                                <h6 class="heading-small text-muted mb-4">CONTACT INFORMATION</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Username</label>
                                                <input type="text" id="input-username"
                                                       class="form-control form-control-alternative"
                                                       placeholder="Username"
                                                       value="{{$viewCustomerProject->author_name}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email
                                                    address</label>
                                                <input type="email" id="input-email"
                                                       class="form-control form-control-alternative"
                                                       value="{{$viewCustomerProject->author_email}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first-name">Phone</label>
                                                <input type="text" id="input-phone"
                                                       class="form-control form-control-alternative"
                                                       value="{{$viewCustomerProject->author_phone}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">PROJECT information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-address">Name
                                                    Startup</label>
                                                <input id="input-address" class="form-control form-control-alternative"
                                                       placeholder="Home Address"
                                                       value="{{$viewCustomerProject->name}}"
                                                       type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="input-city">Link
                                                            Driver</label>
                                                        <input type="text" id="input-link"
                                                               class="form-control form-control-alternative"
                                                               placeholder="link"
                                                               value="{{$viewCustomerProject->link_driver}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <br/>
                                                    <button onclick="myFunction()">Copy text</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">File PDF ,
                                                    World...</label>
                                                <div class="form-group focused">
                                                    @if($viewCustomerProject->content_link != '')
                                                        @php
                                                            $files = Helpers::convertToJson($viewCustomerProject->content_link,true);
                                                        @endphp
                                                        @foreach($files as $key=>$value)
                                                            <a href="{{route('download_file',$value)}}">{{$value}}</a>
                                                            <br/>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group focused">
                                        <label>About Contact</label>
                                        <textarea rows="4" class="form-control form-control-alternative"
                                                  placeholder="A few words about you ...">{{$viewCustomerProject->content}}</textarea>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Description -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var copyText = document.getElementById("input-link");
            copyText.select();
            document.execCommand("copy");
            alert("Copied the link : " + copyText.value);
        }
    </script>
@endsection