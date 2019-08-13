
$(document).ready(function () {


    $('#partnerTable').DataTable({
        bInfo: false,
        oLanguage: {
            oPaginate: {
                First: "First page", // This is the link to the first page
                sPrevious: "<", // This is the link to the previous page
                sNext: ">", // This is the link to the next page
                sLast: "<" // This is the link to the last page
            }
        },
    });




    $('#delete-save').on('click', function () {
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');

        deletePartner(url,id);
        $('#modal-danger').modal('hide');
    });




});

function showModalDeleteEvent(id,url) {
    $('#modal-danger').modal('show');
    $('#delete-save').attr('data-id', id);
    $('#delete-save').attr('data-url', url);
}


function deletePartner(urlAjax, id) {

    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'id': id},
        }).done(function (response) {
        if (response.status == "success") {
            $('#row' + id).remove();
            $('.message').show();
        }
    }).fail(function (response) {
        alert('server not responding...');
    })

}

