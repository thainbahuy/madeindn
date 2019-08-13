
$(function () {

    $('#event-table').DataTable({
        processing: true,
        serverSide: true,
        bInfo: false,
        oLanguage: {
            oPaginate: {
                First: "First page", // This is the link to the first page
                sPrevious: "<", // This is the link to the previous page
                sNext: ">", // This is the link to the next page
                sLast: "<" // This is the link to the last page
            }
        },
        ajax: {
            url: route('view.admin.event.event_list'),
        },
        columns: [
            {data: 'name'},
            {data: 'image_link'},
            {data: 'date_time'},
            {data: 'begin_time'},
            {data: 'end_time'},
            {data: 'setBackgroundEvent'},
            {data: 'feature'},

        ]
    });


});

$(document).ready(function () {

    $('#delete-save').on('click', function () {
        let id = $(this).attr('data-id');

        deleteEvent(id);
        $('#modal-danger').modal('hide');

    });

});

function setImageBackground(imageLink) {

    $.ajax(
        {
            url: route('admin.event.event_list.setImage'),
            type: "post",
            data: {
                'image_link': imageLink,
            }
        })
        .done(function (data) {

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}


function showModelDeleteEvent(id) {
    $('#modal-danger').modal('show');
    $('#delete-save').attr('data-id', id);
}


function deleteEvent(id) {

    $.ajax(
        {
            url: route('admin.event.event_list.delete'),
            type: "get",
            data: {'id': id},
        }).done(function (response) {
        if (response.status == "success") {
            $('.message').show();
            $('#event-table').DataTable().ajax.reload();

        }
    }).fail(function (response) {
        alert('server not responding...');
    })

}

