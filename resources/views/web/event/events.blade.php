<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Top Page</title>
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
                    <div class="c-post__item">
                        <div class="c-post__item__thumb">
                            <div class="c-thumbnail c-thumbnail__object-fit">
                                <img src="{{asset('web/')}}/images/post/post_thum01.png" alt="">
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="c-post__item__content">
                            <div class="c-post__item__content__title">
                                <a href="#">Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</a>
                            </div>
                            <div class="c-post__item__content__text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae
                                    dolor
                                    eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut
                                    est vestibulum,
                                    elementum aliquet est. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse vel tortor vitae dolor eleifend mollis. </p>
                            </div>
                            <div class="c-post__item__content__date">
                                <p>05 Feb 2019</p>
                            </div>
                        </div>
                    </div>
                    <div class="c-post__item">
                        <div class="c-post__item__thumb">
                            <div class="c-thumbnail c-thumbnail__object-fit">
                                <img src="{{asset('web/')}}/images/post/post_thum02.png" alt="">
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="c-post__item__content">
                            <div class="c-post__item__content__title">
                                <a href="#">Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</a>
                            </div>
                            <div class="c-post__item__content__text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae
                                    dolor
                                    eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut
                                    est vestibulum,
                                    elementum aliquet est. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse vel tortor vitae dolor eleifend mollis. </p>
                            </div>
                            <div class="c-post__item__content__date">
                                <p>05 Feb 2019</p>
                            </div>
                        </div>
                    </div>
                    <div class="c-post__item">
                        <div class="c-post__item__thumb">
                            <div class="c-thumbnail c-thumbnail__object-fit">
                                <img src="{{asset('web/')}}/images/post/post_thum03.png" alt="">
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="c-post__item__content">
                            <div class="c-post__item__content__title">
                                <a href="#">Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</a>
                            </div>
                            <div class="c-post__item__content__text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae
                                    dolor
                                    eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut
                                    est vestibulum,
                                    elementum aliquet est. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse vel tortor vitae dolor eleifend mollis. </p>
                            </div>
                            <div class="c-post__item__content__date">
                                <p>05 Feb 2019</p>
                            </div>
                        </div>
                    </div>
                    <div class="c-post__item">
                        <div class="c-post__item__thumb">
                            <div class="c-thumbnail c-thumbnail__object-fit">
                                <img src="{{asset('web/')}}/images/post/post_thum04.png" alt="">
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="c-post__item__content">
                            <div class="c-post__item__content__title">
                                <a href="#">Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</a>
                            </div>
                            <div class="c-post__item__content__text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae
                                    dolor
                                    eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut
                                    est vestibulum,
                                    elementum aliquet est. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse vel tortor vitae dolor eleifend mollis. </p>
                            </div>
                            <div class="c-post__item__content__date">
                                <p>05 Feb 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-view-more">
                    <a href="#">
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
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>