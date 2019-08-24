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
        url: route('admin.category.delete_category'),
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
        "lengthMenu": [[5, 10, 15, 20, 25, 30], [5, 10, 15, 20, 25, 30]],
        processing: true,
        ServerSide: true,
        aaSorting : [[ 3, 'asc' ],[ 0, 'DESC' ]],
        oLanguage: {
            oPaginate: {
                First: "First page", // This is the link to the first page
                sPrevious: "<", // This is the link to the previous page
                sNext: ">", // This is the link to the next page
                sLast: "<" // This is the link to the last page
            }
        },
        ajax: {
            url: route('view.admin.category.view_category'),
        },
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'jp_name'},
            {data: 'position'},
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
