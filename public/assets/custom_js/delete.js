$(document).on('click', '.remove-item-btn', function (e) {
    e.preventDefault();
    let id = $(this).attr('data-id');
    let routeName = $(this).attr('data-route-name');
    $csrf = $("#generate_csrf").attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mr-1',
            cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: routeName,
                method: 'DELETE',
                data: {
                    id: id,
                    _token: $csrf
                },
                success: function (response) {
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'The record has been successfully deleted.',
                        'success'
                    );
                    $('#kt_datatable').DataTable().ajax.reload();
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary record is safe :)',
                'error'
            );
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const deleteMultipleBtn = document.querySelector('.delete_selected');
    deleteMultipleBtn.addEventListener('click', function () {
    const routeName = this.getAttribute('data-route-name');

        var checkedCheckboxes = document.querySelectorAll('.select-one:checked');
        if (checkedCheckboxes.length === 0) {
            Swal.fire({
                text: "Please select at least one record to delete.",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: { confirmButton: "btn fw-bold btn-primary" }
            });
            return;
        }

        Swal.fire({
            text: "Are you sure you want to delete selected records?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            },
        }).then(function (result) {
            if (result.value) {
                var objectIds = Array.from(checkedCheckboxes).map(function (checkbox) {
                    return checkbox.value;
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: routeName,
                    data: { objectIds: objectIds },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                text: "You have deleted all selected records!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" }
                            }).then(function () {
                                $('#kt_datatable').DataTable().ajax.reload();
                            });

                            const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                            if (headerCheckbox) {
                                headerCheckbox.checked = false;
                            }
                        } else {
                            Swal.fire({
                                text: "Failed to delete selected records.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" }
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error);
                        Swal.fire({
                            text: "An error occurred while deleting records. Please try again later.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        });
                    }
                });
            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "Selected records were not deleted.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                });
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const activateMultipleBtn = document.querySelector('.activate_selected');
    if (activateMultipleBtn) {
    activateMultipleBtn.addEventListener('click', function () {
    const routeName = this.getAttribute('data-route-name');

        var checkedCheckboxes = document.querySelectorAll('.select-one:checked');
        if (checkedCheckboxes.length === 0) {
            Swal.fire({
                text: "Please select at least one record to activate.",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: { confirmButton: "btn fw-bold btn-primary" }
            });
            return;
        }

        Swal.fire({
            text: "Are you sure you want to activate selected records?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            confirmButtonText: "Yes, activate!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            },
        }).then(function (result) {
            if (result.value) {
                var objectIds = Array.from(checkedCheckboxes).map(function (checkbox) {
                    return checkbox.value;
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: routeName,
                    data: { objectIds: objectIds },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                text: "You have activated all selected records!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" }
                            }).then(function () {
                                $('#kt_datatable').DataTable().ajax.reload();
                            });

                            const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                            if (headerCheckbox) {
                                headerCheckbox.checked = false;
                            }
                        } else {
                            Swal.fire({
                                text: "Failed to activate selected records.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" }
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error);
                        Swal.fire({
                            text: "An error occurred while deleting records. Please try again later.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        });
                    }
                });
            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "Selected records were not activated.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                });
            }
        });
    });
}
});


document.addEventListener('DOMContentLoaded', function () {
    const restoreMultipleBtn = document.querySelector('.restore_selected');
    if (restoreMultipleBtn) {
    restoreMultipleBtn.addEventListener('click', function () {
    const routeName = this.getAttribute('data-route-name');

        var checkedCheckboxes = document.querySelectorAll('.select-one:checked');
        console.log(checkedCheckboxes);
        if (checkedCheckboxes.length === 0) {
            Swal.fire({
                text: "Please select at least one record to restore.",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: { confirmButton: "btn fw-bold btn-primary" }
            });
            return;
        }

        Swal.fire({
            text: "Are you sure you want to restore selected records?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            confirmButtonText: "Yes, restore!",
            cancelButtonText: "No, cancel",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary"
            },
        }).then(function (result) {
            if (result.value) {
                var objectIds = Array.from(checkedCheckboxes).map(function (checkbox) {
                    return checkbox.value;
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: routeName,
                    data: { objectIds: objectIds },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            Swal.fire({
                                text: "You have restored all selected records!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" }
                            }).then(function () {
                                $('#kt_datatable').DataTable().ajax.reload();
                            });

                            const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                            if (headerCheckbox) {
                                headerCheckbox.checked = false;
                            }
                        } else {
                            Swal.fire({
                                text: "Failed to restore selected records.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" }
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', error);
                        Swal.fire({
                            text: "An error occurred while deleting records. Please try again later.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        });
                    }
                });
            } else if (result.dismiss === 'cancel') {
                Swal.fire({
                    text: "Selected records were not restored.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                });
            }
        });
    });
}
});
