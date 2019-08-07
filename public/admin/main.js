$(document).ready(function () {
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var page = $(this).attr('href').split('page=')[1];
        getData(page);
        $('.message').empty();
    });

    function getData(page) {
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                datatype: "html"
            })
            .done(function (data) {
                $("#content").empty().html(data);
                location.hash = page;
            })
            .fail(function (data) {
            });
    }
});

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

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    allPreviousBtn.click(function () {
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

jQuery(function ($) {
    var fileDiv = document.getElementById("upload");
    var fileInput = document.getElementById("upload-input");
    var btnSelect = document.getElementById('btn_select');
    fileInput.addEventListener("change", function (e) {
        var files = this.files
        showThumbnail(files)
    }, false)

    btnSelect.addEventListener("click", function (e) {
        $(fileInput).show().focus().click().hide();
        e.preventDefault();
    }, false)


    fileDiv.addEventListener("dragenter", function (e) {
        e.stopPropagation();
        e.preventDefault();
    }, false);

    fileDiv.addEventListener("dragover", function (e) {
        e.stopPropagation();
        e.preventDefault();
    }, false);

    fileDiv.addEventListener("drop", function (e) {
        e.stopPropagation();
        e.preventDefault();
        var dt = e.dataTransfer;
        var files = dt.files;
        console.log(files);
        fileInput.files = files;
        showThumbnail(files)
    }, false);

    function showThumbnail(files) {
        $('.box-image').remove();
            var file = files[0]

            var container = document.createElement('div');
            container.classList.add('box-image');

            var image = document.createElement("img");
            image.classList.add("img-thumbnail");
            image.file = file;
            container.appendChild(image);

            var thumbnail = document.getElementById("thumbnail");
            thumbnail.appendChild(container);

            var reader = new FileReader()
            reader.onload = (function (aImg) {
                return function (e) {
                    aImg.src = e.target.result;
                };
            }(image))
            var ret = reader.readAsDataURL(file);
            var canvas = document.createElement("canvas");
            ctx = canvas.getContext("2d");
            image.onload = function () {
                ctx.drawImage(image, 100, 100)
            }
    };
});
