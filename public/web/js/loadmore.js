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
                checkDataEventEmpty(urlAjax,indexPage);
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

                $('#loadmore_btn').show();
                let index = lastCategories[category_id];
                checkDataProjectByCategoryEmpty(category_id,urlAjax,index);
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
            } else {
                $('#loadmore_btn').hide();
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
                checkDataProjectSearch(urlAjax,key_word,category,indexPage);
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('server not responding...');
        });
}

// functions for check data is exist
function checkDataProjectByCategoryEmpty(category_id,urlAjax,indexPage) {
    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'page': indexPage, 'category_id': category_id},
            success: function(data){
                // if out of data
                if ($.trim(data.html) == "") {
                    projectByCatrgory[category_id] = {
                        'data': false,
                    };
                    $('#loadmore_btn').hide();
                }
            }
        });
}

function checkDataEventEmpty(urlAjax,index) {
    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'page': index},
            success:function (data) {
                // if out of data
                if ($.trim(data.html) == "") {
                    $('#loadmore_btn').hide();
                }
            }
        })
}

function checkDataProjectSearch(urlAjax,key_word,category,index) {
    $.ajax(
        {
            url: urlAjax,
            type: "get",
            data: {'key_word': key_word, 'category': category, 'page': index},
            success:function (data) {
                // if out of data
                if ($.trim(data.html) == "") {
                    $('#loadmore_btn').hide();
                }
            }
        })
}