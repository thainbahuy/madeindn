<!DOCTYPE html>
<html lang="en">
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
        <div class="c-section c-section__project__banner">
            <div class="o-container">
                <div class="c-section__project__banner__top">
                    <div class="c-section__project__banner__profile">
                        <div class="avatar c-thumbnail c-thumbnail__object-fit">
                            <img src="images/4-3_1024x767.png" alt="">
                        </div>
                        <div class="name">
                            <p><span>By</span>Robert Hung</p>
                        </div>
                    </div>
                    <div class="c-section__project__banner__title">
                        <p>Narwal: World's First Self-Cleaning Robot Mop & Vacuum</p>
                    </div>
                </div>
                <div class="c-section__project__banner__bot">
                    <img src="images/post/img_detail01.png" alt="">
                </div>
            </div>
        </div>
        <!-- END BANNER -->
        <div class="c-section c-section__project__detail">
            <div class="o-container">
                <div class="c-section__content">
                    <div class="c-section__content__left">
                        <div class="c-section__project__detail__title">
                            <p>Overview</p>
                        </div>
                        <div class="text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet molestie lacus, sit amet posuere lorem. Mauris in bibendum dui, quis luctus turpis. Maecenas nec hendrerit massa. Nullam in fermentum lorem. Nunc ac metus varius, egestas dolor at, scelerisque justo. Sed lacus leo, dignissim eget consectetur in, tincidunt in ex. Nam posuere, enim at pulvinar lacinia, nisl turpis sodales dui, in tincidunt felis tellus consequat mauris. Praesent suscipit eros finibus, consequat mauris sed, tempor urna. Ut hendrerit purus et ex accumsan, id tincidunt tortor mattis. Ut sit amet magna libero.
                            </p>
                            <p>
                                Morbi elit urna, auctor et suscipit et, elementum eget mauris. Duis sollicitudin, libero ac semper dictum, enim diam facilisis turpis, malesuada egestas eros felis in justo. Aliquam erat volutpat. Duis luctus erat non dolor porttitor commodo. Mauris vitae aliquet nulla. Aliquam accumsan eleifend risus. Vivamus id risus gravida, tincidunt orci id, luctus magna. Maecenas vehicula ipsum quis neque vehicula, ac commodo lorem scelerisque.
                            </p>
                            <p><img src="images/post/img_detail02.png" alt=""></p>
                            <p>
                                Porem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet molestie lacus, sit amet posuere lorem. Mauris in bibendum dui, quis luctus turpis. Maecenas nec hendrerit massa. Nullam in fermentum lorem. Nunc ac metus varius, egestas dolor at, scelerisque justo.
                            </p>
                        </div>
                        <div class="c-section__project__detail__title">
                            <p>Team</p>
                        </div>
                        <div class="text">
                            <p><img src="images/post/img_detail03.png" alt=""></p>
                        </div>
                    </div>
                    <div class="c-section__content__right">
                        <div class="c-sidebar__profile">
                            <div class="c-sidebar__profile__top">
                                <div class="c-sidebar__profile__avatar">
                                    <div class="avatar c-thumbnail c-thumbnail__object-fit">
                                        <img src="images/4-3_1024x767.png" alt="">
                                    </div>
                                </div>
                                <div class="c-sidebar__profile__name">
                                    <p>Founder</p>
                                    <p>Robert Hung</p>
                                </div>
                            </div>
                            <div class="c-sidebar__profile__bot">
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet molestie lacus, sit amet posuere lorem. Mauris in bibendum dui, quis luctus turpis. Maecenas nec hendrerit massa. neque vehicula, ac commodo lorem scelerisque.</p>

                                </div>
                                <div class="c-form">
                                    <div class="c-form__body">
                                        <form action="">
                                            <div class="c-form__row">
                                                <input type="text" placeholder="Your email">
                                            </div>
                                            <div class="c-form__row">
                                                <input type="phone" placeholder="Your moblie">
                                            </div>
                                            <div class="c-form__row">
                                                <textarea placeholder="Type something..."></textarea>
                                            </div>
                                            <button>SEND</button>
                                        </form>
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