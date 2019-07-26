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

var lastCategories = {};

function loadMoreProjectIndex(urlAjax) {
    var category_id = $('ul.tabs-list').find('li.active').data('value');

    if (!lastCategories[category_id]) {
        lastCategories[category_id] = 2;
        indexPage = 2;
    } else {
        indexPage = lastCategories[category_id];
    }

    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'page': indexPage, 'category_id': category_id},
        })
        .done(function (data) {
            if ($.trim(data.html) != "") {
                $("#project_" + category_id).append(data.html);
                lastCategories[category_id]++;
            }
        });
}

