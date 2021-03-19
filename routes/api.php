<?php

#region Autenticación
Route::post('LoginValidarWebJson', 'AutenticacionController@LoginValidarWebJson');
Route::post('LoginValidaAppJson', 'AutenticacionController@LoginValidaAppJson');
#endregion

#region Usuario
Route::get('UsuarioNotificadorListarJson', 'UsuarioController@UsuarioNotificadorListarJson');
#endregion

#region TipoDocumento
Route::get('TipoDocumentoListarJson', 'TipoDocumentoController@TipoDocumentoListarJson');
#endregion

#region Documento
Route::get('DocumentoListarJson', 'DocumentoController@DocumentoListarJson');
Route::post('DocumentoRegistrarJson', 'DocumentoController@DocumentoRegistrarJson');
Route::post('DocumentoEditarJson', 'DocumentoController@DocumentoEditarJson');
Route::post('DocumentoEliminarJson', 'DocumentoController@DocumentoEliminarJson');
#endregion

#region Reporte
Route::get('ReporteDocumentoListarJson', 'ReporteController@ReporteDocumentoListarJson');
Route::post('ReporteGraficoDocumentoListarJson', 'ReporteController@ReporteGraficoDocumentoListarJson');
#endregion
#region Excels
Route::post('GenerarExcelJson', 'FuncionesController@GenerarExcelJson');
#endregion