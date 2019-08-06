<ul class="navbar-nav align-items-center d-none d-md-flex">
    @if (Session::get('locale') == 'en')
        <a href="{{url('language/jp')}}"><li class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"> VN</li></a>
    @else
        <a href="{{url('language/en')}}"><li class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"> EN</li></a>
    @endif
</ul>