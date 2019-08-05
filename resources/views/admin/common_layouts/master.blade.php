<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Argon Dashboard - Free Dashboard for Bootstrap 4 by Creative Tim
    </title>
    <!-- Favicon -->
    <link href="{{ asset('admin/') }}/assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('admin/') }}/assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
    <link href="{{ asset('admin/') }}/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('admin/') }}/assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
    <link href="{{ asset('admin/') }}/main.css" rel="stylesheet" />
</head>

<body class="">
@include('admin.common_layouts.left_bar')
<div class="main-content">
    @yield('content')
</div>
<!--   Core   -->
<script src="{{ asset('admin/') }}/assets/js/plugins/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('admin/') }}/main.js"></script>
<script src="{{ asset('admin/') }}/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--   Optional JS   -->
<script src="{{ asset('admin/') }}/assets/js/plugins/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('admin/') }}/assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
<!--   Argon JS   -->
<script src="{{ asset('admin/') }}/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
    TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
    });
</script>
</body>
</html>