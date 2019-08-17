// var input = $('#image_startup');
// $('#image_startup').change(function (event) {
//     var blnValid = false;
//     if ($(this).length > 0) {
//         sFileName = this.files[0].name;
//         var _validFileExtensions = [".jpg", ".jpeg", ".png",];
//         for (var j = 0; j < _validFileExtensions.length; j++) {
//             var sCurExtension = _validFileExtensions[j];
//             if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
//                 blnValid = true;
//                 break;
//             }
//         }
//         if (!blnValid) {
//             alert("Photo wrong format");
//             input.replaceWith(input.val('').clone(true));
//         } else {
//             $(".text-image").empty();
//             $("a.fileupload-exists").show();
//             $(".text-image").append("<span>" + sFileName + "</span>");
//         }
//     }
// });
// $('.fileupload-exists').click(function (event) {
//     $('.text-image').empty();
//     input.replaceWith(input.val('').clone(true));
//     $(this).hide("");
// });

var filesStartup = document.getElementById('files_startup')
filesList = [];
$('#files_startup').change(function () {
    var size = 0;
    for (var k=0; k<filesStartup.files.length; k++) {
        var ext = this.files[k].name.split('.').pop();
        if(ext!== "doc" && ext!== "docx" && ext!== "pdf")  {
            alert('Not an accepted file extension: '+this.files[k].name);
            $(this).closest('form').trigger("reset");
        }else {
            sFileName = this.files[k].name;
            sFileName.split('.').pop();
            size += this.files[k].size;
        }
    }

    if (size / (1024 * 1024).toFixed(2) > 10) {
        $(this).closest('form').trigger("reset");
        alert("Total file size <10 MB");
    } else {
        $(".text-file").empty();
        for (var i = 0; i < filesStartup.files.length; i++) {
            $(".text-file").append("<div id='files_" + i + "'>" + this.files[i].name);
        }
    }
});

