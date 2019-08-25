<script type="text/javascript" src="{{asset('web/libs/jquery/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/libs/fancybox/jquery.fancybox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/libs/scrollbar/jquery.scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/libs/slick/slick.min.js')}}"></script>
<!-- build:js js/main.min.js -->
<script src="{{asset('web/js/main.min.js')}}" type="text/javascript"></script>
<script src="{{asset('web/js/active.js')}}" type="text/javascript"></script>
<script async src="{{Helpers::getConfig()['Google_Search']['Script Google Search']}}"></script>
@if(Session::get('locale') != 'en')
    <script>
        $('#list-menu li a').each(function() {
            var text = $(this).text();
            if(text.length > 10) {
                $(this).text(text.substring(0, 3) + '..')
            }
        });
    </script>
@endif