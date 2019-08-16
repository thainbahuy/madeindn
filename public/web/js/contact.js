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
                $(".c-form_submit").append("<img style='max-width: 25%;' src='/web/images/icons/check-icon-small-16.jpg' alt=''>");
            }
        }).fail(function(data) {
            alert("Try again");
            $('#img_fail').remove();
            $(".c-form_submit").append("<div id='img_fail'><img style='max-width: 25%;' src='/web/images/icons/fail-icon-3.jpg' alt='' ></div>");
        });
    });
});
