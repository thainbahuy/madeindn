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
    <div class="c-banner__coworking">
        <div class="c-banner__coworking__inner">

        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__events__detail">
        <div class="o-container">
            <div class="c-section__content">
                <div class="c-section__content__left">
                    <div class="c-section__events__detail__title">
                        <p>Overview</p>
                    </div>
                    <div class="text">
                        <p>We can all see that artificial intelligence is red hot. But how can Vietnam step onto the
                            world stage to conquer AI technology?<br/>
                            About this Event</p>
                        <p>
                            Over the last few years, countries all over the world have entered the race to develop
                            artificial intelligence with 20 countries in the EU releasing their strategies on AI
                            developmentI in both R&D and education. Our neighbor country, China, is overtaking the U.S.
                            as the leader in AI with more than 30 billion US dollar invested yearly into this field. And
                            many other developed countries have budgeted billions of dollars towards AI strategies with
                            the ambition to lead the world in AI development.
                        </p>
                        <p>We can all see that artificial intelligence is red hot. But what lies beyond the hype? And
                            how can Vietnam step onto the world stage to conquer AI technology?</p>
                        <p>The Fourth Industrial Revolution is here and Vietnam is committed to leveraging this new
                            techno-economic paradigm to deliver major changes across sectors using advanced technology.
                            Vietnam is ready to compete with its Asian counterparts to emerge as an AI leader in
                            Southeast Asia. Very soon there will be many opportunities for talented developers,
                            corporations and startups in Vietnam to participate in creating an AI-friendly
                            ecosystem.</p>
                        <p>Please join McKinsey, Kambria, and our Knowledge Partners at our next upcoming Info Seminars
                            to learn more about the impact of AI in the world and how Vietnam can sync up with this
                            world trend. Vietnamese AI talents and corporates from VietAI and Vietnam Innovation Network
                            will share the current landscape of the local AI ecosystem, as well as our support for the
                            future AI movement of our country. Finally, we will introduce the Vietnam AI Grand Challenge
                            2019, a new government-backed initiative that offers developers a unique opportunity to win
                            $50,000 in total prizes. The Grand Challenge is organized by Kambria in collaboration with
                            the Ministry of Science and Technology and the Ministry of Planning and Investment of
                            Vietnam.</p>
                        <img src="{{asset('web/')}}/images/post/coworking_img1.png" alt="">
                    </div>
                </div>
                <div class="c-section__content__right">
                    <div class="c-sidebar">
                        <div class="c-sidebar__location">
                            <div class="c-sidebar__location__title">
                                <p>Location</p>
                            </div>
                            <div class="c-sidebar__location__text">
                                <p>Duy Tan University</p>
                                <p>3 Quang Trung</p>
                                <p>Da Nang</p>
                            </div>
                        </div>
                        <div class="c-sidebar__sharing">
                            <div class="c-sidebar__sharing__title">
                                <p>Sharing</p>
                            </div>
                            <ul class="c-sidebar__sharing__list">
                                <li>
                                    <a href="#">
                                        <img src="{{asset('web/')}}/images/icons/fb.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('web/')}}/images/icons/ms.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('web/')}}/images/icons/share.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('web/')}}/images/icons/twice.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('web/')}}/images/icons/in.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
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
<!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="{{asset('web/')}}/images/icons/go_top.png" alt="Go Top" /></a> -->
<!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>