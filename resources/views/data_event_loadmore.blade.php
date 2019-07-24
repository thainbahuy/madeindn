@foreach($listEvent as $item)
    @php(
        $urlParam = ['eventSlug' => str_slug($item->name).'-'.$item->id]
    )
    <div id="event_item" class="c-post__item">
        <div class="c-post__item__thumb">
            <div class="c-thumbnail c-thumbnail__object-fit">
                <img src="{{$item->image_link}}" alt="">
                <a href="{{route('web.event.events_detail',$urlParam)}}"></a>
            </div>
        </div>
        <div class="c-post__item__content">
            <div class="c-post__item__content__title">
                <a href="{{route('web.event.events_detail',$urlParam)}}">{{Helpers::changeLanguage($item->name,$item->jp_name)}}</a>
            </div>
            <div class="c-post__item__content__text">
                <p>{{Helpers::changeLanguage($item->sort_description,$item->jp_sort_description)}} </p>
            </div>
            <div class="c-post__item__content__date">
                <p>{{ date_format(date_create($item->date_time),'d-m-Y')}}</p>
            </div>
        </div>
    </div>
@endforeach