
$(document).ready(function () {

    $('#delete-save').on('click', function () {
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');

        deletePartner(url,id);
        $('#modal-danger').modal('hide');
    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadMore(url);
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

function loadMore(urlAjax) {
    $.ajax(
        {
            url: urlAjax,
            type: "get",
        })
        .done(function (data) {
            $("#tableEvent").html(data.html);

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}