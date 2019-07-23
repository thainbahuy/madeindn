var indexPage = 1;

function loadMoreEvent(urlAjax) {
    $.ajax({
        url: urlAjax,
        type: 'GET',
        data: {'index': indexPage}
    }).done(function (response) {
        let listEvent = response.listEvent;
        if (listEvent.length > 0) {
            for (let i = 0; i < listEvent.length; i++) {
                eventClone = $('#event_item').clone();
                eventClone.find('#image_link').attr('src', listEvent[i].image_link);
                eventClone.find('#event_name').text(listEvent[i].name);
                eventClone.find('#sort_des').text(listEvent[i].sort_description);
                eventClone.find('#date').text(listEvent[i].date_time);
                $('.c-post').append(eventClone);

            }
            indexPage++;
        }
    });
}
