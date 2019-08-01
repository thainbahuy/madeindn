<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title}}</title>
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
                            <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
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
                    <img src="{{asset('web/')}}/images/post/img_detail01.png" alt="">
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
                                        <img src="{{asset('web/')}}/images/4-3_1024x767.png" alt="">
                                    </div>
                                </div>
                                <div class="c-sidebar__profile__name">
                                    <p>Founder</p>
                                    <p>{{$getProject->author_name}}</p>
                                </div>
                            </div>
                            <div class="c-sidebar__profile__bot">
                                <div class="text">
                                    <p>{{ Helpers::changeLanguage($getProject->author_description,$getProject->author_description_jp)}}</p>
                                </div>
                                <div class="c-form">
                                    <div class="c-form__body">
                                        <form id="contactForm1" name="myForm" action="{{route('web.project.project_detail',['name'=>str_slug($getProject->name),'id'=>$getProject->id])}}" method="POST">
                                            {{csrf_field()}}
                                            <div class="c-form__row">
                                                <input type="text" placeholder="Your email" name="email" id="email">
                                            </div>
                                            <div class="c-form-error">
                                                <span class="email_error"></span>
                                            </div>
                                            <div class="c-form__row">
                                                <input type="phone" placeholder="Your moblie" name="phone">
                                            </div>
                                            <div class="c-form-error">
                                                <span class="phone_error"></span>
                                            </div>
                                            <div class="c-form__row">
                                                <textarea id="content_message" name="content_message" placeholder="Type something..."></textarea>
                                            </div>
                                            <div class="c-form-error">
                                                <span class="content_message_error"></span>
                                            </div>
                                            <div style="text-align: center;" class="c-form_submit">
                                                <button class="submit">SEND</button>
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
    <!-- endbuild -->
    <!-- ======== END JAVASCRIPT ======== -->
<script>
    function validateForm(){
        var email_check = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var phone_check = /^[0-9]{9,10}$/;
        var content_check = /^[a-zA-Z0-9]{1,}$/;

        if (!email_check.test(document.myForm.email.value)){
            $('.email_error').html('Lỗi Email');
            return false;
        } else {
            $('.email_error').empty();
        }
        if (!phone_check.test(document.myForm.phone.value)){
            $('.phone_error').html('Lỗi định dạng số điện thoại');
            return false;
        } else {
            $('.phone_error').empty();
        }

        if (!content_check.test($('textarea#content_message').val())){
            $('.content_message_error').html('Nội dung tối thiểu 100 ký tự');
            return false;
        } else {
            $('.content_message_error').empty();
        }
        return true;
    }
    $(function() {
        $('#contactForm1').submit(function(event) {
            if(!validateForm()){
                return false;
            }
            event.preventDefault(); // Prevent the form from submitting via the browser
            var form = $(this);
            var data = form.serialize();
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize()
            }).done(function(data) {
                $(".submit").remove();
                $('.c-form_submit').empty();
                $(".c-form_submit").append("<img style='max-width: 25%;' src='https://icon-library.net/images/check-icon-small/check-icon-small-16.jpg' alt=''>");
            }).fail(function(data) {
                alert("Vui lòng thử lại");
                $('#img_fail').remove();
                $(".c-form_submit").append("<div id='img_fail'><img style='max-width: 25%;' src='https://icon-library.net/images/fail-icon/fail-icon-3.jpg' alt='' ></div>");
            });
        });
    });
</script>

</body>
</html>