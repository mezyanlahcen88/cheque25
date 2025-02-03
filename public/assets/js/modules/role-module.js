$(document).ready(function () {
    $('#kt_roles_select_all').change(function () {
        $('.item-checkbox').prop('checked', this.checked);
    });
    $('.item-checkbox').change(function () {
        if ($('.item-checkbox:checked').length === $('.item-checkbox').length) {
            $('#kt_roles_select_all').prop('checked', true);
        } else {
            $('#kt_roles_select_all').prop('checked', false);
        }
    });
// select permission related to groupe name
    $('input[name="groupe"]').on('change', function () {
        var groupeName = $(this).val();
        var isChecked = $(this).is(':checked');
        $('input[name="permissions[]"][data-groupe-name="' + groupeName + '"]').prop('checked', isChecked);
    });
});
