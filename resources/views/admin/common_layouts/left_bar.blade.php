<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{route('dashboard')}}">
            <img src="{{ asset('web/images/logo.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <a href="{{route('logout')}}">
                <li class="font-weight-bold text-red text-uppercase"> LOGOUT</li>
            </a>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{route('dashboard')}}">
                            <img src="{{ asset('web/images/logo.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item  class=" active="">
                    <a class=" nav-link active " href="{{route('dashboard')}}"> <i class="ni ni-tv-2 text-primary"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('view.admin.category.view_category')}}">
                        <i class="ni ni-planet text-blue"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('view.admin.coworking.coworking_space')}}">
                        <i class="ni ni-planet text-red"></i> Coworkings
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="ni ni-planet text-green"></i> Projects
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                         aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="{{route('view.admin.project.project_customer')}}">Projects
                            Customers Posted</a>
                        <a class="dropdown-item" href="{{route('view.admin.project_admin.project')}}">Projects</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="ni ni-planet text-pink"></i> Contacts
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                         aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="{{route('view.admin.contact.project_customer')}}">Contact in
                            Detail Project</a>
                        <a class="dropdown-item" href="{{route('view.admin.contact.contact_customer')}}">Contact of
                            Customer</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('view.admin.about.about')}}">
                        <i class="ni ni-planet text-yellow"></i> About pages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('view.admin.event.event_list')}}">
                        <i class="ni ni-planet text-capitalize"></i> Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('view.admin.partner.partner_background_list')}}">
                        <i class="ni ni-planet text-blue"></i> Partner Logos
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">CONFIGS</h6>
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.config.lang_json')}}">
                        <i class="ni ni-settings"></i> Config Language System
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('view.admin.config.lang_form')}}">
                        <i class="ni ni-settings"></i> Config Language Form
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.config.paginate_json')}}">
                        <i class="ni ni-settings"></i> Config System
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.config.cache')}}">
                        <i class="ni ni-settings"></i> Memory Management
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>