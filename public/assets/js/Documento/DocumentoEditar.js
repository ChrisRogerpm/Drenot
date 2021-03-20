const DocumentoEditar = function () {
    const Componentes = () => {
        $(document).on('click', '.btnGuardar', function () {
            $("#frmNuevo").submit();
            if (_objetoForm_frmNuevo.valid()) {
                let dataForm = $("#frmNuevo").serializeFormJSON();
                EnviarDataPost({
                    url: "DocumentoEditarJson",
                    data: dataForm,
                    callBackSuccess: function (response) {
                        setTimeout(function () {
                            RedirigirUrl("Inicio")
                        }, 1100);
                    }
                });
            }
        });
    }
    const CargarData = () => {
        $("#IdDocumento").val(documento.IdDocumento);
        $("#fecha").val(moment(documento.fecha).format("YYYY-MM-DD"));
        $("#nroDocumento").val(documento.nroDocumento);
        $("#remitente").val(documento.remitente);
        $("#destino").val(documento.destino);
        $("#direccion").val(documento.direccion);
        $("#telefono").val(documento.telefono);
        $("#Cbprioridad").val(documento.prioridad);
        $("#observaciones").val(documento.observaciones);
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
        $("#Cbprioridad").select2();
        CargarDataSelect({
            url: "TipoDocumentoListarJson",
            idSelect: "#CbIdtipoDocumento",
            dataId: "IdTipoDocumento",
            dataValor: "nombre",
            valorSelect: documento.IdtipoDocumento
        });

        if (documento.estado == 2) {
            document.getElementById("Notificado").checked = true;
            document.getElementById("Devuelto").checked = false;
            $("#EstadoEtiqueta").text("NOTIFICADO");
            document.getElementById('EstadoEtiqueta').style.backgroundColor = "#5CB85C";
        } else {
            document.getElementById("Devuelto").checked = true;
            document.getElementById("Notificado").checked = false;
            $("#EstadoEtiqueta").text("PENDIENTE");
            document.getElementById('EstadoEtiqueta').style.backgroundColor = "#EFAC4E";
        }

        $(".form-check-input-styled").uniform();
    }
    const FormularioValidacion = () => {
        ValidarFormulario({
            contenedor: '#frmNuevo',
            nameVariable: "frmNuevo",
            rules: {
                IdtipoDocumento: { required: true },
                destino: { required: true, },
                direccion: { required: true, },
                fecha: { required: true, },
                nroDocumento: { required: true, },
                observaciones: { required: true, },
                prioridad: { required: true, },
                remitente: { required: true, },
                telefono: { required: true, },
            },
            messages: {
                IdtipoDocumento: { required: 'Este campo es requerido' },
                destino: { required: 'Este campo es requerido' },
                direccion: { required: 'Este campo es requerido' },
                fecha: { required: 'Este campo es requerido' },
                nroDocumento: { required: 'Este campo es requerido' },
                observaciones: { required: 'Este campo es requerido' },
                prioridad: { required: 'Este campo es requerido' },
                remitente: { required: 'Este campo es requerido' },
                telefono: { required: 'Este campo es requerido' },
            }
        });
    }

    return {
        init: function () {
            Componentes();
            CargarData();
            FormularioValidacion();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function () {
    DocumentoEditar.init();
})
