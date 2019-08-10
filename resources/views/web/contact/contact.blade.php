<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{@trans('message.TITLE_CONTACT')}}</title>
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
                        <p>{{Helpers::getConfig()['Info_Company']['Adress']}}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <p>Email</p>
                    </div>
                    <div class="text">
                        <p>{{Helpers::getConfig()['Info_Company']['Email']}}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <p>Phone</p>
                    </div>
                    <div class="text">
                        <p>
                            <span>{{Helpers::getConfig()['Info_Company']['Phone_1']}}</span><span>{{Helpers::getConfig()['Info_Company']['Phone_2']}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="c-section c-section__contact-info">
        <div class="c-section__contact-info__content">
            <div class="mapouter">
                @php
                    $address = Helpers::changeLanguage(Helpers::getConfig()['Info_Company']['AddressMap_English'],Helpers::getConfig()['Info_Company']['AddressMap_Japan'],true)
                @endphp
                <iframe id="map"
                        width="100%"
                        height="550"
                        frameborder="0" style="border:0"
                        src="" allowfullscreen>
                </iframe>
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
                            <input type="text" name="content" value="{{old('content')}}"
                                   placeholder="Viết gì đó bạn muốn yêu cầu chúng tôi?">
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
<script>
    $(document).ready(function () {
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
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>