<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__('message.TITLE_SEARCH_PROJECT',['name' => app('request')->input('key_word')])}}</title>
    @include('web.common_layouts.head')
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->

<main class="c-main">
    <div class="c-section c-section__search">
        <div class="c-section__search__content">
            <div class="search-tabs search-form">
                <div class="tab-content">
                    <form action="{{route('web.project.project_search')}}" method="GET">
                        <div class="form-group">
                            <input type="text" name="key_word" class="input-form" placeholder="{{__('message.HOME_BACKGROUND_3')}}" value="{{app('request')->input('key_word')}}">
                        </div>
                        <div class="form-group">
                            <select name="category" id="category">
                                <option value="">{{__('message.HOME_BACKGROUND_4')}}</option>
                                @foreach($listCategory as $value)
                                    <option @if( app('request')->input('category') == $value->id) selected @endif value="{{$value->id}}">{{Helpers::changeLanguage($value->name,$value->jp_name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn-search-all">
                            {{__('message.HOME_BACKGROUND_5')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
    <div class="c-section c-section__result-number">
        <div class="o-container">
            <div class="number-all">
                <p>
                    <span id="total_project" data-total ="{{$listProjects->total()}}" >Explore</span> {{$listProjects->total()}} projects
                </p>
            </div>
        </div>
    </div>
    <div class="c-section c-section__project-category">
        <div class="o-container">
            <div class="c-section__project-category__content">
                <div class="c-list__project">
                    @include('data_projectIndex_loadmore')
                </div>
                <div class="btn-view-more">
                    <a id="loadmore_btn"
                       href="javascript:loadMoreSearchProject('{{route('web.project.project_search')}}','{{app('request')->input('key_word') }}','{{app('request')->input('category')}}');">
                        <span>VIEW MORE</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->
</main>
<!-- END MAIN -->
<footer id="footer" class="c-footer">
    @include('web.common_layouts.footer')
</footer>
<!-- END FOOTER -->
<!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="images/icons/go_top.png" alt="Go Top" /></a> -->
<!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
<script src="{{asset('web/js/loadmore.js')}}"></script>
<script>
    $(document).ready(function(){
        var e = document.getElementById("category");
        $('.select-styled').text(e.options[e.selectedIndex].text);
        if($('.c-list__project__item').length == $('#total_project').attr("data-total")){
            $('#loadmore_btn').hide();
        }
    })
</script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>