let InicioListar = function () {
    const componentes = () => {
        $(document).on('click', '.btnBuscar', function () {
            ListarDocumentos();
        });
    }
    const _CargarData = function () {
        $('.Fecha').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'YYYY-MM-DD',
                "daysOfWeek": [
                    "Dom",
                    "Lun",
                    "Mar",
                    "Mie",
                    "Jue",
                    "Vie",
                    "Sab"
                ],
            }
        });
    };
    const ListarDocumentos = function (obj) {
        var defaults = {
            data: $("#frmNuevo").serializeFormJSON(),
        };
        var opciones = $.extend({}, defaults, obj);
        CargarTablaDatatable({
            uniform: true,
            ajaxUrl: "ReporteDocumentoListarJson",
            table: "#table",
            tableOrdering: false,
            ajaxDataSend: opciones.data,
            tableColumns: [
                { data: "nroSecuencia", title: "#" },
                { data: "tipoDocumento", title: "TIPO DOCUMENTO" },
                { data: "nroDocumento", title: "NRO DOCUMENTO" },
                { data: "remitente", title: "REMITENTE" },
                { data: "destino", title: "DESTINO" },
                { data: "fecha", title: "FECHA" },
                { data: "estadoNombre", title: "ESTADO" },
                { data: "prioridad", title: "PRIORIDAD" },
                {
                    data: null, title: "OCPION",
                    "render": function (value) {
                        let editar = '<a href="#" class="dropdown-item btnEditar" data-id="' + value.IdDocumento + '"><i class="icon-pencil5"></i> EDITAR</a>'
                        return '<div class="list-icons">' +
                            '<div class="dropdown">' +
                            '<a href="#" class="list-icons-item" data-toggle="dropdown">' +
                            '<i class="icon-menu9"></i>' +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-right">' +
                            editar +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    }, class: "text-center"
                }
            ],
            callBackSuccess: function (response) {
                $("#Notificados").text(response.detalle.notifcados);
                $("#Pendientes").text(response.detalle.pendientes);
                $("#Total").text(response.detalle.total);
            }
        })
    };

    const GraficoEstadistico = () => {
        Highcharts.chart('container', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Promedio de documentos durante la semana'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
            },
            xAxis: {
                categories: [
                    'Lunes',
                    'Martes',
                    'Miercoles',
                    'Jueves',
                    'Viernes',
                    'Sabado',
                    'Domingo'
                ],
            },
            yAxis: {
                title: {
                    text: 'Fruit units'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' units'
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Notificados',
                data: [3, 4, 3, 5, 4, 10, 12]
            }, {
                name: 'Pendientes',
                data: [1, 3, 4, 3, 3, 5, 4]
            }]
        });
    }

    return {
        init: function () {
            componentes();
            _CargarData();
            ListarDocumentos();
            GraficoEstadistico();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function () {
    InicioListar.init();
});
