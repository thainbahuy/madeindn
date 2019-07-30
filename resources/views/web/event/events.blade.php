<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{__('message.EVENT')}}</title>
    @include('web.common_layouts.head')


</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->

<main class="c-main">
    <div class="c-banner__events">
        <div class="c-banner__events__inner">

        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__events c-section__events__two">
        <div class="o-container">
            <div class="c-section__content">
                <div class="c-post">
                    @include('data_event_loadmore')
                </div>
                <div class="btn-view-more">
                    <a id="loadmore_btn" href="javascript:loadMoreEvent('{{route('web.event.events')}}');">
                        <span>VIEW MORE</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
</main>
<!-- END MAIN -->

<footer id="footer" class="c-footer">
    @include('web.common_layouts.footer')
</footer>
<!-- END FOOTER -->
<!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="images/icons/go_top.png" alt="Go Top" /></a> -->
<!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')


<script src="{{asset('web/js/loadmore.js')}}"></script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->

</body>
</html>