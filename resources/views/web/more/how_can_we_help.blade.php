<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>How can we help you</title>
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
                <img src="{{asset('web/images/madeinDaNang.png')}}" alt=madeinDaNang">
            </div>
        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__menutab">
        <div class="o-container">
            <div class="c-section__menutab__content">
                <ul>
                    <li>
                        <a href="#">Overview</a>
                    </li>
                    <li class="active">
                        <a href="#">How we can help </a>
                    </li>
                    <li>
                        <a href="#">Why partners with us</a>
                    </li>
                    <li>
                        <a href="#">Your benefits for community</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
    <div class="c-section c-section__about">
        <div class="o-container">
            <h3 class="c-section__heading">
                <p>We work with Top Coworking Space</p>
            </h3>
            <div class="sub-title">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel<br/>
                    tortor vitae dolor eleifend mollis. Donec ultricies in urna eget tristique. Cras.
                </p>
            </div>
            <div class="c-section__content">
                <div class="c-section__content__text">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet molestie lacus, sit amet posuere lorem. Mauris in bibendum dui, quis luctus turpis. Maecenas nec hendrerit massa. Nullam in fermentum lorem. Nunc ac metus varius, egestas dolor at, scelerisque justo. Sed lacus leo, dignissim eget consectetur in, tincidunt in ex. Nam posuere, enim at pulvinar lacinia, nisl turpis sodales dui, in tincidunt felis tellus consequat mauris. Praesent suscipit eros finibus, consequat mauris sed, tempor urna. Ut hendrerit purus et ex accumsan, id tincidunt tortor mattis. Ut sit amet magna libero.
                    </p>
                    <p>
                        Morbi elit urna, auctor et suscipit et, elementum eget mauris. Duis sollicitudin, libero ac semper dictum, enim diam facilisis turpis, malesuada egestas eros felis in justo. Aliquam erat volutpat. Duis luctus erat non dolor porttitor commodo. Mauris vitae aliquet nulla. Aliquam accumsan eleifend risus. Vivamus id risus gravida, tincidunt orci id, luctus magna. Maecenas vehicula ipsum quis neque vehicula, ac commodo lorem scelerisque.
                    </p>
                </div>
                <div class="c-section__content__thumb">
                    <img src="{{asset('web/')}}/images/post/about01.png" alt="">
                </div>
                <div class="c-section__content__text">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet molestie lacus, sit amet posuere lorem. Mauris in bibendum dui, quis luctus turpis. Maecenas nec hendrerit massa. Nullam in fermentum lorem. Nunc ac metus varius, egestas dolor at, scelerisque justo. Sed lacus leo, dignissim eget consectetur in, tincidunt in ex. Nam posuere, enim at pulvinar lacinia, nisl turpis sodales dui, in tincidunt felis tellus consequat mauris. Praesent suscipit eros finibus, consequat mauris sed, tempor urna. Ut hendrerit purus et ex accumsan, id tincidunt tortor mattis. Ut sit amet magna libero.
                    </p>
                    <p>
                        Morbi elit urna, auctor et suscipit et, elementum eget mauris. Duis sollicitudin, libero ac semper dictum, enim diam facilisis turpis, malesuada egestas eros felis in justo. Aliquam erat volutpat. Duis luctus erat non dolor porttitor commodo. Mauris vitae aliquet nulla. Aliquam accumsan eleifend risus. Vivamus id risus gravida, tincidunt orci id, luctus magna. Maecenas vehicula ipsum quis neque vehicula, ac commodo lorem scelerisque.
                    </p>
                </div>
                <div class="c-section__content__thumb">
                    <img src="{{asset('web/')}}/images/post/about01.png" alt="">
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
    <!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="{{asset('web/')}}/images/icons/go_top.png" alt="Go Top" /></a> -->
    <!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
    <!-- endbuild -->
    <!-- ======== END JAVASCRIPT ======== -->
</body>
</html>