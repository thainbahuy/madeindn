<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__('message.TITLE_PROJECT_DETAIL',['name' => Helpers::changeLanguage($getProject->name,$getProject->jp_name)])}}</title>
    @include('web.common_layouts.head')
</head>
<body>
<header id="header" class="c-header c-header__border">
    @include('web.common_layouts.header')
</header>
<!-- END HEADER -->
<main class="c-main">
    <div class="c-section c-section__project__banner">
        <div class="o-container">
            <div class="c-section__project__banner__top">
                <div class="c-section__project__banner__profile">
                    <div class="avatar c-thumbnail c-thumbnail__object-fit">
                        @if($getProject->author_avatar == null)
                            <img src="{{asset('web/images/4-3_1024x767.png')}}" alt="">
                        @else
                            <img src="{{$getProject->author_avatar}}" alt="">
                        @endif
                    </div>
                    <div class="name">
                        <p><span>By</span>{{$getProject->author_name}}</p>
                    </div>
                </div>
                <div class="c-section__project__banner__title">
                    <p>{{Helpers::changeLanguage($getProject->name,$getProject->jp_name)}}</p>
                </div>
            </div>
            <div class="c-section__project__banner__bot">
                <img style="width: 100%" height="auto" src="{{Helpers::$URL_DETAIL.$getProject->image_link}}" alt="">
            </div>
        </div>
    </div>
    <!-- END BANNER -->
    <div class="c-section c-section__project__detail">
        <div class="o-container">
            <div class="c-section__content">
                <div class="c-section__content__left">
                    <div class="c-section__project__detail__title">
                        <p>Overview</p>
                    </div>
                    <div class="text">
                        {!! Helpers::changeLanguage($getProject->overview,$getProject->jp_overview) !!}
                    </div>
                </div>
                <div class="c-section__content__right">
                    <div class="c-sidebar__profile">
                        <div class="c-sidebar__profile__top">
                            <div class="c-sidebar__profile__avatar">
                                <div class="avatar c-thumbnail c-thumbnail__object-fit">
                                    @if($getProject->author_avatar == null)
                                        <img src="{{asset('web/images/4-3_1024x767.png')}}" alt="">
                                    @else
                                        <img src="{{$getProject->author_avatar}}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="c-sidebar__profile__name">
                                <p>{{__('message.PROJECT_FOUNDER')}}</p>
                                <p>{{$getProject->author_name}}</p>
                            </div>
                            <div class="text">
                                <p>{{ Helpers::changeLanguage($getProject->author_description,$getProject->author_description_jp)}}</p>
                            </div>
                        </div>
                        <div class="c-sidebar__profile__bot">
                            <div class="c-form">
                                <div class="c-form__body">
                                    <p class="description_project">{{__('message.PROJECT_NOTICE')}}</p>
                                    <form id="contactForm1" name="myForm"
                                          action="{{route('web.project.project_detail',['name'=>str_slug($getProject->name),'id'=>$getProject->id])}}"
                                          method="POST">
                                        {{csrf_field()}}
                                        <div class="c-form__row">
                                            <input type="text" placeholder="{{__('message_contact.placeholder_email')}}"
                                                   name="email" id="email">
                                        </div>
                                        <div class="c-form-error">
                                            <span class="email_error"></span>
                                        </div>
                                        <div class="c-form__row">
                                            <input type="phone"
                                                   placeholder="{{__('message_contact.placeholder_phone')}}"
                                                   name="phone" id="phone">
                                        </div>
                                        <div class="c-form-error">
                                            <span class="phone_error"></span>
                                        </div>
                                        <div class="c-form__row">
                                            <textarea id="content_message" name="content_message"
                                                      placeholder="{{__('message_contact.placeholder_content')}}"></textarea>
                                        </div>
                                        <div class="c-form-error">
                                            <span class="content_message_error"></span>
                                        </div>
                                        <div class="button_submit">
                                            <button class="submit">{{__('message_contact.submit')}}</button>
                                        </div>
                                        <div style="text-align: center;" class="c-form_submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script>
    var config = {
        message: {
            success: "{{ __('message_contact.success') }}",
            fail: "{{__('message_contact.fail')}}",
            error_email : "{{__('message_contact.email.email')}}",
            error_phone : "{{__('message_contact.mobile.max')}}",
            error_content : "{{__('message_contact.content.required')}}",
        }
    };
</script>
<script src="{{asset('web/js/contact.js')}}"></script>
<!-- endbuild -->
<!-- ======== END JAVASCRIPT ======== -->
</body>
</html>