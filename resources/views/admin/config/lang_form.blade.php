@extends("admin.common_layouts.master")
@section("content")
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Config Language Form Submit Project
                and Contact Us</a>
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
                <div class="row">
                    <div class="col-md-12 text-center text-uppercase">
                        <span class="font-weight-bold">Config in Form Submit project </span>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                       <span style="font-weight: bold;">
                                           <ul>
                                               <li><a href="{{route('download_file',['json_language/','language_project.json'])}}">Download the Language file in the Form Project to edit</a></li>
                                               <li> <a href="{{route('download_file',['json_language/','language_project_backup.json'])}}">Download the Backup File in the Form Project</a> <br/></li>
                                           </ul>
                                       </span>
                                </div>
                                <div class="form-group">
                                    <p style="font-weight: bold;">Upload Files Json Project</p>
                                    <form method="POST" action="{{route('admin.config.lang_form_project')}}"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group col-md-6">
                                            <input type="file" id="files_json" name="files_json" accept=".json">
                                        </div>
                                        <div class="form-group col-md-12 text-center">
                                            <button type="submit" class="btn btn-success PreviousBtn btn-lg">SAVE
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold bg-gradient-red">NOTES</label><br>
                                    <table class="table configuration">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <span>Download this file for detailed instructions</span>
                                                <a class="font-weight-bold"
                                                   href="{{route('download_file',['json_language/',"notes _introduction.docx"])}}">FILES</a>
                                            </li>
                                            <li class="list-group-item">After uploading is complete, Please click <a
                                                        class="font-weight-bold" target="_blank"
                                                        href="{{route('web.project.project_submit')}}">HERE</a> to check
                                                for changes
                                            </li>
                                            <li class="list-group-item">If an error occurs during testing, please
                                                download the backup file and upload again
                                            </li>
                                            <li class="list-group-item">Please <span
                                                        class="font-weight-bold bg-gradient-yellow"> CHECK THE JSON FILE CAREFULLY </span>before
                                                uploading to avoid unfortunate errors
                                            </li>
                                        </ul>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-12 text-center text-uppercase">
                        <span class="font-weight-bold">Config in Form Contact Us</span>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                       <span style="font-weight: bold;">
                                           <ul>
                                               <li><a href="{{route('download_file',['json_language/','language_contact.json'])}}">Download the Language file in the Form Contact to edit</a></li>
                                               <li> <a href="{{route('download_file',['json_language/','language_contact_backup.json'])}}">Download the Backup File in the Form Contact </a> <br/></li>
                                           </ul>
                                       </span>
                                </div>
                                <div class="form-group">
                                    <p style="font-weight: bold;">Upload Files Json Contact</p>
                                    <form method="POST" action="{{route('admin.config.lang_form_contact')}}"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group col-md-6">
                                            <input type="file" id="files_json_contact" name="files_json_contact" accept=".json">
                                        </div>
                                        <div class="form-group col-md-12 text-center">
                                            <button type="submit" class="btn btn-success PreviousBtn btn-lg">SAVE
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold bg-gradient-red">NOTES</label><br>
                                    <table class="table configuration">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <span>Download this file for detailed instructions</span>
                                                <a class="font-weight-bold"
                                                   href="{{route('download_file',['json_language/',"notes _introduction.docx"])}}">FILES</a>
                                            </li>
                                            <li class="list-group-item">After uploading is complete, Please click <a
                                                        class="font-weight-bold" target="_blank"
                                                        href="{{route('web.contact.contact')}}">HERE</a> to check
                                                for changes
                                            </li>
                                            <li class="list-group-item">If an error occurs during testing, please
                                                download the backup file and upload again
                                            </li>
                                            <li class="list-group-item">Please <span
                                                        class="font-weight-bold bg-gradient-yellow"> CHECK THE JSON FILE CAREFULLY </span>before
                                                uploading to avoid unfortunate errors
                                            </li>
                                        </ul>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
