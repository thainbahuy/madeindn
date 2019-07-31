@foreach($listProjects as $valueProject)
    @if(isset($valueCategory) && $valueProject->category_id == $valueCategory)
        <div class="c-list__project__item"">
            <div class="c-thumbnail">
                <a href="{{route('web.project.project_detail',['name'=>str_slug($valueProject->name),'id' =>$valueProject->id])}}">
                    <img src="{{$valueProject->image_link}}" alt="">
                </a>
            </div>
            <div class="c-list__project__item__content">
                <div class="c-list__project__item__sub">
                    <p>{{Helpers::changeLanguage($valueProject->category->name,$valueProject->category->jp_name)}}</p>
                </div>
                <div class="c-list__project__item__title">
                    <a href="{{route('web.project.project_detail',['name'=>str_slug($valueProject->name),'id'=>$valueProject->id])}}">
                        <p>{{Helpers::changeLanguage($valueProject->name,$valueProject->jp_name)}}</p>
                    </a>
                </div>
                <div class="c-list__project__item__profile">
                    <div class="avatar">
                        <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                    </div>
                    <div class="name">
                        <p><span>By</span>{{$valueProject->author_name}}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="c-list__project__item"">
            <div class="c-thumbnail">
            <a href="{{route('web.project.project_detail',['name'=>str_slug($valueProject->name),'id' =>$valueProject->id])}}">
                <img src="{{$valueProject->image_link}}" alt="">
            </a>
        </div>
            <div class="c-list__project__item__content">
            <div class="c-list__project__item__sub">
                <p>{{Helpers::changeLanguage($valueProject->category->name,$valueProject->category->jp_name)}}</p>
            </div>
            <div class="c-list__project__item__title">
                <a href="{{route('web.project.project_detail',['name'=>str_slug($valueProject->name),'id'=>$valueProject->id])}}">
                    <p>{{Helpers::changeLanguage($valueProject->name,$valueProject->jp_name)}}</p>
                </a>
            </div>
            <div class="c-list__project__item__profile">
                <div class="avatar">
                    <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                </div>
                <div class="name">
                    <p><span>By</span>{{$valueProject->author_name}}</p>
                </div>
            </div>
        </div>
        </div>
    @endif
@endforeach
