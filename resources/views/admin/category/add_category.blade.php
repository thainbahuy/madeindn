@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">ADD CATEGORY</a>
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
                <form method="POST" enctype="multipart/form-data"
                      action="{{route('admin.category.add_category')}}">
                    {{csrf_field()}}
                    <div class="row " id="step-1">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name Category</label>
                                        <input pattern=".{0}|.{2,50}" required title="(2 to 50 chars)" class="form-control" type="text" name="name"
                                               placeholder="" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Name Category Japanese</label>
                                        <input pattern=".{0}|.{2,50}" required title="(2 to 50 chars)" class="form-control" type="text" name="name_jp"
                                               placeholder="" value="{{old('name_jp')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input class="form-control" min="1" max="500" type="number" name="position"
                                               placeholder="" value="{{old('position')}}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li> {{ $error }} </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit"
                                        class="btn btn-success PreviousBtn btn-lg">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection