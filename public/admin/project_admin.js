function showModalContact(id) {
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
        url: route('admin.project_admin.project_delete'),
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

function changeStatus(id,status){
    $.ajax(
        {
            url: route('change_status_project'),
            type: "get",
            data: {'id': id , 'status': status},
        })
        .done(function (data) {
            $('#status_'+id).html(data);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}

$(document).ready(function () {
    var t = $('#tableData').DataTable({
        "lengthMenu": [[5, 10, 15, 20, 25, 30], [5, 10, 15, 20, 25, 30]],
        processing: true,
        aaSorting : [[ 4, 'asc' ],[ 0, 'DESC' ]],
        ClientSide: true,
        oLanguage: {
            oPaginate: {
                First: "First page", // This is the link to the first page
                sPrevious: "<", // This is the link to the previous page
                sNext: ">", // This is the link to the next page
                sLast: "<" // This is the link to the last page
            }
        },
        ajax: {
            url: route('view.admin.project_admin.project'),
        },
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'image_link'},
            {data: 'cname'},
            {data: 'position'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'feature',orderable: false, searchable: false},
        ],
        createdRow: function (row, data) {
            $(row).find('td:eq(5)').attr('id', 'status_' + data['id']);
            $(row).attr('id', 'delete-coloum-' + data['id'])
        },
    });

    t.on('order.dt', function () {
        t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).sort();
});
