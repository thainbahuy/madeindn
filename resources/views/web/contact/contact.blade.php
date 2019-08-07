<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit Your Project</title>
@include('web.common_layouts.head')
<!-- endbuild -->
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->
<main class="c-main">
    <div class="c-section c-section__contact">
        <div class="o-container">
            <div class="c-section__contact__content">
                <div class="item">
                    <div class="title">
                        <p>Address</p>
                    </div>
                    <div class="text">
                        <p>Floor 5, Quang Trung Street, Da Nang City</p>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <p>Email</p>
                    </div>
                    <div class="text">
                        <p>contact@madeindanang.com</p>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <p>Phone</p>
                    </div>
                    <div class="text">
                        <p><span>0236 3 555 888</span><span>0905 888 555</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-section c-section__contact-info">
        <div class="c-section__contact-info__content">
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe width="100%" height="490" id="gmap_canvas" src="https://maps.google.com/maps?q=v%C4%A9nh%20trung&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                    </iframe>
                </div>
            </div>
            <div class="contact__form">
                <form action="{{route('web.contact.contact')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if(Session::has('msg'))
                        <div class="alert alert-{{Session::get('msg')}}" role="alert">
                        </div>
                    @endif
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>HỌ VÀ TÊN</p>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Nhập tên của bạn">
                            <span class="error">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>Email</p>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="email" value="{{old('email')}}" placeholder="Nhập địa chỉ email">
                            <span class="error">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>Số điện thoại</p>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="mobile" value="{{old('mobile')}}" placeholder="Nhập số điện thoại">
                            <span class="error">{{ $errors->first('mobile') }}</span>
                        </div>
                    </div>
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>Tiêu đề</p>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="title" value="{{old('title')}}" placeholder="Nội dung...">
                            <span class="error">{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>Nội dung</p>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="content" value="{{old('content')}}" placeholder="Viết gì đó bạn muốn yêu cầu chúng tôi?">
                            <span class="error">{{ $errors->first('content') }}</span>
                        </div>
                    </div>
                    <input type="submit" class="submit" value="GỬI ĐẾN CHÚNG TÔI">
                </form>
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
<script src="{{asset('web/js/project.js')}}"></script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>