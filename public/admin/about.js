
function showModalAbout(id) {
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
$(document).ready(function() {
    $('#about_table').DataTable({
        "lengthMenu": [[5, 10, 15, 20, 25, 30], [5, 10, 15, 20, 25, 30]],
        language: {
            paginate: {
                next: '>',
                previous: '<'
            }
        },
        bInfo : false,
    });
});

