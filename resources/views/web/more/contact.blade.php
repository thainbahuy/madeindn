<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Top Page</title>
@include('web.common_layouts.head')
<!-- endbuild -->
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->

<main class="c-main">
    <div class="c-section c-section__contact">
        <div class="o-container">
            <div class="c-section__contact__content">
                <div class="item">
                    <div class="title">
                        <p>Address</p>
                    </div>
                    <div class="text">
                        <p>Floor 5, Quang Trung Street, Da Nang City</p>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <p>Email</p>
                    </div>
                    <div class="text">
                        <p>contact@madeindanang.com</p>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <p>Phone</p>
                    </div>
                    <div class="text">
                        <p><span>0236 3 555 888</span><span>0905 888 555</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-section c-section__map">
        <div class="c-section__map__content">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="490" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=v%C4%A9nh%20trung&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
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