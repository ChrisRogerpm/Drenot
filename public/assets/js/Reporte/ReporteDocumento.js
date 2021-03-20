let InicioListar = function () {
    const componentes = () => {
        $(document).on('click', '.btnBuscar', function () {
            _Buscador();
        });

    }
    const _Buscador = () => {
        $("#frmNuevo").submit();
        if (_objetoForm_frmNuevo.valid()) {
            let dataForm = $("#frmNuevo").serializeFormJSON();
            EnviarDataPost({
                url: "ReporteGraficoDocumentoListarJson",
                data: dataForm,
                showMessag: false,
                callBackSuccess: function (response) {
                    GraficoEstadistico({
                        pendientes: response.pendiente,
                        notificados: response.notificados
                    });
                    _CargarDocumentoDetalle();
                }
            });
        }
    }
    const _CargarDocumentoDetalle = () => {
        let dataForm = $("#frmNuevo").serializeFormJSON();
        EnviarDataPost({
            url: "ReporteTipoDocumentoGraficoJson",
            data: dataForm,
            showMessag: false,
            callBackSuccess: function (response) {
                let NotificadorContenedor = $("#ContenedorNotificados");
                let PendienteContenedor = $("#ContenedorPendientes");
                NotificadorContenedor.html("");
                PendienteContenedor.html("");

                $.each(response.notificadosDetalle, function (k, v) {
                    NotificadorContenedor.append('<div class="col-12 mb-2">' +
                        '<p><i class="icon-file-text icon-2x d-inline-block text-info"></i></p>' +
                        '<h5 class="font-weight-semibold mb-0">' + v.total + '</h5>' +
                        '<span class="text-muted font-size-sm">' + v.nombre + '</span>' +
                        '</div>');
                });

                $.each(response.pendienteDetalle, function (k, v) {
                    PendienteContenedor.append('<div class="col-12 mb-2">' +
                        '<p><i class="icon-file-text icon-2x d-inline-block text-info"></i></p>' +
                        '<h5 class="font-weight-semibold mb-0">' + v.total + '</h5>' +
                        '<span class="text-muted font-size-sm">' + v.nombre + '</span>' +
                        '</div>');
                });
            }
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
    const GraficoEstadistico = (obj) => {
        var defaults = {
            categorias: [],
            notificados: [],
            pendientes: [],
        };
        var opciones = $.extend({}, defaults, obj);

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Promedio de documentos entre fechas'
            },
            xAxis: {
                // categories: opciones.categorias,
                categories: ["DOCUMENTOS"],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Notificados',
                data: opciones.notificados//[49.9, 71.5, 3]

            }, {
                name: 'Pendientes',
                data: opciones.pendientes//[83.6, 78.8, 2]
            }]
        });
    }

    const FormularioValidacion = () => {
        ValidarFormulario({
            contenedor: '#frmNuevo',
            nameVariable: "frmNuevo",
            rules: {
                fechaInicial: { required: true },
                fechaFinal: { required: true, },
            },
            messages: {
                fechaInicial: { required: 'Este campo es requerido' },
                fechaFinal: { required: 'Este campo es requerido' },
            }
        });
    }

    return {
        init: function () {
            componentes();
            _CargarData();
            GraficoEstadistico();
            FormularioValidacion();
            _Buscador();
            // _CargarDocumentoDetalle();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function () {
    InicioListar.init();
});
