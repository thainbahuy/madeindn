@foreach($listEvent as $item)
    @php
        $urlParam = ['eventSlug' => str_slug($item->name).'-'.$item->id];
    @endphp
    <div id="event_item" class="c-post__item">
        <div class="c-post__item__thumb">
            <div class="c-thumbnail c-thumbnail__object-fit">
                <img src="{{Helpers::$URL_THUMBNAIL.$item->image_link}}" alt="">
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
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $time_today = date('H:i:s');
                    $time_begin = date_format(date_create($item->begin_time),'H:i:s');
                    $time_end = date_format(date_create($item->end_time),'H:i:s');
                @endphp
                @if (strtotime($today) < strtotime($date))
                    <div class="upcoming">
                        <span class="label_upcoming">Upcoming</span>
                    </div>
                @elseif (strtotime($today) > strtotime($date))
                    <div class="expired">
                        <span class="label_expired">Expired</span>
                    </div>
                @else
                    @if (strtotime($time_today) < strtotime($time_begin))
                        <div class="upcoming">
                            <span class="label_upcoming">Upcoming</span>
                        </div>
                    @elseif (strtotime($time_today) > strtotime($time_end))
                        <div class="expired">
                            <span class="label_expired">Expired</span>
                        </div>
                    @else
                        <div class="now">
                            <span class="label_now">Now</span>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endforeach