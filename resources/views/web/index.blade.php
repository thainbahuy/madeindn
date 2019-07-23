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
    <div class="c-banner">
        <div class="c-banner__inner">
            <div class="c-banner__inner__sub-title">
                welcome to danang's startup community
            </div>
            <div class="c-banner__inner__title">
                    Aliquam malesuada
            </div>
            <div class="c-banner__inner__search">
                <div class="search-tabs search-form">
                    <div class="tab-content">
                        <form action="">
                            <div class="form-group">
                                <select name="" id="">
                                    <option value="">Sort by category</option>
                                    <option value="">1</option>
                                    <option value="">13</option>
                                    <option value="">14</option>
                                    <option value="">15</option>
                                    <option value="">16</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="" id="">
                                    <option value="">Sort by category</option>
                                    <option value="">1</option>
                                    <option value="">1</option>
                                    <option value="">1</option>
                                    <option value="">1</option>
                                    <option value="">1</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-search-all">
                                SEARCH
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__community">
        <div class="o-container">
            <div class="c-section__community__content">
                <div class="c-section__community__content__top">
                    <div class="c-section__community__content__top__title">
                        <p class="sub-title">OUR community</p>
                        <h3 class="title">
                            <p>Welcome to MID</p>
                        </h3>
                    </div>
                    <div class="c-section__community__content__top__text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae dolor eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut est vestibulum, elementum aliquet est. 
                        </p>
                    </div>
                </div>
                <div class="c-section__community__content__list">
                    <div class="c-list">
                        <div class="c-list__item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__sub">
                                    <p>introduction</p>
                                </div>
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
                                <div class="c-list__item__sub">
                                    <p>Our expertise</p>
                                </div>
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
                                <div class="c-list__item__sub">
                                    <p>OUR community</p>
                                </div>
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
    <div class="c-section c-section__project">
        <div class="o-container">
            <h2 class="c-section__heading"><p>Our Projects </p></h2>
            <div class="tabs">
                    <ul class="tabs-list">
                        <li class="active" data-value="value 1" style="display: list-item"><a href="#tab1">Technology</a></li>
                        <li data-value="value 2"><a href="#tab2">Crafts</a></li>
                        <li data-value="value 3"><a href="#tab3">Dance</a></li>
                        <li data-value="value 4"><a href="#tab4">Design </a></li>
                        <li data-value="value 5"><a href="#tab5">Fashion</a></li>
                        <li data-value="value 6"><a href="#tab6">Food</a></li>
                        <li data-value="value 7"><a href="#tab7">Games</a></li>
                        <li data-value="value 8"><a href="#tab8">Film And Video</a></li>
                        <li data-value="value 9"><a href="#tab9">Journalism</a></li>
                        <li data-value="value 10"><a href="#tab10">Music</a></li>
                    </ul>
                </ul>
            </div>                                                                                               
            <div class="c-section__content">
                <div class="tabs-content">
                    <div id="tab1" class="tab active">
                        <div class="c-list__project">
                            <div class="c-list__project__item">
                                <div class="c-thumbnail">
                                    <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                </div>
                                <div class="c-list__project__item__content">
                                    <div class="c-list__project__item__sub">
                                        <p>TECHNOLOGY</p>
                                        <p>start-up</p>
                                    </div>
                                    <div class="c-list__project__item__title">
                                        <p>Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</p>
                                    </div>
                                    <div class="c-list__project__item__profile">
                                        <div class="avatar">
                                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                        </div>
                                        <div class="name">
                                            <p><span>By</span>Robert Hung</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-list__project__item">
                                <div class="c-thumbnail">
                                    <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                </div>
                                <div class="c-list__project__item__content">
                                    <div class="c-list__project__item__sub">
                                        <p>TECHNOLOGY</p>
                                        <p>start-up</p>
                                    </div>
                                    <div class="c-list__project__item__title">
                                        <p>Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</p>
                                    </div>
                                    <div class="c-list__project__item__profile">
                                        <div class="avatar">
                                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                        </div>
                                        <div class="name">
                                            <p><span>By</span>Robert Hung</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-list__project__item">
                                <div class="c-thumbnail">
                                    <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                </div>
                                <div class="c-list__project__item__content">
                                    <div class="c-list__project__item__sub">
                                        <p>TECHNOLOGY</p>
                                        <p>start-up</p>
                                    </div>
                                    <div class="c-list__project__item__title">
                                        <p>Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</p>
                                    </div>
                                    <div class="c-list__project__item__profile">
                                        <div class="avatar">
                                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                        </div>
                                        <div class="name">
                                            <p><span>By</span>Robert Hung</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-list__project__item">
                                <div class="c-thumbnail">
                                    <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                </div>
                                <div class="c-list__project__item__content">
                                    <div class="c-list__project__item__sub">
                                        <p>TECHNOLOGY</p>
                                        <p>start-up</p>
                                    </div>
                                    <div class="c-list__project__item__title">
                                        <p>Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</p>
                                    </div>
                                    <div class="c-list__project__item__profile">
                                        <div class="avatar">
                                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                        </div>
                                        <div class="name">
                                            <p><span>By</span>Robert Hung</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-list__project__item">
                                <div class="c-thumbnail">
                                    <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                </div>
                                <div class="c-list__project__item__content">
                                    <div class="c-list__project__item__sub">
                                        <p>TECHNOLOGY</p>
                                        <p>start-up</p>
                                    </div>
                                    <div class="c-list__project__item__title">
                                        <p>Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</p>
                                    </div>
                                    <div class="c-list__project__item__profile">
                                        <div class="avatar">
                                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                        </div>
                                        <div class="name">
                                            <p><span>By</span>Robert Hung</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-list__project__item">
                                <div class="c-thumbnail">
                                    <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                </div>
                                <div class="c-list__project__item__content">
                                    <div class="c-list__project__item__sub">
                                        <p>TECHNOLOGY</p>
                                        <p>start-up</p>
                                    </div>
                                    <div class="c-list__project__item__title">
                                        <p>Lorem ipsum dolor sit amet, elit consectetur adipiscing elit</p>
                                    </div>
                                    <div class="c-list__project__item__profile">
                                        <div class="avatar">
                                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                        </div>
                                        <div class="name">
                                            <p><span>By</span>Robert Hung</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab">
                        <p>
                            A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my
                        </p>
                    </div>
                    <div id="tab3" class="tab">
                        <p>
                            A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my
                        </p>
                    </div>
                    <div id="tab4" class="tab">
                        <p>
                            A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my
                        </p>
                    </div>
                </div>
                <div class="btn-view-more">
                    <a href="#">
                        VIEW MORE
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
    <div class="c-section c-section__community c-section__community__two">
        <div class="o-container">
            <div class="c-section__community__content">
                <div class="c-section__community__content__top">
                    <div class="c-section__community__content__top__title">
                        <p class="sub-title">OUR community</p>
                        <h3 class="title">
                            <p>We work with Top Coworking Space</p>
                        </h3>
                    </div>
                    <div class="c-section__community__content__top__text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae dolor eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut est vestibulum, elementum aliquet est. 
                        </p>
                    </div>
                </div>
                <div class="c-section__community__content__list main-banner">
                    <div class="c-list main-banner__slick">
                        <div class="c-list__item item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>How we can help</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>Why partners with us</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>Your benefits for community</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>How we can help</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item item">
                            <div class="c-thumbnail">
                                <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                            </div>
                            <div class="c-list__item__content">
                                <div class="c-list__item__title">
                                    <p>Why partners with us</p>
                                </div>
                            </div>
                        </div>
                        <div class="c-list__item item">
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
    <div class="c-section c-section__events">
        <div class="o-container">
            <h2 class="c-section__heading"><p>You can join in Speacial Events</p></h2>
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae dolor 
                                    eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut est vestibulum, 
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae dolor 
                                    eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut est vestibulum, 
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae dolor 
                                    eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut est vestibulum, 
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae dolor 
                                    eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut est vestibulum, 
                                    elementum aliquet est. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Suspendisse vel tortor vitae dolor eleifend mollis. </p>
                            </div>
                            <div class="c-post__item__content__date">
                                <p>05 Feb 2019</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
    <div class="c-section c-section__trust">
        <div class="o-container">
            <h2 class="c-section__heading"><p>Trusted by the biggest nonprofits,<br/> companies in the world.</p></h2>
            <div class="c-section__content">
                <div class="c-list__company">
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_cloud.png')}}" alt="">
                        </div>
                    </div>
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_dell.png')}}" alt="">
                        </div>
                    </div>
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_fiverr.png')}}" alt="">
                        </div>
                    </div>
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_asitech.png')}}" alt="">
                        </div>
                    </div>
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_sprout.png')}}" alt="">
                        </div>
                    </div>
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_konica.png')}}" alt="">
                        </div>
                    </div>
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_atlas.png')}}" alt="">
                        </div>
                    </div>
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_fusion.png')}}" alt="">
                        </div>
                    </div>
                    <div class="c-list__company__item">
                        <div class="c-thumbnail c-thumbnail--1x1">
                            <img src="{{asset('web/images/logo_socket.png')}}" alt="">
                        </div>
                    </div>
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
    <!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="{{asset('web/')}}/images/icons/go_top.png" alt="Go Top" /></a> -->
    <!-- ======== JAVASCRIPT ======== -->
    @include('web.common_layouts.script_footer')
    <!-- endbuild -->
    <!-- ======== END JAVASCRIPT ======== -->
</body>
</html>