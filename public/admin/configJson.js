$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');
    allPreviousBtn = $('.PreviousBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    allPreviousBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });


    $('div.setup-panel div a.btn-primary').trigger('click');
});

$(document).on('click', '.btn-clear-cache', function () {
    var type = $(this).attr('data-type');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: route('handle.cache'),
        type: 'get',
        data: {
            type: type,
        },
        success: function () {
            $('#hideMe').show();
            setTimeout(function () {
                document.getElementById('hideMe').style.display = "none";
            }, 2000);
        },
        fail: function () {
            Alert("Try again");
        }
    });
})
