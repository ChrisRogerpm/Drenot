DocumentoSeleccionado = "";
let BuscarListar = function () {
    const componentes = () => {
        $(document).on('click', '#GenerarExcel', function () {
            var obj = {
                tabla: "table",
                NombreArchivo: "Documentos",
                ColumnasEliminar: [
                    'estado',
                    'IdDocumento',
                ],
                ListaHeaderCustom: [
                    '#',
                    'TIPO DOCUMENTO',
                    'NRO DOCUMENTO',
                    'REMITENTE',
                    'DESTINO',
                    'FECHA',
                    'ESTADO',
                    'PRIORIDAD',
                ],
                HeadersEliminar: ['OPCION'],
            };
            GenerarExcel(obj);
        });
        $(document).on('click', '#btnBuscar', function () {
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
        CargarDataSelect({
            url: "TipoDocumentoListarJson",
            idSelect: "#CbIdtipoDocumento",
            dataId: "IdTipoDocumento",
            dataValor: "nombre",
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
            tableSearching: false,
            ajaxDataSend: opciones.data,
            tableColumns: [
                { data: "nroSecuencia", title: "#" },
                { data: "tipoDocumento", title: "TIPO DOCUMENTO" },
                { data: "nroDocumento", title: "NRO DOCUMENTO" },
                { data: "remitente", title: "REMITENTE" },
                { data: "destino", title: "DESTINO" },
                { data: "fecha", title: "FECHA" },
                {
                    data: null, title: "ESTADO",
                    "render": function (value) {
                        if (value.estadoNombre = "PENDIENTE") {
                            return '<span class="badge p-2" style="font-size:12px;color:#ffffff;background-color:#EFAC4E">PENDIENTE</span>';
                        } else {
                            return '<span class="badge p-2" style="font-size:12px;color:#ffffff;background-color:#5CB85C">NOTIFICADO</span>';
                        }
                    }, class: "text-center"
                },
                { data: "prioridad", title: "PRIORIDAD", class: "text-center" },
            ],
        })
    };

    return {
        init: function () {
            componentes();
            _CargarData();
            ListarDocumentos();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function () {
    BuscarListar.init();
});
