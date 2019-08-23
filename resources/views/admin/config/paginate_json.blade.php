@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Config Paginate</a>
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
    @php
        $step_stepwizard = 1;
        $step = 1;
    @endphp
    <div class="container-fluid mt--7">
        <div class="row mt-8">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <form method="POST" action="{{route('admin.config.paginate_json')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        @foreach($jsonDataPaginate as $key => $value)
                            <div class="col-md-12" style="text-align: center;">
                                <span style="text-transform: uppercase; color:red; font-weight:bold;">{{$key}}</span>
                                <div class="form-group ">
                                    <div class="row">
                                        @foreach($jsonDataPaginate[$key] as $keyPaginate => $valuePaginate)
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <span style="vertical-align: -webkit-baseline-middle;">{{$keyPaginate}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if($key == "Social_Link_Web_Footer" or $key == "Info_Company" or $key == "Info_Company" or $key == "System_Email")
                                                            <div class="form-group focused">
                                                                <input type="text"
                                                                       name="{{$key}}[{{$keyPaginate}}]"
                                                                       class="form-control"
                                                                       value="{{$valuePaginate}}">
                                                            </div>
                                                        @else
                                                            <div class="form-group focused">
                                                                <input type="number" required
                                                                       name="{{$key}}[{{$keyPaginate}}]"
                                                                       class="form-control" min=1
                                                                       value="{{$valuePaginate}}">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr/>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success PreviousBtn btn-lg">Save</button>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection