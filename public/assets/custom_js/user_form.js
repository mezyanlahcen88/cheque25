$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#user_overview_form").on('submit', function (e) {
        e.preventDefault();
        handleSubmit('#user_overview_btn', '#user_overview_form');
    });

    $("#user_security_form").on('submit', function (e) {
        e.preventDefault();
        handleSubmit('#user_security_btn', '#user_security_form', function () {
            $("#user_security_form :input").val("");
        });
    });

    $("#user_email_form").on('submit', function (e) {
        e.preventDefault();
        handleSubmit('#user_email_btn', '#user_email_form');
    });

    $("#user_picture_form").on('submit', function (e) {
        e.preventDefault();
        handleFileUpload('#user_picture_btn', '#user_picture_form');
    });

    $('#imageProfile').on('change', function () {
        uploadImage();
    });

    function handleSubmit(buttonSelector, formSelector, successCallback) {
        const routeName = $(buttonSelector).attr('data-route-name');
        $('code').text('');
        $.ajax({
            type: 'post',
            url: routeName,
            data: $(formSelector).serialize(),
            success: function (response) {
                handleResponse(response, successCallback);
            }
        });
    }

    function handleFileUpload(buttonSelector, formSelector) {
        const routeName = $(buttonSelector).attr('data-route-name');
        let formData = new FormData($(formSelector)[0]);
        $('code').text('');
        $.ajax({
            type: 'post',
            url: routeName,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                handleResponse(response);
            }
        });
    }

    function handleResponse(response, successCallback) {
        if (response.errors) {
            $.each(response.errors, function (field, error) {
                $('#' + field + '-error').text(error[0]);
            });
        } else if (response.success) {
            Swal.fire('Super!', response.message, 'success');
            if (successCallback) successCallback();
        } else {
            Swal.fire('Error!', response.message, 'error');
        }
    }

    function uploadImage() {
        handleFileUpload('#user_picture_btn', '#user_picture_form');
    }
});
