<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="{{ asset('admin/') }}/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('admin/') }}/assets/img/theme/team-1-800x800.jpg">
              </span>
                    </div>
                </a>

            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="./index.html">
                            <img src="{{ asset('admin/') }}/assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item"  class=" active ">
                <a class=" nav-link active " href=""> <i class="ni ni-tv-2 text-primary"></i> Dashboard
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('view.admin.coworking.coworking_space')}}">
                        <i class="ni ni-planet text-blue"></i> Coworking
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="./examples/maps.html">
                        <i class="ni ni-pin-3 text-orange"></i> Maps
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55"></i> Project
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="{{route('view.admin.project.project_customer')}}">Project Customers Posted</a>
                        <a class="dropdown-item" href="#">Project</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55"></i> Contact
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="{{route('view.admin.contact.project_customer')}}">Contact in Detail Project</a>
                        <a class="dropdown-item" href="#">Contact of Customer</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="./examples/profile.html">
                        <i class="ni ni-single-02 text-yellow"></i> User profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('view.admin.event.event_list')}}">
                        <i class="ni ni-bullet-list-67 text-red"></i> Event
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./examples/login.html">
                        <i class="ni ni-key-25 text-info"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./examples/register.html">
                        <i class="ni ni-circle-08 text-pink"></i> Register
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">CONFIG</h6>
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.config.lang_json')}}">
                        <i class="ni ni-spaceship"></i> Config Language
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.config.paginate_json')}}">
                        <i class="ni ni-palette"></i> Config Page
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">
                        <i class="ni ni-palette"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>