<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title}}</title>
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
                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                        </div>
                        <div class="name">
                            <p><span>By</span>{{$getProject->author_name}}</p>
                        </div>
                    </div>
                    <div class="c-section__project__banner__title">
                        <p>{{Helpers::changeLanguage($getProject->name,$getProject->jp_name)}}</p>
                    </div>
                </div>
                <div class="c-section__project__banner__bot">
                    <img src="{{asset('web/')}}/images/post/img_detail01.png" alt="">
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
                            {!! Helpers::changeLanguage($getProject->overview,$getProject->jp_overview) !!}
                        </div>
                    </div>
                    <div class="c-section__content__right">
                        <div class="c-sidebar__profile">
                            <div class="c-sidebar__profile__top">
                                <div class="c-sidebar__profile__avatar">
                                    <div class="avatar c-thumbnail c-thumbnail__object-fit">
                                        <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                    </div>
                                </div>
                                <div class="c-sidebar__profile__name">
                                    <p>Founder</p>
                                    <p>{{$getProject->author_name}}</p>
                                </div>
                            </div>
                            <div class="c-sidebar__profile__bot">
                                <div class="text">
                                    <p>{{ Helpers::changeLanguage($getProject->author_description,$getProject->author_description_jp)}}</p>
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
    <!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="{{asset('web/')}}/images/icons/go_top.png" alt="Go Top" /></a> -->
    <!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
    <!-- endbuild -->
    <!-- ======== END JAVASCRIPT ======== -->
</body>
</html>