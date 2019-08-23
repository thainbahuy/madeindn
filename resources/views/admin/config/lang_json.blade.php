@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Config Language</a>
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
                <div class="row">
                    <div class="stepwizard col-md-offset-{{count($jsonDataLanguage)}}">
                        <div class="stepwizard-row setup-panel">
                            @foreach($jsonDataLanguage as $key =>$value)
                                @php
                                    $step123 = $step_stepwizard++;
                                    if($step123 == 1) {
                                        $class= "btn btn-circle btn-default btn-primary";
                                    } else {
                                        $class= "btn btn-circle btn-default";
                                    }
                                @endphp
                                <div class="stepwizard-step">
                                    <a href="#step-{{$step123}}" type="button"
                                       class="{{$class}}">{{$step123}}</a>
                                    <p>Step {{$step123}} => {{$key}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @php
                    $key_EN = 0;
                    $key_JP = 0;
                @endphp
                <form method="POST" action="{{route('admin.config.lang_json')}}">
                    {{csrf_field()}}
                    @foreach($jsonDataLanguage as $keyLang => $valueLang)
                        <div class="form-group row setup-content" id="step-{{$step++}}">
                            @foreach($jsonDataLanguage[$keyLang] as $titleLang =>$value)
                                <div style="text-align: center">
                                    @if($titleLang == "HEADER")
                                        <span style="font-weight: bold;">
                                           With the values ​​in the box number <span
                                                    style="color:blue">3,6,7,8,10,11</span>. Please do not delete the attribute <span
                                                    style="color:blue">:name </span>. If the <span style="color:blue">:name </span> attribute is deleted, the system will cause an error
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <span style="color:red; font-weight:bold;">{{$titleLang}}</span> <br/>
                                    @foreach($value as $titleProperties =>$valueProperties)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span style="vertical-align: -webkit-baseline-middle;">
                                                        @if($keyLang == "EN")
                                                            {{++$key_EN}}:{{$titleProperties}}
                                                        @else
                                                            {{++$key_JP}}:{{$titleProperties}}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input required type="text"
                                                           name="{{$keyLang}}[{{$titleLang}}][{{$titleProperties}}]"
                                                           class="form-control"
                                                           value="{{$valueProperties}}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                            @if($step <> 2)
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success PreviousBtn btn-lg">Lưu</button>
                                        <button class="btn btn-primary PreviousBtn btn-lg" type="button">Previous Step 1
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <a onclick="back('{{route('dashboard')}}')" href="#" class="btn btn-danger PreviousBtn btn-lg">Back</a>
                                        <button class="btn btn-primary nextBtn btn-lg" type="button">Next</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
@section('myscript')
    <script src="{{ asset('admin') }}/configJson.js"></script>
@endsection