(() => {
    "use strict";
    $(function (e) {
        $("#basic-datatable").DataTable({
            language: { searchPlaceholder: "Search...", sSearch: "" },
        }),
            $("#responsive-datatable").DataTable({
                responsive: !0,
                language: { searchPlaceholder: "Search...", sSearch: "" },
            }),
            //, "colvis"
            (a = $("#file-datatable").DataTable({
                buttons: ["copy", "excel", "pdf"],
                responsive: !0,
                language: { searchPlaceholder: "Search...", sSearch: "" },
            }))
                .buttons()
                .container()
                .appendTo("#file-datatable_wrapper .col-md-6:eq(0)");
        var a = $("#delete-datatable").DataTable({
            language: { searchPlaceholder: "Search...", sSearch: "" },
        });
        $("#delete-datatable tbody").on("click", "tr", function () {
            $(this).hasClass("selected")
                ? $(this).removeClass("selected")
                : (a.$("tr.selected").removeClass("selected"),
                  $(this).addClass("selected"));
        }),
            $("#button").on("click", function () {
                a.row(".selected").remove().draw(!1);
            }),
            $("#example3").DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (e) {
                                var a = e.data();
                                return "Details for " + a[0] + " " + a[1];
                            },
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: "table",
                        }),
                    },
                },
            }),
            $("#example2").DataTable({
                responsive: !0,
                language: {
                    searchPlaceholder: "Search...",
                    sSearch: "",
                    lengthMenu: "_MENU_ items/page",
                },
            }),
            $(".select2").select2({ minimumResultsForSearch: 1 / 0 });
    });
})();
