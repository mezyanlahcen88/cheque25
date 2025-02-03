$(document).on('click', '.default', function () {
    $id = $(this).attr('data-id');
    $routeName = $(this).attr('data-route-name');
    $csrf = $("#generate_csrf").attr('content');
    $.ajax({
        url:$routeName,
        type: "POST",
        data: {
            id: $id,
            _token: $csrf
        },
        async: true,
        success: function (response)
        {
            if(response.code == 200) {
                Swal.fire(
                        'Super!',
                        response.lang + ' est la langage par default ',
                        'success'
                    )
location.reload();
            }
        }
    });
});
