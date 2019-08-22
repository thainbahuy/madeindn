@if(isset($arrListProject))
    @foreach($arrListProject as $key => $value)
        @foreach($value as $valueProject)
            @if(isset($valueCategory) && $valueProject->category_id == $valueCategory)
                <div class="c-list__project__item">
                    <div class="c-thumbnail">
                        <a href="{{route('web.project.project_detail',['name'=>str_slug($valueProject->name),'id' =>$valueProject->id])}}">
                            <img src="{{Helpers::$URL_THUMBNAIL.$valueProject->image_link}}" alt="">
                        </a>
                    </div>
                    <div class="c-list__project__item__content">
                        <div class="c-list__project__item__sub">
                            <p>{{Helpers::changeLanguage($valueProject->category->name,$valueProject->category->jp_name)}}</p>
                        </div>
                        <div class="c-list__project__item__title">
                            <a href="{{route('web.project.project_detail',['name'=>str_slug($valueProject->name),'id'=>$valueProject->id])}}">{{Helpers::changeLanguage($valueProject->name,$valueProject->jp_name)}}</a>
                        </div>
                        <div class="c-list__project__item__profile">
                            <div class="avatar">
                                @if($valueProject->author_avatar == null)
                                    <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                @else
                                    <img src="{{$valueProject->author_avatar}}" alt="">
                                @endif
                            </div>
                            <div class="name">
                                <p><span>By</span>{{$valueProject->author_name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
@else
    @foreach($listProjects as $valueProject)
        <div class="c-list__project__item">
            <div class="c-thumbnail">
                <a href="{{route('web.project.project_detail',['name'=>str_slug($valueProject->name),'id' =>$valueProject->id])}}">
                    <img src="{{Helpers::$URL_THUMBNAIL.$valueProject->image_link}}" alt="">
                </a>
            </div>
            <div class="c-list__project__item__content">
                <div class="c-list__project__item__sub">
                    <p>{{Helpers::changeLanguage($valueProject->category->name,$valueProject->category->jp_name)}}</p>
                </div>
                <div class="c-list__project__item__title">
                    <a href="{{route('web.project.project_detail',['name'=>str_slug($valueProject->name),'id'=>$valueProject->id])}}">{{Helpers::changeLanguage($valueProject->name,$valueProject->jp_name)}}</a>
                </div>
                <div class="c-list__project__item__profile">
                    <div class="avatar">
                        @if($valueProject->author_avatar == null)
                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                        @else
                            <img src="{{$valueProject->author_avatar}}" alt="">
                        @endif
                    </div>
                    <div class="name">
                        <p><span>By</span>{{$valueProject->author_name}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif