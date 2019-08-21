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
                <p>{{__('message_submit_project.heading_project')}}</p>
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
                                <p>{{__('message_submit_project.name')}} <span class="error">(*)</span></p>
                                <small>( {!!__('message_submit_project.small_name')!!} )</small>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="name" value="{{old('name')}}"
                                       placeholder="{{__('message_submit_project.placeholder_name')}}">
                                <span class="error">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>{{__('message_submit_project.email')}} <span class="error">(*)</span></p>
                                <small>( {!!__('message_submit_project.small_email')!!} )</small>
                            </div>
                            <div class="contact__form__controll">
                                <input type="email" name="email" value="{{old('email')}}"
                                       placeholder="{{__('message_submit_project.placeholder_email')}}">
                                <span class="error">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>{{__('message_submit_project.phone')}} <span class="error">(*)</span></p>
                                <small>( {!!__('message_submit_project.small_phone')!!} )</small>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="phone" value="{{old('phone')}}"
                                       placeholder="{{__('message_submit_project.placeholder_phone')}}">
                                <span class="error">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>{{__('message_submit_project.address')}} <span class="error">(*)</span></p>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="address" value="{{old('address')}}"
                                       placeholder="{{__('message_submit_project.placeholder_address')}}">
                                <span class="error">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>{{__('message_submit_project.name_startup')}} <span class="error">(*)</span></p>
                                <small>( {!!__('message_submit_project.small_name_startup')!!} )
                                </small>
                            </div>
                            <div class="contact__form__controll">
                                <input type="text" name="name_startup" value="{{old('name_startup')}}"
                                       placeholder="{{__('message_submit_project.placeholder_name_startup')}}">
                                <span class="error">{{ $errors->first('name_startup') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>{{__('message_submit_project.content')}} <span class="error">(*)</span></p>
                            </div>
                            <div class="contact__form__controll">
                                <textarea style="width: 100%"
                                          placeholder="{{__('message_submit_project.placeholder_content')}}"
                                          name="content">{{old('content')}}</textarea>
                                <span class="error">{{ $errors->first('content') }}</span>
                            </div>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>{{__('message_submit_project.link_driver')}}</p>
                                <small>( {!!__('message_submit_project.small_link_driver')!!} )</small>
                            </div>
                            <div class="contact__form__controll">
                                <input type="url" onblur="checkURL(this)" name="link_driver"
                                       value="{{old('link_driver')}}"
                                       placeholder="{{__('message_submit_project.placeholder_link_driver')}}">
                            </div>
                            <span class="error">{{ $errors->first('link_driver')}}</span>
                        </div>
                        <div class="contact__form__row">
                            <div class="contact__form__label">
                                <p>{{__('message_submit_project.files_startup')}}</p>
                            </div>
                            <div class="contact__form__controll">
                                <div class="form-upload">
                                    <div class="input-file-container">
                                        <input class="input-file" multiple="multiple" name="files_startup[]"
                                               accept="" id="files_startup"
                                               type="file">
                                        <label tabindex="0" for="my-file" class="input-file-trigger">
                                            <img src="{{asset('web/images/icons/icon-upload.png')}}">
                                            {{__('message_submit_project.download_files_startup')}}
                                        </label>
                                    </div>
                                    <p>{{__('message_submit_project.placeholder_files_startup')}}</p>
                                </div>
                                <div class="upload-content">
                                    <div class="upload-content-item">
                                        <div class="img">
                                            <img src="{{asset('web/images/icons/icon-pdf.png')}}">
                                        </div>
                                        <div class="text-file">
                                        </div>
                                    </div>
                                </div>
                                <span class="error">{{ $errors->first('files_startup.*')}}</span>
                            </div>
                        </div>
                        {{--                        <div class="contact__form__row">--}}
                        {{--                            <div class="contact__form__label">--}}
                        {{--                                <p>{{__('message_submit_project.image_startup')}}</p>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="contact__form__controll">--}}
                        {{--                                <div class="form-upload">--}}
                        {{--                                    <div class="input-file-container">--}}
                        {{--                                        <input class="input-file" accept="image/gif, image/jpeg, image/png"--}}
                        {{--                                               name="image_startup" id="image_startup" type="file">--}}
                        {{--                                        <label tabindex="0" for="my-file" class="input-file-trigger">--}}
                        {{--                                            <img src="{{asset('web/images/icons/icon-upload.png')}}">--}}
                        {{--                                            {{__('message_submit_project.download_image_startup')}}--}}
                        {{--                                        </label>--}}
                        {{--                                    </div>--}}
                        {{--                                    <p>{{__('message_submit_project.placeholder_image_startup')}}</p>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="upload-content">--}}
                        {{--                                    <div class="upload-content-item">--}}
                        {{--                                        <div class="img">--}}
                        {{--                                            <img src="{{asset('web/images/icons/icon-jpg.png')}}">--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="text-image">--}}
                        {{--                                        </div>--}}
                        {{--                                        <a href="javascript:void(0)" class="close fileupload-exists"--}}
                        {{--                                           data-dismiss="fileupload" style="display: none"></a>--}}
                        {{--                                    </div>--}}
                        {{--                                    <span class="error">{{ $errors->first('image_startup') }}</span>--}}
                        {{--                                </div>--}}
                        {{--                                <!-- <p class="file-return"></p> -->--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <input type="submit" class="submit" value="{{__('message_submit_project.submit')}}">
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
    function checkURL(abc) {
        var string = abc.value;
        if (string.length > 10) {
            if (!~string.indexOf("http")) {
                string = "http://" + string;
            }
            abc.value = string;
            return abc
        }
    }

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