<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>About</title>
    @include('web.common_layouts.head')
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->

<main class="c-main">
    <div class="c-section c-section__coworking">
        <div class="o-container">
            <div class="c-section__coworking__content">
                <div class="c-section__coworking__content__top">
                    <div class="c-section__coworking__content__top__title">
                        <p class="sub-title">OUR community</p>
                        <h3 class="title">
                            <p>We work with Top Coworking Space</p>
                        </h3>
                    </div>
                    <div class="c-section__coworking__content__top__text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel <br/>tortor vitae
                            dolor eleifend mollis. Donec ultricies in urna eget tristique. Cras.
                        </p>
                    </div>
                </div>
                <div class="c-section__coworking__content__list">
                    <div class="c-list">
                        <div class="c-list__item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>Cozy Coworking</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>IOT Coworking Space</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>Coworking DNC- Danang</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>How we can help</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>Why partners with us</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>Your benefits for community</p>
                                </div>
                            </div>
                        </div>
                    </div>
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