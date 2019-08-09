var input = $('#image_startup');
$('#image_startup').change(function (event) {
    var blnValid = false;
    if ($(this).length > 0) {
        sFileName = this.files[0].name;
        var _validFileExtensions = [".jpg", ".jpeg", ".png",];
        for (var j = 0; j < _validFileExtensions.length; j++) {
            var sCurExtension = _validFileExtensions[j];
            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                blnValid = true;
                break;
            }
        }
        if (!blnValid) {
            alert("Ảnh sai định dạng");
            input.replaceWith(input.val('').clone(true));
        } else {
            $(".text-image").empty();
            $("a.fileupload-exists").show();
            $(".text-image").append("<span>" + sFileName + "</span>");
        }
    }
});
$('.fileupload-exists').click(function (event) {
    $('.text-image').empty();
    input.replaceWith(input.val('').clone(true));
    $(this).hide("");
});


var inputFileStartup = $('#files_startup');
var filesStartup = document.getElementById('files_startup')
filesList = [];
$('#files_startup').change(function () {
    var size = 0;
    for (var i = 0; i < filesStartup.files.length; i++) {
        sFileName = this.files[i].name;
        size += this.files[i].size;
    }
    if (size / (1024 * 1024).toFixed(2) > 10) {
        inputFileStartup.replaceWith(inputFileStartup.val('').clone(true));
        alert("Dung lượng file quá lớn");
    } else {
        $(".text-file").empty();
        for (var i = 0; i < filesStartup.files.length; i++) {
            $(".text-file").append("<div id='files_" + i + "'><span>" + this.files[i].name + "</span><a href='javascript:deletFiles(" + i + ")' style='display: inline-block' class='close fileupload-exists'></a></div>");
        }
    }
});

function deletFiles(key) {
    console.log(filesList);
}

