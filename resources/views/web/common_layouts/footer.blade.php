<div class="o-container">
    <div class="c-footer__content">
        <div class="c-footer__left">
            <div class="c-footer__logo">
                <a href="#">{{__('message.FT_TITLE')}}</a>
            </div>
            <div class="c-footer__left__text">
                <p>{{__('message.FT_SOLOGAN')}}</p>
            </div>
            <div class="c-footer__left__social">
                <ul>
                    <li>
                        <a href="#" title="#"><img src="{{asset('web/')}}/images/icons/ic_fb.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" title="#"><img src="{{asset('web/')}}/images/icons/ic_tw.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" title="#"><img src="{{asset('web/')}}/images/icons/ic_inter.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" title="#"><img src="{{asset('web/')}}/images/icons/ic_print.png" alt=""></a>
                    </li>
                    <li>
                        <a href="#" title="#"><img src="{{asset('web/')}}/images/icons/ic_ig.png" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="c-footer__middle">
            <ul class="menu"">
            <li>
                <a href="">{{__('message.FT_ABOUT')}}</a>
                <ul class="sub-menu">
                    @foreach($listAllAbout as $key => $value)
                        <li id= "active_{{$value->id}}">
                            <a href="{{route('web.more.about',['name'=> str_slug($value->name),'id'=>$value->id])}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            </ul>
            <ul class="menu">
                <li>
                    <a href="">{{__('message.FT_HELP')}}</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#" title="#">FAQ</a>
                        </li>
                        <li>
                            <a href="#" title="#">Our Rules</a>
                        </li>
                        <li>
                            <a href="#" title="#">Support</a>
                        </li>
                        <li>
                            <a href="#" title="#">Tems of Use</a>
                        </li>
                        <li>
                            <a href="#" title="#">Privacy Policy</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="c-footer__right">
            <div class="text">
                <p>{{__('message.FT_SOLOGAN')}}</p>
            </div>
        </div>
    </div>
</div>
<div class="o-container__fluid">
    <div class="o-container c-footer__copyright">
        <p>{{__('message.FT_COPYRIGHT')}}</p>
    </div>
</div>