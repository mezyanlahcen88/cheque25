"use strict";
//Datatable
var KTDatatables = function() {
    var table;
    var datatable;
    var deleteMultipleDiv;
    var checkboxes;

    var initDatatableTable = function() {
        datatable = $(table).DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[1, 'desc']],
            stateSave: true,
            ajax: $(table).data('route'),
            columns: $(table).data('columns'),
            pagingType: 'full_numbers',
            initComplete: function() {
                
$('#user_id').on('change', function() {
    datatable.column(4).search($(this).val()).draw();
});
$('#isactive').on('change', function() {
    datatable.column(5).search($(this).val()).draw();
});
            }
        });
    }

     // Initialize export buttons
     var exportButtons = function() {
        const documentTitle = 'produits Report';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                { extend: 'copyHtml5', title: documentTitle },
                { extend: 'excelHtml5', title: documentTitle },
                { extend: 'csvHtml5', title: documentTitle },
                { extend: 'pdfHtml5', title: documentTitle }
            ]
        }).container().appendTo($('#kt_datatable_example_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_datatable_example_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', function(e) {
                e.preventDefault();
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);
                target.click();
            });
        });
    }

    // Handle search in datatable
    var handleSearchDatatable = function() {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function(e) {
            datatable.search(e.target.value).draw();
        });
    }

    var initDatatable = function() {
        table = document.querySelector('#kt_datatable');
        if (!table) {
            return;
        }

        initDatatableTable();
        exportButtons();
        handleSearchDatatable();
    }

    // Public methods
    return {
        init: function() {
            initDatatable();
        }
    };
}();

KTUtil.onDOMContentLoaded(function() {
    KTDatatables.init();
});


// Toggle filter div on button click
$('#filterBtn').on('click',function() {
    $('#filterDiv').toggleClass('d-none');
});





