$(document).ready(function()
{
    $(document).on('click', '.pagination a',function(event)
    {
        event.preventDefault();
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
        $('.message').empty();
    });

    function getData(page){
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                datatype: "html"
            })
            .done(function(data)
            {
                $("#content").empty().html(data);
                location.hash = page;
            })
            .fail(function(data)
            {
            });
    }
});