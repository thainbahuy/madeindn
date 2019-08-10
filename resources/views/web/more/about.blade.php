<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>About</title>
@include('web.common_layouts.head')
<!-- endbuild -->
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->

<main class="c-main">
    <div class="c-banner__page">
        <div class="c-banner__page__inner">
            <div class="c-banner__page__sub-title">
                Our Projects
            </div>
            <div class="c-banner__page__title">
                <img src="{{asset('web/')}}/images/madeinDaNang.png" alt=madeinDaNang">
            </div>
        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__menutab">
        <div class="o-container">
            <div class="c-section__menutab__content">
                <ul>
                    @foreach($listAbout as $key => $value)
                        <li id= "active_{{$value->id}}">
                            <a href="{{route('web.more.about',['name'=> str_slug($value->name),'id'=>$value->id])}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="c-section c-section__about">
        <div class="o-container">
            <div class="c-section__content">
                <div class="c-section__content__text">
                    <p>{!! Helpers::changeLanguage($listFirstAbout->description,$listFirstAbout->jp_description) !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
</main>
<!-- END MAIN -->
<!-- END MAIN -->
<footer id="footer" class="c-footer">
    @include('web.common_layouts.footer')
</footer>
<!-- END FOOTER -->
<!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="{{asset('web/')}}/images/icons/go_top.png" alt="Go Top" /></a> -->
<!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
<script>
    $('#active_'+{{$id}}).addClass('active');
</script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>