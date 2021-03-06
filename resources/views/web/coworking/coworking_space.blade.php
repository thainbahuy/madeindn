<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{@trans('message.TITLE_COWORKING')}}</title>
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
                        <p class="sub-title">{{__('message.HOME_COWK_1')}}</p>
                        <h3 class="title">
                            <p>{{__('message.HOME_COWK_2')}}</p>
                        </h3>
                    </div>
                    <div class="c-section__coworking__content__top__text">
                        <p>{!! __('message.HOME_COWK_3')  !!}</p>
                    </div>
                </div>
                <div class="c-section__coworking__content__list">
                    <div class="c-list">
                        @foreach($listCoworking as $items)
                            <div class="c-list__item">
                                <div class="c-thumbnail">
                                    <a href="{{route('web.coworking.coworking_detail',['name' => str_slug($items->name),'id'=>$items->id])}}">
                                        <img src="{{Helpers::$URL_THUMBNAIL.$items->image_link}}" alt="{{$items->name}}">
                                    </a>
                                </div>
                                <div class="c-list__item__content">
                                    <div class="c-list__item__title">
                                        <a href="{{route('web.coworking.coworking_detail',['name' => str_slug($items->name),'id'=>$items->id])}}">{{Helpers::changeLanguage($items->name,$items->jp_name)}}</a>
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