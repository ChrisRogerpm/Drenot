<?php

#region Autenticación
Route::post('LoginValidarWebJson', 'AutenticacionController@LoginValidarWebJson');
Route::post('LoginValidaAppJson', 'AutenticacionController@LoginValidaAppJson');
#endregion

#region Usuario
#endregion

#region TipoDocumento
Route::get('TipoDocumentoListarJson', 'TipoDocumentoController@TipoDocumentoListarJson');
#endregion

#region Documento
Route::get('DocumentoListarJson', 'DocumentoController@DocumentoListarJson');
Route::post('DocumentoRegistrarJson', 'DocumentoController@DocumentoRegistrarJson');
Route::post('DocumentoEditarJson', 'DocumentoController@DocumentoEditarJson');
#endregion

#region Reporte
Route::get('ReporteDocumentoListarJson', 'ReporteController@ReporteDocumentoListarJson');
#endregion
