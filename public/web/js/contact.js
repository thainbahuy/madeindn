$(function() {
    function validateForm() {
        email_check = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        phone_check = /.{5,15}$/;
        content_check = /.{1,}$/;

        check_error_email = false;
        check_error_phone = false;
        check_error_content = false;
        if (!email_check.test(document.myForm.email.value)) {
            $('.email_error').html(config.message.error_email);
            check_error_email = false;
        } else {
            $('.email_error').empty();
            check_error_email = true;
        }
        if (!phone_check.test(document.myForm.phone.value)) {
            $('.phone_error').html(config.message.error_phone);
            check_error_phone = false;
        } else {
            $('.phone_error').empty();
            check_error_phone = true;
        }

        if (!content_check.test($('textarea#content_message').val())) {
            $('.content_message_error').html(config.message.error_content);
            check_error_content = false;
        } else {
            $('.content_message_error').empty();
            check_error_content = true;
        }

        return check_error_email && check_error_phone && check_error_content;
    }
    $('#contactForm1').submit(function(event) {
        if(!validateForm()){
            return false;
        }
        event.preventDefault(); // Prevent the form from submitting via the browser
        var form = $(this);
        $('.c-form_submit').empty();
        $(".c-form_submit").append("<img style='max-width: 25%;' src='/web/images/icons/loading.gif' alt=''>");
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize()
        }).done(function(data) {
            if(data.errors){
                alert(config.message.fail);
                $(".submit").show();
            } else {
                $("#contactForm1 :input").prop("disabled", true);
                $("#content_message").prop('disabled', true);
                $('.c-form_submit').empty();
                $('.button_submit').hide();
                $(".c-form_submit").append("<img style='max-width: 25%;' src='/web/images/icons/check-icon-small-16.jpg' alt=''><br/><div class='alert alert-success' role='alert'>"+config.message.success+"</div>");
            }
        }).fail(function() {
            alert(config.message.fail);
            $('.c-form_submit').empty();
            $('#img_fail').remove();
            $(".submit").show();
            $(".c-form_submit").append("<img style='max-width: 25%;' src='/web/images/icons/fail-icon-3.jpg' alt=''><br/><div class='alert alert-danger' role='alert'>"+config.message.fail+"</div>");
        });
    });
});
