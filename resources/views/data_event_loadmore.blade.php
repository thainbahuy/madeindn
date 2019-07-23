@foreach($listEvent as $item)
    <div id="event_item" class="c-post__item">
        <div class="c-post__item__thumb">
            <div class="c-thumbnail c-thumbnail__object-fit">
                <img id="image_link" src="{{asset('web/')}}/images/post/post_thum01.png" alt="">
                <a href="#"></a>
            </div>
        </div>
        <div class="c-post__item__content">
            <div class="c-post__item__content__title">
                <a id="event_name" href="#">{{$item->name}}</a>
            </div>
            <div class="c-post__item__content__text">
                <p id="sort_des">{{$item->sort_description}} </p>
            </div>
            <div class="c-post__item__content__date">
                <p id="date">{{ date_format(date_create($item->date_time),'d M Y')}}</p>
            </div>
        </div>
    </div>
@endforeach