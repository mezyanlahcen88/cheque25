"use strict";

// Class definition
var KTDatatablesExample = function() {
    // Shared variables
    var table;
    var datatable;
    var deleteMultipleDiv;
    var checkboxes;

    // Private functions
    var initDatatable = function() {
        datatable = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[5, 'desc']],
            stateSave: true,
            ajax: '/user/get-users-json',
            columns: [
                { data: 'checkbox', searchable: false, orderable: false, visible: true },
                { data: 'picture' },
                { data: 'first_name', visible: false },
                { data: 'last_name', visible: false },
                { data: 'email', visible: false },
                { data: 'occupation' },
                { data: 'country.name' },
                { data: 'roles_name' },
                { data: 'phone' },
                { data: 'isactive' },
                { data: 'actions' }
            ],
            pagingType: 'full_numbers',
            initComplete: function() {
                $('#isactive').on('change', function() {
                    datatable.column(9).search($(this).val()).draw();
                });
            }
        });
    }

   
    // Handle search in datatable
    var handleSearchDatatable = function() {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function(e) {
            datatable.search(e.target.value).draw();
        });
    }
    var handleMultipleSelect = function(){
        console.log('handle');

        const checkboxes = document.querySelectorAll("input[type=checkbox][name=multiple-check]");
        // Function to handle the checkbox state change
        function handleCheckboxChange(event) {
            if (event.target.checked) {
                console.log('Checkbox with id ${event.target.id} is checked.');
            } else {
                console.log('Checkbox with id ${event.target.id} is unchecked.');
            }
        }

        // Add event listeners to all checkboxes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', handleCheckboxChange);
        });


    }
    // Initialize toggle toolbar and delete multiple functionalities
    var initToggleToolbar = function() {
        checkboxes = document.querySelectorAll('.select-one');
        deleteMultipleDiv = document.querySelector('.deleteMultipleDiv');
        const buttonsDiv = document.querySelector('.buttons');

        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', toggleButtonsVisibility);
        });



        // Deleted selected rows
        const deleteMultipleBtn = document.querySelector('.delete_selected');
        deleteMultipleBtn.addEventListener('click', function () {
            var checkedCheckboxes = document.querySelectorAll('.select-one:checked');
            if (checkedCheckboxes.length === 0) {
                Swal.fire({
                    text: "Please select at least one user to delete.",
                    icon: "info",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                });
                return;
            }

            Swal.fire({
                text: "Are you sure you want to delete selected users?",
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
                    var userIds = Array.from(checkedCheckboxes).map(function (checkbox) {
                        return checkbox.value;
                    });
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '/user/delete-multiple',
                        data: { userIds: userIds },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                checkedCheckboxes.forEach(function (checkbox) {
                                    checkbox.closest('.form-check').remove();
                                });

                                Swal.fire({
                                    text: "You have deleted all selected users!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                                }).then(function () {
                                    datatable.draw();
                                });

                                const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                                if (headerCheckbox) {
                                    headerCheckbox.checked = false;
                                }
                            } else {
                                Swal.fire({
                                    text: "Failed to delete selected customers.",
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
                                text: "An error occurred while deleting customers. Please try again later.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn fw-bold btn-primary" }
                            });
                        }
                    });
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Selected customers were not deleted.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: { confirmButton: "btn fw-bold btn-primary" }
                    });
                }
            });
        });
    }

    // Initialize the datatable functionality
    var initDatatableExample = function() {
        table = document.querySelector('#kt_datatable_example');
        if (!table) {
            return;
        }

        initDatatable();
        exportButtons();
        handleSearchDatatable();
        initToggleToolbar();
        handleMultipleSelect();
    }

    // Public methods
    return {
        init: function() {
            initDatatableExample();

        }
    };
}();

// Toggle filter div on button click
$('#filterBtn').on('click',function() {
    $('#filterDiv').toggleClass('d-none');
});
function toggleButtonsVisibility() {
    console.log('toggle runed');
    const anyChecked = Array.from(checkboxes).some(function(checkbox) {
        return checkbox.checked;
    });

    if (anyChecked) {
        deleteMultipleDiv.classList.remove('d-none');
        buttonsDiv.classList.add('d-none');
    } else {
        deleteMultipleDiv.classList.add('d-none');
        buttonsDiv.classList.remove('d-none');
    }
}
// Initialize KTDatatablesExample on document ready
KTUtil.onDOMContentLoaded(function() {
    KTDatatablesExample.init();
});
