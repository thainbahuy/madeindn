var indexPage = 2;

function loadMoreEvent(urlAjax) {
    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'page': indexPage},
        })
        .done(function (data) {
            if ($.trim(data.html) != "") {
                $(".c-post").append(data.html);
                indexPage++;
                checkDataEventEmpty();
            }

        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}

var lastCategories = {};
var projectByCatrgory = [];

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
                checkDataProjectByCategoryIndexEmpty(category_id);
            }
        });
}

function checkDataIsExist(categoryId) {
    $('#loadmore_btn').show();
    if (projectByCatrgory[categoryId]) {
        if (projectByCatrgory[categoryId].data == true) {
            $('#loadmore_btn').show();
        } else {
            $('#loadmore_btn').hide();
        }
    } else {
        if ($('#project_' + categoryId).find('.c-list__project__item').length == $('#project_' + categoryId).attr("data-total")) {
            $('#loadmore_btn').hide();
        } else {
            $('#loadmore_btn').show();
        }
    }
}

function loadMoreProjectByCategory(urlAjax) {
    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'page': indexPage},
        })
        .done(function (data) {
            console.log(data);
            if ($.trim(data.html) != "") {
                $(".c-list__project").append(data.html);
                indexPage++;
                checkDataProjectByCategoryEmpty();
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}

function loadMoreSearchProject(urlAjax, key_word, category) {
    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'key_word': key_word, 'category': category, 'page': indexPage},
        })
        .done(function (data) {
            if ($.trim(data.html) != "") {
                $(".c-list__project").append(data.html);
                indexPage++;
                checkDataProjectSearch();
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}

// functions for check data is exist
function checkDataProjectByCategoryIndexEmpty(category_id) {
    if ($('#project_' + category_id).find('.c-list__project__item').length == $('#project_' + category_id).attr("data-total")) {
        //out of data
        $('#loadmore_btn').hide();
        projectByCatrgory[category_id] = {
            'data': false,
        };
    }

}

function checkDataEventEmpty() {
    if ($('#total_event').attr("data-total") == $('.c-post__item').length) {
        //out of data
        $('#loadmore_btn').hide();
    }

}

function checkDataProjectSearch() {

    if ($('#total_project').attr("data-total") == $('.c-list__project__item').length) {
        //out of data
        $('#loadmore_btn').hide();
    }
}

function checkDataProjectByCategoryEmpty() {
    if ($('#total_project').attr("data-total") == $('.c-list__project__item').length) {
        //out of data
        $('#loadmore_btn').hide();
    }
}