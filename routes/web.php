<?php

Route::middleware(['guest'])->group(function () {
    #region Login
    Route::post('LoginValidarWebJson', 'AutenticacionController@LoginValidarWebJson');
    Route::post('LoginRegistrarJson', 'AutenticacionController@LoginRegistrarJson');
    Route::get('/login', 'AutenticacionController@LoginVista')->name('login');
    Route::get('/', 'AutenticacionController@PortadaVista');
    Route::get('Registrarse', 'AutenticacionController@LoginRegistrarVista')->name('Login.Registrarse');
    #endregion
});

Route::middleware(['auth'])->group(function () {
    #region Inicio
    Route::get('Inicio', 'InicioController@InicioVista')->name('Inicio.Listar');
    Route::post('CerrarSesionJson', 'AutenticacionController@CerrarSesionJson')->name('CerrarSesion');
    #endregion
    #region Documento
    Route::get('RegistrarDocumento', 'DocumentoController@DocumentoRegistrarVista')->name('Documento.Registrarse');
    Route::get('DocumentoFiltro', 'DocumentoController@DocumentoFiltroVista')->name('Documento.Filtro');
    Route::get('EditarDocumento/{IdDocumento}', 'DocumentoController@DocumentoEditarVista');
    Route::get('DetalleDocumento/{IdDocumento}', 'DocumentoController@DocumentoDetalleVista');
    #endregion
    #region Reporte
    Route::get('ReporteDocumento', 'ReporteController@ReporteDocumentoListarVista')->name('Reporte.Documento');
    #endregion
    #region
    Route::get('Monitoreo', 'MonitoreoController@MonitoreoListarVista')->name('Monitoreo.Listar');
    #endregion
});
