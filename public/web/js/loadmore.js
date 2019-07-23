var indexPage = 2;

function loadMoreEvent(urlAjax) {
    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'page': indexPage},
        })
        .done(function (data) {
            console.log(data);
            if (data.html == "") {
                console.log('no more');
            }
            $(".c-post").append(data.html);
            indexPage++
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}
