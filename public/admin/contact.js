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
        url: route('admin.contact.contact_customer_delete'),
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
        "lengthMenu": [[5, 10, 15, 20, 25, 30, -1], [5, 10, 15, 20, 25, 30, "All"]],
        processing: true,
        aaSorting : [[ 0, 'DESC' ]],
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
            url: route('view.admin.contact.contact_customer'),
        },
        columns: [
            {data: 'id'},
            {data: 'title'},
            {data: 'name'},
            {data: 'email'},
            {data: 'mobile'},
            {data: 'content'},
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


$("body").on('click','#show_info',function(){
    var value = $(this).val();
    $('#modal-info').modal('show');
    $('#content_customer').html(value);
});

