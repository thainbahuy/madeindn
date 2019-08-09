function validateForm(){
    email_check = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    phone_check = /.{5,15}$/;
    content_check = /.{10,}$/;

    check_error_email = false;
    check_error_phone = false;
    check_error_content = false;
    if (!email_check.test(document.myForm.email.value)){
        $('.email_error').html('The email must be a valid email address.');
        check_error_email = false;
    } else {
        $('.email_error').empty();
        check_error_email = true;
    }
    if (!phone_check.test(document.myForm.phone.value)){
        $('.phone_error').html('The phone must be beetween 5 - 15 characters');
        check_error_phone = false;
    } else {
        $('.phone_error').empty();
        check_error_phone = true;
    }

    if (!content_check.test($('textarea#content_message').val())){
        $('.content_message_error').html('The content must be at least 10 characters');
        check_error_content = false;
    } else {
        $('.content_message_error').empty();
        check_error_content = true;
    }

    return check_error_email && check_error_phone && check_error_content;
}
$(function() {
    $('#contactForm1').submit(function(event) {
        if(!validateForm()){
            return false;
        }
        event.preventDefault(); // Prevent the form from submitting via the browser
        var form = $(this);
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize()
        }).done(function(data) {
            if(data.errors){
                alert("Try again");
            } else {
                $(".submit").remove();
                $('.c-form_submit').empty();
                $(".c-form_submit").append("<img style='max-width: 25%;' src='https://icon-library.net/images/check-icon-small/check-icon-small-16.jpg' alt=''>");
            }
        }).fail(function(data) {
            alert("Try again");
            $('#img_fail').remove();
            $(".c-form_submit").append("<div id='img_fail'><img style='max-width: 25%;' src='https://icon-library.net/images/fail-icon/fail-icon-3.jpg' alt='' ></div>");
        });
    });
});
