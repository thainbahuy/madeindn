<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__('message.TITLE_PROJECT_CATEGORY',['name' => Helpers::changeLanguage($CategoryByProject['name'],$CategoryByProject['jp_name'])])}}</title>
@include('web.common_layouts.head')
<!-- endbuild -->
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->

<main class="c-main">
    <div class="c-section c-section__technology">
        <div class="o-container">
            <div class="c-section__technology__title">
                <p>{{Helpers::changeLanguage($CategoryByProject['name'],$CategoryByProject['jp_name'])}}</p>
            </div>
        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__project-category">
        <div class="o-container">
            <div class="c-section__project-category__content">
                <div id="total_project" data-total="{{$listProjects->total()}}" class="c-list__project">
                    @include('data_projectIndex_loadmore')
                </div>
                <div class="btn-view-more">
                    <a id="loadmore_btn"
                       href="javascript:loadMoreProjectByCategory('{{route('web.project.project_category',['name'=>$CategoryByProject['slug_name']])}}');">
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
<!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
<script src="{{asset('web/js/loadmore.js')}}"></script>
<script>
    $(document).ready(function(){
        if($('.c-list__project__item').length == $('#total_project').attr("data-total")){
            $('#loadmore_btn').hide();
        }
    })
</script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>