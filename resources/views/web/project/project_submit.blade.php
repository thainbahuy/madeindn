<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__('message.TITLE_SUBMIT_PROJECT')}}</title>
@include('web.common_layouts.head')
<!-- endbuild -->
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->
<main class="c-main">
    <!-- END SECTION -->
    <div class="c-section c-section__submit-your-project">
        <div class="o-container">
            <h3 class="c-section__heading">
                <p>Submit your project</p>
            </h3>
            @if(Session::has('msg'))
                <div class="alert alert-{{Session::get('msg')}}" role="alert">
                </div>
            @endif
            <div class="c-section__submit-your-project__content">
                <div class="contact__form">
                    <form action="{{route('web.project.project_submit')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>HỌ VÀ TÊN SÁNG LẬP</p>
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
                                <input type="text" name="email" value="{{old('email')}}"
                                       placeholder="Nhập địa chỉ email">
                                <span class="error">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>Số điện thoại</p>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="phone" value="{{old('phone')}}"
                                       placeholder="Nhập số điện thoại">
                                <span class="error">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>ĐỊA CHỈ</p>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="address" value="{{old('address')}}"
                                       placeholder="Nhập địa chỉ startup đang làm việc">
                                <span class="error">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>TÊN STARTUP</p>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="name_startup" value="{{old('name_startup')}}"
                                       placeholder="Nội dung...">
                                <span class="error">{{ $errors->first('name_startup') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>Nội dung</p>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="content" value="{{old('content')}}"
                                       placeholder="Viết về Startup của bạn....">
                                <span class="error">{{ $errors->first('content') }}</span>
                            </div>
                        </div>

                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>Link Driver (Nếu có)</p>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="link_driver" value="{{old('link_driver')}}"
                                       placeholder="Link driver của bạn (nếu có)....">
                            </div>
                        </div>

                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>Nội dung</p>
                            </div>
                            <div class="contact__form__controll">
                                <div class="form-upload">
                                    <div class="input-file-container">
                                        <input class="input-file" multiple="multiple" name="files_startup[]"
                                               accept="" id="files_startup"
                                               type="file">
                                        <label tabindex="0" for="my-file" class="input-file-trigger">
                                            <img src="{{asset('web/images/')}}/icons/icon-upload.png">
                                            TẢI FILE VĂN BẢN GIỚI THIỆU
                                        </label>
                                    </div>
                                    <p>Hỗ trợ định dạng .docs, .pdf</p>
                                </div>
                                <div class="upload-content">
                                    <div class="upload-content-item">
                                        <div class="img">
                                            <img src="{{asset('web/images/')}}/icons/icon-pdf.png">
                                        </div>
                                        <div class="text-file">
                                        </div>
                                    </div>
                                </div>
                                <span class="error">{{ $errors->first('files_startup') }}</span>
                                <!-- <p class="file-return"></p> -->
                            </div>
                        </div>

                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>Nội dung</p>
                            </div>
                            <div class="contact__form__controll">
                                <div class="form-upload">
                                    <div class="input-file-container">
                                        <input class="input-file" accept="image/gif, image/jpeg, image/png"
                                               name="image_startup" id="image_startup" type="file">
                                        <label tabindex="0" for="my-file" class="input-file-trigger">
                                            <img src="{{asset('web/images/')}}/icons/icon-upload.png">
                                            TẢI HÌNH ẢNH VỀ STARTUP
                                        </label>
                                    </div>
                                    <p>Hỗ trợ định dạng .jpg</p>
                                </div>
                                <div class="upload-content">
                                    <div class="upload-content-item">
                                        <div class="img">
                                            <img src="{{asset('web/images/')}}/icons/icon-jpg.png">
                                        </div>
                                        <div class="text-image">
                                        </div>
                                        <a href="javascript:void(0)" class="close fileupload-exists"
                                           data-dismiss="fileupload" style="display: none"></a>
                                    </div>
                                    <span class="error">{{ $errors->first('image_startup') }}</span>
                                </div>
                                <!-- <p class="file-return"></p> -->
                            </div>
                        </div>
                        <input type="submit" class="submit" value="GỬI ĐẾN CHÚNG TÔI">
                    </form>
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
<script src="{{asset('web/js/project.js')}}"></script>
<script>
    if ($('.alert-success').length > 0) {
        $('.alert-success').append("{{__('message_submit_project.success')}}");
    }
    if ($('.alert-danger').length > 0) {
        $('.alert-danger').append("{{__('message_submit_project.fail')}}");
    }
</script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>