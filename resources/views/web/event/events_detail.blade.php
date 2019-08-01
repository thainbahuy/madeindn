<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{Helpers::changeLanguage($event->name, $event->jp_name)}}</title>
    @include('web.common_layouts.head')
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->

<main class="c-main">
    <div class="c-banner__events">
        <div class="c-banner__events__inner">

        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__events__detail">
        <div class="o-container">
            <div class="c-section__content">
                <div class="c-section__content__left">
                    <div class="c-section__events__detail__title">
                        <p>Overview</p>
                    </div>
                    <div class="text">
                        {!!Helpers::changeLanguage($event->overview,$event->jp_overview) !!}
                    </div>
                </div>
                <div class="c-section__content__right">
                    <div class="c-sidebar">
                        <div class="c-sidebar__date">
                            <div class="c-sidebar__date__title">
                                <p>Date and Time</p>
                            </div>
                            <div class="c-sidebar__date__text">
                                <p>{{ date_format(date_create($event->date_time),'d-m-Y')}}</p>
                                <p> {{date_format(date_create($event->begin_time),'G:i A')}}
                                    – {{date_format(date_create($event->end_time),'G:i A')}}</p>
                            </div>
                        </div>
                        <div class="c-sidebar__location">
                            <div class="c-sidebar__location__title">
                                <p>Location</p>
                            </div>
                            @php
                                $location = Helpers::convertToJson(Helpers::changeLanguage($event->location, $event->jp_location));
                            @endphp
                            @if ($location != null)
                                <div class="c-sidebar__location__text">
                                    @foreach($location as $key => $value)
                                        <p>{{$value}}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="c-sidebar__sharing">
                            <div class="c-sidebar__sharing__title">
                                <p>Sharing</p>
                            </div>
                            @if ($socical_link != null)
                                <ul class="c-sidebar__sharing__list">
                                    @foreach($socical_link as $image => $link)
                                        @if (!empty($link))
                                            <li>
                                                <a href="{{$link}}">
                                                    <img src="{{asset('web/images/icons/'.$image)}}" alt="">
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
    <div class="c-section c-section__map">
        <div class="c-section__map__content">
            <div class="mapouter">
                <div id="gmap_canvas">
                    @php
                        $map = json_decode($event->location, true);
                        $address  = urlencode($map[1].'-'.$map[2]);
                    @endphp
                    <iframe id="map"
                            width="100%"
                            height="550"
                            frameborder="0" style="border:0"
                            src="" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- END MAIN -->

<footer id="footer" class="c-footer">
    @include('web.common_layouts.footer')
</footer>
<!-- END FOOTER -->
<!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="{{asset('web/')}}/images/icons/go_top.png" alt="Go Top" /></a> -->
<!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
<script>

</script>
<script>
    $urlImage = '{{$event->image_link}}'
    $(document).ready(function () {
        $('.c-banner__events').css('background-image', 'url(' + $urlImage + ')');

        $.ajax(
            {
                type: "POST",
                url: 'https://maps.googleapis.com/maps/api/geocode/json?address={{$address}}&key=AIzaSyBqORBqnokRCmGGt3XqEWl21Ih6TCY38_A',
            })
            .done(function (data) {
                $('#map').attr('src', 'https://www.google.com/maps/embed/v1/place?key=AIzaSyBqORBqnokRCmGGt3XqEWl21Ih6TCY38_A&zoom=18&q=place_id:' + data.results[0].place_id)

            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    });
</script>

</body>
</html>