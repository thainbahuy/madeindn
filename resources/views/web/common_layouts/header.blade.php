<div class="o-container__fluid u-flex u-flex__align-items--center">
    <h1 class="c-header__logo">
        <a href="{{route('web.index')}}" title="madeindanang"><img src="{{asset('web/images/logo.png')}}" alt="Motokurakai" /></a>
    </h1>
    <button id="menu-button" class="c-navbar__button only_sp"><span></span></button>
    <div class="c-header__menu">
        <!-- <a href="#" title="情報公開" class="c-btn__contact only_pc"><span class="c-icon"></span> 情報公開</a> -->
        <ul class="c-navbar">
            <li class="active"><a href="{{route('web.index')}}" title="">{{__('message.HOME')}}</a></li>
            <li><a href="#" title="">{{__('message.ABOUTS')}}</a></li>
            <li class="c-navbar__dropdown">
                <a href="#" title="活動内容" class="c-navbar__dropdown__link">{{__('message.PROJECTS')}}</a>
                <ul class="c-navbar__dropdown__content">
                    @foreach($listCategory as $value)
                        <li><a href="{{route('web.project.project_category',['name'=>str_slug($value->name)])}}" title="">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{route('web.event.events')}}" title="">{{__('message.EVENTS')}}</a></li>
            <li class="c-navbar__dropdown">
                <a href="{{route('web.coworking.coworking_space')}}" title="" class="c-navbar__dropdown__link">{{__('message.CO-SPACE')}}</a>
                <ul class="c-navbar__dropdown__content">
                    @foreach($getAllCoworking as $value)
                        <li><a href="{{route('web.coworking.coworking_detail',['name'=>str_slug($value->name),'id'=>$value->id])}}" title="{{Helpers::changeLanguage($value->name,$value->jp_name)}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#" title="">Contact Us</a></li>
            <li><a href="#" title="" class="btn-submit">{{__('message.SUBMIT-PJ')}}</a></li>
        </ul>
        <div class="c-navbar__right">
            <div class="c-navbar__right__search">
                <form action="" autocomplete="on">
                    <input id="search" name="search" type="text" placeholder="{{__('message.Looking')}}">
                    <input id="search_submit" value="Rechercher" type="submit">
                    <span class="c-icon__search"></span>
                </form>
            </div>
            <div class="c-navbar__right__language">
                <ul>
                    @if (Session::get('locale') == 'en')
                        <li><a href="{{url('language/jp')}}">JP</a></li>
                    @else
                        <li><a href="{{url('language/en')}}">EN</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>