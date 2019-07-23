<div class="o-container__fluid u-flex u-flex__align-items--center">
    <h1 class="c-header__logo">
        <a href="index.html" title="madeindanang"><img src="{{asset('web/images/logo.png')}}" alt="Motokurakai" /></a>
    </h1>
    <button id="menu-button" class="c-navbar__button only_sp"><span></span></button>
    <div class="c-header__menu">
        <!-- <a href="#" title="情報公開" class="c-btn__contact only_pc"><span class="c-icon"></span> 情報公開</a> -->
        <ul class="c-navbar">
            <li class="active"><a href="#" title="">{{__('message.HOME')}}</a></li>
            <li><a href="#" title="">{{__('message.ABOUTS')}}</a></li>
            <li class="c-navbar__dropdown">
                <a href="#" title="活動内容" class="c-navbar__dropdown__link">{{__('message.PROJECTS')}}</a>
                <ul class="c-navbar__dropdown__content">
                    <li><a href="#" title="">1</a></li>
                    <li><a href="#" title="">2</a></li>
                    <li><a href="#" title="">3</a></li>
                    <li><a href="#" title="">4</a></li>
                    <li><a href="#" title="">5</a></li>
                </ul>
            </li>
            <li><a href="#" title="">{{__('message.EVENTS')}}</a></li>
            <li class="c-navbar__dropdown">
                <a href="#" title="" class="c-navbar__dropdown__link">{{__('message.CO-SPACE')}}</a>
                <ul class="c-navbar__dropdown__content">
                    <li><a href="#" title="1">1</a></li>
                    <li><a href="#" title="2">2</a></li>
                    <li><a href="#" title="3">3</a></li>
                    <li><a href="#" title="4">4</a></li>
                    <li><a href="#" title="5">5</a></li>
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
                    <li><a href="{{url('language/jp')}}">JP</a></li>
                    <li><a href="{{url('language/en')}}">EN</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>