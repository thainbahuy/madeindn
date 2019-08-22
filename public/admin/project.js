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
        url: route('admin.project.project_customer.delete'),
        type: 'get',
        data: {
            id: id,
        },
        success: function (data) {
            $('#modal-danger').modal('hide');
            $("#delete-coloum-" + id).replaceWith();
            $('.message').empty();
            $('.message').html(data.msg);
            $('#tableData').DataTable().ajax.reload();
        },
        fail: function (data) {
            $('.message').empty();
            $('.message').html(data.msg);
        }
    });
});

$(document).ready(function () {
    var t = $('#tableData').DataTable({
        responsive: true,
        "lengthMenu": [[5, 10, 15, 20, 25, 30, -1], [5, 10, 15, 20, 25, 30, "All"]],
        aaSorting : [[ 0, 'DESC' ]],
        processing: true,
        ServerSide: true,
        oLanguage: {
            oPaginate: {
                First: "First page", // This is the link to the first page
                sPrevious: "<", // This is the link to the previous page
                sNext: ">", // This is the link to the next page
                sLast: "<" // This is the link to the last page
            }
        },
        ajax: {
            url: route('view.admin.project.project_customer'),
        },
        columns: [
            {data: 'id'},
            {data: 'author_name'},
            {data: 'author_email'},
            {data: 'name'},
            {data: 'created_at'},
            {data: 'feature',orderable: false, searchable: false},
        ],
        createdRow: function (row, data) {
            $(row).attr('id', 'delete-coloum-' + data['id'])
        },
    });

    t.on('order.dt', function () {
        t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).sort();
});
