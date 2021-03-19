DocumentoSeleccionado = "";
let InicioListar = function () {
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
        $(document).on('click', '.documentoChecked', function () {
            let IdDocumento = $(this).val();
            DocumentoSeleccionado = IdDocumento;
        });
        $(document).on('click', '#btnEditar', function () {
            if (DocumentoSeleccionado == "") {
                ShowAlert({
                    type: 'warning',
                    message: 'Seleccione un documento para editar'
                })
            } else {
                let IdDocumento = DocumentoSeleccionado;
                RedirigirUrl("EditarDocumento/" + IdDocumento);
            }
        });
        $(document).on('click', '#btnEliminar', function () {
            if (DocumentoSeleccionado == "") {
                ShowAlert({
                    type: 'warning',
                    message: 'Seleccione un documento para eliminar'
                })
            } else {
                let IdDocumento = DocumentoSeleccionado;
                swalInit({
                    title: 'ESTÁ SEGURO DE ELIMINAR ESTE DOCUMENTO?',
                    text: "CONSIDERE LO NECESARIO PARA REALIZAR ESTA ACCIÓN!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'SI, ELIMINAR!',
                    cancelButtonText: 'NO, CANCELAR!',
                    confirmButtonClass: 'btn bg-danger',
                    cancelButtonClass: 'btn btn-warning',
                    allowOutsideClick: false,
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.value) {
                        EnviarDataPost({
                            url: "DocumentoEliminarJson",
                            data: {
                                IdDocumento: IdDocumento,
                            },
                            callBackSuccess: function () {
                                setTimeout(function () {
                                    RefrescarVentana();
                                }, 1100);
                            }
                        })
                    }
                });
            }
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
            tableSearching: false,
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
                {
                    data: null, title: "OCPION",
                    "render": function (value) {
                        return ' <div class="form-check form-check-inline">' +
                            '<label class="form-check-label">' +
                            '<input type="radio" class="form-check-input-styled documentoChecked" name="documentoChecked" data-fouc value="' + value.IdDocumento + '">' +
                            '</label>' +
                            '</div>';
                    }, class: "text-center"
                }
            ],
            tabledrawCallback: function () {
                $(".form-check-input-styled").uniform();
            },
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
