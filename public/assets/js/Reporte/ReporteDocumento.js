let InicioListar = function () {
    const componentes = () => {
        $(document).on('click', '.btnBuscar', function () {
            $("#frmNuevo").submit();
            if (_objetoForm_frmNuevo.valid()) {
                let dataForm = $("#frmNuevo").serializeFormJSON();
                EnviarDataPost({
                    url: "ReporteGraficoDocumentoListarJson",
                    data: dataForm,
                    showMessag: false,
                    callBackSuccess: function (response) {

                        let notificados = [];
                        $.each(response.cantidadPorFechas, function (k, v) {
                            notificados.push(v.notificados);
                        });
                        let pendientes = [];
                        $.each(response.cantidadPorFechas, function (k, v) {
                            pendientes.push(v.pendientes);
                        });
                        GraficoEstadistico({
                            categorias: response.fechas,
                            notificados: notificados,
                            pendientes: pendientes
                        });
                    }
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
                text: 'Promedio de documentos durante la semana'
            },
            xAxis: {
                categories: opciones.categorias,
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
        }
    }
}();

document.addEventListener('DOMContentLoaded', function () {
    InicioListar.init();
});
