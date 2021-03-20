const DocumentoDetalle = function () {
    const Componentes = () => {
        
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

        if (documento.estado == 1) {
            document.getElementById("Notificado").checked = true;
            document.getElementById("Devuelto").checked = false;
            $("#EstadoEtiqueta").text("NOTIFICADO");
        } else {
            document.getElementById("Devuelto").checked = true;
            document.getElementById("Notificado").checked = false;
            $("#EstadoEtiqueta").text("PENDIENTE");
        }

        $(".form-check-input-styled").uniform();
    }
    return {
        init: function () {
            Componentes();
            CargarData();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function () {
    DocumentoDetalle.init();
})
