
// $(document).ready(function () {
//
//     $('#delete-save').on('click', function () {
//         let id = $(this).attr('data-id');
//         let url = $(this).attr('data-url');
//
//         deleteEvent(url,id);
//         $('#modal-danger').modal('hide');
//     });
//
//     $(document).on('click', '.pagination a', function (e) {
//         e.preventDefault();
//         var url = $(this).attr('href');
//         loadMoreEvent(url);
//     });
//
//
// });

$(function() {
    $('#event-table').DataTable({
        processing: true,
        serverSide: true,
        bInfo : false,
        oLanguage: {
            oPaginate: {
                First: "First page", // This is the link to the first page
                sPrevious: "<", // This is the link to the previous page
                sNext: ">", // This is the link to the next page
                sLast: "<" // This is the link to the last page
            }
        },
        ajax : {
            url: route('view.admin.event.event_list'),
        },
        columns: [
            { data: 'name' },
            { data: 'image_link' },
            { data: 'date_time' },
            { data: 'begin_time' },
            { data: 'end_time' },
            { data: 'feature' },

        ]
    });
});

function setImageBackground(imageLink,urlAjax) {
    $.ajax(
        {
            url: urlAjax,
            type: "post",
            data:{
                'image_link' : imageLink,
            }
        })
        .done(function (data) {

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}

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
            $('.message').show();
        }
    }).fail(function (response) {
        alert('server not responding...');
    })

}

