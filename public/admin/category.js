function showModalCategory(id,name) {
    $('#modal-danger').modal('show');

    $('#delete-save').attr({
        'data-id' : id,
        'data-name' : name,
    });
}

$('#delete-save').on('click', function () {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
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
            name: name,
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


