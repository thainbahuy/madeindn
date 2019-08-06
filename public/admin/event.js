
$(document).ready(function () {

    $('#delete-save').on('click', function () {
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');

        deleteEvent(url,id);
        $('#modal-danger').modal('hide');
    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadMoreEvent(url);
        window.history.pushState("", "", url);
    });

});

function loadMoreEvent(urlAjax) {
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

function showModelDeleteEvent(id,url) {
    $('#modal-danger').modal('show');
    $('#delete-save').attr('data-id', id);
    $('#delete-save').attr('data-url', url);
}


function deleteEvent(urlAjax, id) {

    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'id': id},
        }).done(function (response) {
        if (response.status == "success") {
            $('#rowEvent' + id).remove();
        }
    }).fail(function (response) {
        alert('server not responding...');
    })

}