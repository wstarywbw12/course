$.fn.dataTable.ext.pager.numbers_length = 5;

function initializeTables() {
    new DataTable("#example");

    new DataTable("#scroll-vertical", {
        scrollY: "210px",
        scrollCollapse: true,
        paging: true
    });

    new DataTable("#scroll-horizontal", {
        scrollX: true
    });

    new DataTable("#alternative-pagination", {
        pagingType: "simple_numbers" // WAJIB
    });

    new DataTable("#fixed-header", {
        fixedHeader: true
    });

    new DataTable("#model-datatables", {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (a) {
                        a = a.data();
                        return "Details for " + a[0] + " " + a[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: "table"
                })
            }
        }
    });

    new DataTable("#buttons-datatables", {
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "print", "pdf"]
    });

    new DataTable("#ajax-datatables", {
        ajax: "assets/json/datatable.json"
    });
}

document.addEventListener("DOMContentLoaded", function () {
    initializeTables();
});
