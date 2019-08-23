<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{__('message.TITLE_HOME')}}</title>
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
                {{__('message.HOME_BACKGROUND_1')}}
            </div>
            <div class="c-banner__inner__title">
                {{__('message.HOME_BACKGROUND_2')}}
            </div>
            <div class="c-banner__inner__search">
                <div class="search-tabs search-form">
                    <div class="tab-content">
                        <form action="{{route('web.project.project_search')}}" method="GET">
                            <div class="form-group">
                                <input type="text" name="key_word" class="input-form"
                                       placeholder="{{__('message.HOME_BACKGROUND_3')}}">
                            </div>
                            <div class="form-group">
                                <select name="category" id="category">
                                    <option value="">{{__('message.HOME_BACKGROUND_4')}}</option>
                                    @foreach($listCategory as $value)
                                        <option value="{{$value->id}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn-search-all">
                                {{__('message.HOME_BACKGROUND_5')}}
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
                        <p class="sub-title"> {{__('message.HOME_BACKGROUND_6')}}</p>
                        <h3 class="title">
                            <p> {{__('message.HOME_BACKGROUND_7')}}</p>
                        </h3>
                    </div>
                    <div class="c-section__community__content__top__text">
                        <p>
                            {{__('message.HOME_BACKGROUND_8')}}
                        </p>
                    </div>
                </div>
                <div class="c-section__community__content__list main-banner">
                    <div class="c-list main-banner__slick">
                        @foreach($listAbout as $valueAbout)
                            <div class="c-list__item item">
                                <div class="c-thumbnail">
                                    <img src="{{Helpers::$URL_THUMBNAIL.$valueAbout->image_link}}" alt="">
                                </div>
                                <div class="c-list__item__content">
                                    <div class="c-list__item__title">
                                        <a href="{{route('web.more.about',['name'=> str_slug($valueAbout->name), 'id'=> $valueAbout->id])}}">{{ Helpers::changeLanguage($valueAbout->name,$valueAbout->jp_name)}}</a>
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
    <div class="c-section c-section__project">
        <div class="o-container">
            <h2 class="c-section__heading"><p>{{__('message.HOME_PROJECT')}}</p></h2>
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
                            <a onclick="checkDataIsExist({{$value->id}})"
                               href="#tab{{$value->id}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a>
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
                            <div data-total="{{$arrListProject[$value->id]->total()}}" class="c-list__project"
                                 id="project_{{$value->id}}">
                                @php
                                    $valueCategory  = $value->id;
                                @endphp
                                @include('data_projectIndex_loadmore')
                            </div>
                        </div>
                    @endforeach
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
                        <p class="sub-title">{{__('message.HOME_COWK_1')}}</p>
                        <h3 class="title">
                            <p>{{__('message.HOME_COWK_2')}}</p>
                        </h3>
                    </div>
                    <div class="c-section__community__content__top__text">
                        <p>
                            {!! __('message.HOME_COWK_3')  !!}
                        </p>
                    </div>
                </div>
                <div class="c-section__community__content__list main-banner">
                    <div class="c-list main-banner__slick">
                        @foreach($listCoworking as $valueCoWorking)
                            <div class="c-list__item item">
                                <div class="c-thumbnail">
                                    <a href="{{route('web.coworking.coworking_detail',['name'=> str_slug($valueCoWorking->name), 'id'=>$valueCoWorking->id])}}">
                                        <img src="{{Helpers::$URL_THUMBNAIL.$valueCoWorking->image_link}}" alt="">
                                    </a>
                                </div>
                                <div class="c-list__item__content">
                                    <div class="c-list__item__title">
                                        <a href="{{route('web.coworking.coworking_detail',['name'=> str_slug($valueCoWorking->name), 'id'=>$valueCoWorking->id])}}">{{Helpers::changeLanguage($valueCoWorking->name,$valueCoWorking->jp_name)}}</a>
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
            <h2 class="c-section__heading"><p>{{__('message.HOME_EVENT')}}</p></h2>
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
            <h2 class="c-section__heading"><p>{{__('message.HOME_COMPANY1')}} <br/> {{__('message.HOME_COMPANY2')}}</p>
            </h2>
            <div class="c-section__content">
                <div class="c-list__company">
                    @foreach($listPartner as $item)
                        <div class="c-list__company__item">
                            <div class="c-thumbnail c-thumbnail--1x1">
                                <img src="{{$item->image_link}}" alt="{{$item->name}}">
                            </div>
                        </div>
                    @endforeach
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
<!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
<script src="{{asset('web/js/loadmore.js')}}"></script>
<script async src="https://cse.google.com/cse.js?cx=011212294835017365594:emzusx8uiuk"></script>
<div class="gcse-search"></div>
@if($listBackground != null)
    <script>
        $(function () {
            $('.c-banner').css("background-image", "url({{Helpers::$URL_BASIC.$listBackground->image_link}})");
            checkDataIsExist($('.tabs-list li').first().data('value'));
        });

        $(document).ready(function () {
            $("#gg-search").submit(function (e) {
                $('#___gcse_0').show();
                e.preventDefault(e);
                console.log($("#gg-search").find('#search').val());
                let searchText = $("#gg-search").find('#search').val();
                $('#gsc-i-id1').val(searchText);
                $('.gsc-search-button').click();
            });
            $(document).on("click", ".gsc-modal-background-image", function () {
                $('#___gcse_0').hide();
            });
            $(document).on("click", ".gsc-results-close-btn", function () {
                $('#___gcse_0').hide();
            });

        });
    </script>
@endif
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>