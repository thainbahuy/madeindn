$(document).ready(function () {
    var t = $('#coworkingTable').DataTable({
        responsive: true,
        "lengthMenu": [[5, 10, 15, 20, 25, 30], [5, 10, 15, 20, 25, 30]],
        processing: true,
        oLanguage: {
            oPaginate: {
                First: "First page", // This is the link to the first page
                sPrevious: "<", // This is the link to the previous page
                sNext: ">", // This is the link to the next page
                sLast: "<" // This is the link to the last page
            }
        },
        ajax: {
            url: route('view.admin.coworking.coworking_space'),
        },
        columns: [
            {data: 'name'},
            {data: 'image_link'},
            {data: 'position'},
            {data: 'created_at'},
            {data: 'feature',orderable: false, searchable: false},
        ],
    });
});

function showModalCoworking(id) {
    $('#modal-danger').modal('show');
    $('#delete-save').attr('data-id', id);
}

$('#delete-save').on('click', function () {
    var id = $(this).attr('data-id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: config.routes.zone,
        type: 'get',
        data: {
            id: id,
        },
        success: function (data) {
            $('#modal-danger').modal('hide');
            $("#delete-coloum-" + id).replaceWith();
            $('.message').empty();
            $('.message').html(data.msg);
            $('#coworkingTable').DataTable().ajax.reload();
        },
        fail: function (data) {
            $('.message').empty();
            $('.message').html(data.msg);
        }
    });
});