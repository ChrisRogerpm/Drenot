let InicioListar = function () {
    const componentes = () => {
        $(document).on('click', '.btnEditar', function () {
            let IdDocumento = $(this).data('id');
            RedirigirUrl("EditarDocumento/" + IdDocumento);
        });
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
    }
    const _CargarData = function () {
        $('.form-input-styled').uniform({
            fileButtonClass: 'action btn bg-dark'
        });
    };
    const ListarDocumentos = function () {
        CargarTablaDatatable({
            uniform: true,
            ajaxUrl: "DocumentoListarJson",
            table: "#table",
            tableOrdering: false,
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

    return {
        init: function () {
            componentes();
            _CargarData();
            ListarDocumentos();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function () {
    InicioListar.init();
});
