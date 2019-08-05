<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title}}</title>
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
                <p>{{$title}}</p>
            </div>
        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__project-category">
        <div class="o-container">
            <div class="c-section__project-category__content">
                <div class="c-list__project">
                    @include('data_projectIndex_loadmore')
                </div>
                <div class="alert alert-danger" style="display: none;">
                    <strong>Notice!</strong> Không tìm thấy sản phẩm.
                </div>
                <div class="btn-view-more">
                    <a id="loadmore_btn"
                       href="javascript:loadMoreProjectByCategory('{{route('web.project.project_category',['name'=>str_slug($title)])}}');">
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
<!-- <a id="go-top" href="javascript:;" title="Go Top" class="c-btn__go-top"><img src="{{asset('web/')}}/images/icons/go_top.png" alt="Go Top" /></a> -->
<!-- ======== JAVASCRIPT ======== -->
@include('web.common_layouts.script_footer')
<script src="{{asset('web/js/loadmore.js')}}"></script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>