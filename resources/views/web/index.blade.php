<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Home</title>
    @include('web.common_layouts.head')
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->
@php
    use App\Models\Web\Project;
@endphp
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
                        <form action="{{route('web.project.project_search')}}" method="GET">
                            <div class="form-group">
                                <input type="text" name="key_word" class="input-form" placeholder="Key word Search">
                            </div>
                            <div class="form-group">
                                <select name="category" id="category">
                                    <option value="">Sort by category</option>
                                    @foreach($listCategory as $value)
                                        <option value="{{$value->id}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</option>
                                    @endforeach
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae dolor
                            eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut est
                            vestibulum, elementum aliquet est.
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
                    @foreach($listCategoryProject as $index => $value)
                        @php
                            if($index == 0) {
                                $active = "class=active";
                                $style  = "display: list-item";
                            } else {
                                $active = "";
                                $style ="";
                            }
                        @endphp
                        <li {{$active}} data-value="{{$value->id}}" style="{{$style}}">
                            <a href="#tab{{$value->id}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a>
                        </li>
                    @endforeach
                </ul>
                </ul>
            </div>
            <div class="c-section__content">
                <div class="tabs-content">
                    @foreach($listCategoryProject as $index => $value)
                        @php
                            if($index == 0) {
                                $active = "tab active";
                            } else {
                                $active = "tab";
                            }
                        @endphp
                        <div id="tab{{$value->id}}" class="{{$active}}">
                            <div class="c-list__project" id="project_{{$value->id}}">
                                @php
                                    $valueCategory  = $value->id;
                                    $listProjects   = Project::where('category_id',$valueCategory)->where('status', 1)->orderByRaw('ISNULL(position), position ASC')->paginate(Helpers::getConfig()['ProjectPage']['listProjectPaginate']);
                                @endphp
                                @include('data_projectIndex_loadmore')
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="alert alert-danger" style="display: none;">
                    <strong>Notice!</strong> Không tìm thấy sản phẩm.
                </div>
                <div class="btn-view-more">
                    <a id="loadmore_btn" href="javascript:loadMoreProjectIndex('{{route('web.index')}}');">
                        <span>VIEW MORE</span>
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel tortor vitae dolor
                            eleifend mollis. Donec ultricies in urna eget tristique. Cras arcu dolor, iaculis ut est
                            vestibulum, elementum aliquet est.
                        </p>
                    </div>
                </div>
                <div class="c-section__community__content__list main-banner">
                    <div class="c-list main-banner__slick">
                        @foreach($listCoworking as $valueCoWorking)
                            <div class="c-list__item item">
                                <div class="c-thumbnail">
                                    <a href="{{route('web.coworking.coworking_detail',['name'=> str_slug($valueCoWorking->name), 'id'=>$valueCoWorking->id])}}">
                                        <img src="{{$valueCoWorking->image_link}}" alt="">
                                    </a>
                                </div>
                                <div class="c-list__item__content">
                                    <div class="c-list__item__title">
                                        <a href="{{route('web.coworking.coworking_detail',['name'=> str_slug($valueCoWorking->name), 'id'=>$valueCoWorking->id])}}">
                                            <p>{{Helpers::changeLanguage($valueCoWorking->name,$valueCoWorking->jp_name)}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                    @include('data_event_loadmore')
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
<script src="{{asset('web/js/loadmore.js')}}"></script>

<script>

</script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>