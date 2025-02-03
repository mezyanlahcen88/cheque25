"use strict";

// Class definition
var KTDatatablesExample = function() {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    var initDatatable = function() {
        datatable = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[1, 'desc']],
            stateSave: true,
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                className: 'row-selected'
            },
            ajax: '/languages/get-languages-json',
            'columns': [
                {
                    data: 'checkbox',searchable: false, orderable: true,visible: true
                },
                {
                    data: 'name'
                },
                {
                    data: 'locale'
                },
                {
                    data: 'default'
                },
                {
                    data: 'active',
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'actions'
                },

            ],
            pagingType: 'full_numbers',
            initComplete: function() {
                // $('#archive').change(function() {
                //     console.log('Status select filter changed');

                //     table.column(7).search($(this).val()).draw();
                // });
                // $('#status').change(function() {
                //     console.log('Status select filter changed');
                //     table.column(5).search($(this).val()).draw();
                // });
            }


        });
    }

    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'Customer Orders Report';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [{
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('#kt_datatable_example_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll(
            '#kt_datatable_example_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' +
                    exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function(e) {
            datatable.search(e.target.value).draw();
        });
    }

    // copied here
    // Delete customer
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const customerName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + customerName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        // Simulate delete request -- for demo purpose only
                        Swal.fire({
                            text: "Deleting " + customerName,
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            Swal.fire({
                                text: "You have deleted " + customerName + "!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {
                                // delete row data from server and re-draw datatable
                                dt.draw();
                            });
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: customerName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

   // Init toggle toolbar
   var initToggleToolbar = function () {
    // Toggle selected action toolbar
    // Select all checkboxes
    const container = document.querySelector('#kt_datatable_example');
    const checkboxes = container.querySelectorAll('[type="checkbox"]');

    // Select elements

    // Toggle delete selected toolbar
    checkboxes.forEach(c => {
        // Checkbox on click event
        c.addEventListener('click', function () {
            setTimeout(function () {
                toggleToolbars();
            }, 50);
        });
    });


}

// Toggle toolbars
var toggleToolbars = function () {
    // Define variables
    const container = document.querySelector('#kt_datatable_example');
    const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
    const toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="selected"]');
    const selectedCount = document.querySelector('[data-kt-docs-table-select="selected_count"]');

    // Select refreshed checkbox DOM elements
    const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');

    // Detect checkboxes state & count
    let checkedState = false;
    let count = 0;

    // Count checked boxes
    allCheckboxes.forEach(c => {
        if (c.checked) {
            checkedState = true;
            count++;
        }
    });

    // Toggle toolbars
    if (checkedState) {
        selectedCount.innerHTML = count;
        toolbarBase.classList.add('d-none');
        toolbarSelected.classList.remove('d-none');
    } else {
        toolbarBase.classList.remove('d-none');
        toolbarSelected.classList.add('d-none');
    }
}

    // end copied here
    // Public methods
    return {
        init: function() {
            table = document.querySelector('#kt_datatable_example');

            if (!table) {
                return;
            }

            initDatatable();
            exportButtons();
            handleSearchDatatable();
            initToggleToolbar();
            handleDeleteRows();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTDatatablesExample.init();
});
