const GoogleMapBasic = function () {

    const _CargarData = () => {
        CargarDataSelect({
            url: "UsuarioNotificadorListarJson",
            idSelect: "#CbIdUsuario",
            dataId: "IdUsuario",
            dataValor: "email",
        });
    }

    const _googleMapBasic = () => {
        if (typeof google == 'undefined') {
            console.warn('Warning - Google Maps library is not loaded.');
            return;
        }
        // Map settings
        function initialize() {

            // Define map element
            let map_basic_element = document.getElementById('map_basic');

            // Optinos
            let mapOptions = {
                zoom: 16,
                center: new google.maps.LatLng(-18.0152907, -70.2522761)
            };

            // Apply options
            let map = new google.maps.Map(map_basic_element, mapOptions);
        }

        // Load map
        google.maps.event.addDomListener(window, 'load', initialize);
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function () {
            _googleMapBasic();
            _CargarData();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function () {
    GoogleMapBasic.init();
});
