<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{@trans('message.TITLE_CONTACT')}}</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                        <p>{{__('message.CONTACT_ADDRESS')}}</p>
                    </div>
                    <div class="text">
                        <p>{{Helpers::getConfig()['Info_Company']['Adress']}}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <p>{{__('message.CONTACT_EMAIL')}}</p>
                    </div>
                    <div class="text">
                        <p>{{Helpers::getConfig()['Info_Company']['Email']}}</p>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <p>{{__('message.CONTACT_PHONE')}}</p>
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
                            <p>{{__('message_contact.name')}} <span class="error">(*)</span></p>
                            <small>( {!!__('message_contact.small_name')!!} )</small>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="name" value="{{old('name')}}"
                                   placeholder="{{__('message_contact.placeholder_name')}}">
                            <span class="error">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>{{__('message_contact.email')}} <span class="error">(*)</span></p>
                            <small>( {!!__('message_contact.small_email_1')!!} )</small> <br/>
                            <small>( {!!__('message_contact.small_email_2')!!} )</small>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="email" value="{{old('email')}}"
                                   placeholder="{{__('message_contact.placeholder_email')}}">
                            <span class="error">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>{{__('message_contact.phone')}} <span class="error">(*)</span></p>
                            <small>( {!!__('message_contact.small_phone')!!} )</small>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="mobile" value="{{old('mobile')}}"
                                   placeholder="{{__('message_contact.placeholder_phone')}}">
                            <span class="error">{{ $errors->first('mobile') }}</span>
                        </div>
                    </div>
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>{{__('message_contact.title')}} <span class="error">(*)</span></p>
                            <small>( {!!__('message_contact.small_title')!!} )</small>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="title" value="{{old('title')}}"
                                   placeholder="{{__('message_contact.placeholder_title')}}">
                            <span class="error">{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                    <div class="contact__form__row">
                        <div class="contact__form__label">
                            <p>{{__('message_contact.content')}} <span class="error">(*)</span></p>
                        </div>
                        <div class="contact__form__controll">
                            <input type="text" name="content" value="{{old('content')}}"
                                   placeholder="{{__('message_contact.placeholder_content')}}">
                            <span class="error">{{ $errors->first('content') }}</span>
                        </div>
                    </div>
                    <div style="margin-bottom: 1rem" class="contact__form__row">
                        <div class="g-recaptcha" id="feedback-recaptcha"
                             data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY')  }}"></div>
                        <span class="error">{{ $errors->first('g-recaptcha-response')}}</span>
                    </div>
                    <div class="contact__form__row">
                        <input type="submit" class="submit" value="{{__('message_contact.submit')}}">
                    </div>
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
<script>
    $(document).ready(function () {
        if ($('.alert-success').length > 0) {
            $('.alert-success').append("{{__('message_contact.success')}}");
        }
        if ($('.alert-danger').length > 0) {
            $('.alert-danger').append("{{__('message_contact.fail')}}");
        }

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