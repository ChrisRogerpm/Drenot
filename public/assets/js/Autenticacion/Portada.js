

var PortadaView = function () {
    var _componentes = function () {
        $(document).on('click', '#btnPasarLogin', function () {
            RedirigirUrl("login");
        });        
    };
    return {
        init: function () {
            _componentes();
        }
    }


}();

document.addEventListener('DOMContentLoaded', function () {
    PortadaView.init();
});



