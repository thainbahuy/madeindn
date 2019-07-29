@foreach($listEvent as $item)
    @php
        $urlParam = ['eventSlug' => str_slug($item->name).'-'.$item->id];
    @endphp
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
                @php
                    $date = date_format(date_create($item->date_time),'Y-m-d');
                    $today = date("Y-m-d");
                @endphp
                @if (strtotime($today) <= strtotime($date))
                    <div class="upcoming">
                        <span class="label_upcoming">Upcoming</span>
                    </div>
                @else
                    <div class="expired">
                        <span class="label_expired">Expired</span>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endforeach