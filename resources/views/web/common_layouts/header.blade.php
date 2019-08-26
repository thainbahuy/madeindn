<div class="o-container__fluid u-flex u-flex__align-items--center">
    <h1 class="c-header__logo">
        <a href="{{route('web.index')}}" title="madeindanang"><img src="{{asset('web/images/logo.png')}}" alt="Motokurakai" /></a>
    </h1>
    <button id="menu-button" class="c-navbar__button only_sp"><span></span></button>
    <div class="c-header__menu">
        <!-- <a href="#" title="情報公開" class="c-btn__contact only_pc"><span class="c-icon"></span> 情報公開</a> -->
        <ul id="list-menu" class="c-navbar">
            <li class=""><a href="{{route('web.index')}}" title="{{__('message.HD_HOME')}}"><span>{{__('message.HD_HOME')}}</span></a></li>
            <li class="about c-navbar__dropdown">
                <a href="{{Helpers::getURL()}}/about" onclick="return false;" title="{{__('message.HD_ABOUT')}}" class="c-navbar__dropdown__link"><span>{{__('message.HD_ABOUT')}}</span></a>
                <ul class="c-navbar__dropdown__content">
                    @foreach($listAllAbout as $value)
                        <li><a href="{{route('web.more.about',['name'=> str_slug($value->name),'id'=>$value->id])}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="projects c-navbar__dropdown">
                <a href="{{Helpers::getURL()}}/projects" onclick="return false;" title="{{__('message.HD_PROJECT')}}" class="c-navbar__dropdown__link"><span>{{__('message.HD_PROJECT')}}</span></a>
                <ul class="c-navbar__dropdown__content">
                    @foreach($listCategory as $value)
                        <li><a href="{{route('web.project.project_category',['name'=>str_slug($value->name)])}}" title="">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="event"><a href="{{route('web.event.events')}}" title="{{__('message.HD_EVENT')}}"><span>{{__('message.HD_EVENT')}}</span></a></li>
            <li class="co-working-space c-navbar__dropdown">
                <a href="{{route('web.coworking.coworking_space')}}" title="{{__('message.HD_CO-SPACE')}}" class="c-navbar__dropdown__link"><span>{{__('message.HD_CO-SPACE')}}</span></a>
                <ul class="c-navbar__dropdown__content">
                    @foreach($getAllCoworking as $value)
                        <li><a href="{{route('web.coworking.coworking_detail',['name'=>str_slug($value->name),'id'=>$value->id])}}" title="{{Helpers::changeLanguage($value->name,$value->jp_name)}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="contact"><a href="{{route('web.contact.contact')}}" title="{{__('message.HD_CONTACT')}}"><span>{{__('message.HD_CONTACT')}}</span></a></li>
            <li class="project"><a style="width: 100%" id="submit_project" href="{{route('web.project.project_submit')}}" title="{{__('message.HD_SUBMIT')}}" class="btn-submit"><span>{{__('message.HD_SUBMIT')}}</span></a></li>
        </ul>
        <div class="c-navbar__right">
            <div class="c-navbar__right__search">
                <form id="gg-search" action="" autocomplete="on">
                    <input id="search" name="search" type="text" placeholder="What're we looking for ?">
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
