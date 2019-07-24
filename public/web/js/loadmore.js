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
            if ($.trim(data.html) != "") {
                $(".c-post").append(data.html);
                indexPage++
                console.log($('body').height());
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}
