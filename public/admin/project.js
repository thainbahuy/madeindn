// $(function () {
//     $('#project-submit-table').DataTable({
//         "order": [[0, "desc"]],
//         processing: true,
//         serverSide: true,
//         ajax: config.routes.zone,
//         columns: [
//             {data: 'id', name: 'id'},
//             {data: 'author_name', name: 'author_name'},
//             {data: 'name', name: 'name'},
//             {data: 'author_email', name: 'author_email'},
//             {data: 'created_at', name: 'created_at'},
//         ]
//     });
// });

function showModalProject(id) {
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
        },
        fail: function (data) {
            $('.message').empty();
            $('.message').html(data.msg);
        }
    });
});
