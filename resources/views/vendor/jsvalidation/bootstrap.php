<script>
jQuery(document).ready(function () {
    $("<?= $validator['selector']; ?>").each(function () {
        $(this).validate({
            errorElement: 'span', // Use 'span' as the error element
            errorClass: 'invalid-feedback fw-700',

            errorPlacement: function (error, element) {
                // Wrap error message in a <strong> tag
                var strongTag = $('<strong>').text(error.text());
                error.html(strongTag); // Replace error content with the <strong> tag

                // Find the column_error span by dynamically targeting the error based on the input name or ID
                var errorSpan = $("#" + element.attr('name') + "_error");             
                if (element.is("select")) {
                        element.closest('.form-group').append(error);
                    } else {
                        // For other input fields, insert error directly after the element
                        error.insertAfter(element);
                    }
            },

            
            highlight: function (element) {
                $(element).removeClass('is-valid').addClass('is-invalid'); // Add error class
            },

            unhighlight: function (element) {
                $(element).removeClass('is-invalid').addClass('is-valid'); // Add valid class
                // Hide the error message if the field is valid
                var errorSpan = $("#" + element.name + "_error");
                if (errorSpan.length) {
                    errorSpan.hide();
                }
            },

            success: function (element) {
                $(element).removeClass('is-invalid').addClass('is-valid'); // Remove error class on success
                // Hide the error message if the field is valid
                var errorSpan = $("#" + element.name + "_error");
                if (errorSpan.length) {
                    errorSpan.hide();
                }
            },

            focusInvalid: true,

            invalidHandler: function (form, validator) {
                if (!validator.numberOfInvalids()) return;

                // Scroll to the first invalid element
                $('html, body').animate({
                    scrollTop: $(validator.errorList[0].element).offset().top
                }, <?= Config::get('jsvalidation.duration_animate') ?>);
            },

            rules: <?= json_encode($validator['rules']); ?>
        });
    });
});



</script>