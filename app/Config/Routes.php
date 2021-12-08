<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/adm', 'LogindmController::index');
$routes->post('adm/login', 'LogindmController::login');
$routes->get('adm/salir', 'LogindmController::salir');

$routes->get('/AgrupMenu', 'AgrupMenuController::index');
$routes->get('/AgrupMenu/editar/(:any)', 'AgrupMenuController::editar/$1');
$routes->post('/AgrupMenu/insertar', 'AgrupMenuController::insertar');
$routes->post('/AgrupMenu/actualizar', 'AgrupMenuController::actualizar/$1');

$routes->get('/Libros', 'LibroController::index');
$routes->get('/Libros/editar/(:any)', 'LibroController::editar/$1');
$routes->get('/Libros/(:any)', 'LibroController::indexley/$1');
$routes->post('/Libros/insertar', 'LibroController::insertar');
$routes->post('/Libros/actualizar', 'LibroController::actualizar/$1');

$routes->get('/Usuario', 'UsuarioController::index');
$routes->get('/Usuario/editar/(:any)', 'UsuarioController::editar/$1');
$routes->post('/Usuario/insertar', 'UsuarioController::insertar');
$routes->post('/Usuario/actualizar', 'UsuarioController::actualizar/$1');

$routes->get('/Agrupamiento', 'AgrupamientoController::index');
$routes->get('/Agrupamiento/editar/(:any)', 'AgrupamientoController::editar/$1');
$routes->post('/Agrupamiento/insertar', 'AgrupamientoController::insertar');
$routes->post('/Agrupamiento/actualizar', 'AgrupamientoController::actualizar/$1');

$routes->get('/RegistrosOfi', 'RegOfiController::index');
$routes->get('/RegistrosOfi/(:any)', 'RegOfiController::mes/$1');

// Clientes routes
$routes->get('/Cliente', 'ClienteController::index');
// crud de clientes
$routes->post('/crear', 'ClienteController::crear');
$routes->get('/obtenerCliente/(:any)', 'ClienteController::obtenerCliente/$1');
$routes->post('/actualizar', 'ClienteController::actualizar');
$routes->get('/eliminar/(:any)', 'ClienteController::eliminar/$1');


// DetalleClientes routes
$routes->get('/DetalleCliente', 'DetalleClienteController::index');
// crud de detalleclientes
$routes->post('/DetalleCliente/crear', 'DetalleClienteController::crear');
$routes->get('/DetalleCliente/obtener/(:any)', 'DetalleClienteController::obtener/$1');
$routes->post('/DetalleCliente/actualizar', 'DetalleClienteController::actualizar');
$routes->get('/DetalleCliente/eliminar/(:any)', 'DetalleClienteController::eliminar/$1');

// Suscripciones routes
$routes->get('/Suscripcion', 'SuscripcionController::index');
// crud de suscripciones
$routes->post('/Suscripcion/crear', 'SuscripcionController::crear');
$routes->get('/Suscripcion/obtener/(:any)', 'SuscripcionController::obtener/$1');
$routes->post('/Suscripcion/actualizar', 'SuscripcionController::actualizar');
$routes->get('/Suscripcion/eliminar/(:any)', 'SuscripcionController::eliminar/$1');


$routes->get('/Capitulo', 'CapituloController::index');
$routes->get('/Capitulo/editar/(:any)', 'CapituloController::editar/$1');
$routes->get('/Capitulo/(:any)', 'CapituloController::indexCap/$1');
$routes->post('/Capitulo/insertar', 'CapituloController::insertar');
$routes->post('/Capitulo/actualizar', 'CapituloController::actualizar/$1');

$routes->get('/Romano', 'RomanoController::index');
$routes->get('/Romano/editar/(:any)', 'RomanoController::editar/$1');
$routes->post('/Romano/insertar', 'RomanoController::insertar');
$routes->post('/Romano/actualizar', 'RomanoController::actualizar/$1');

$routes->get('/Seccion', 'SeccionController::index');
$routes->get('/Seccion/editar/(:any)', 'SeccionController::editar/$1');
$routes->get('/Seccion/(:any)', 'SeccionController::indexSec/$1');
$routes->post('/Seccion/insertar', 'SeccionController::insertar');
$routes->post('/Seccion/actualizar', 'SeccionController::actualizar/$1');

$routes->get('/Categoria', 'CategoriaController::index');
$routes->get('/Categoria/editar/(:any)', 'CategoriaController::editar/$1');
$routes->post('/Categoria/insertar', 'CategoriaController::insertar');
$routes->post('/Categoria/actualizar', 'CategoriaController::actualizar/$1');

$routes->get('/Funcion', 'FuncionController::index');
$routes->get('/Funcion/editar/(:any)', 'FuncionController::editar/$1');
$routes->post('/Funcion/insertar', 'FuncionController::insertar');
$routes->post('/Funcion/actualizar', 'FuncionController::actualizar/$1');


// Titulos routes
$routes->get('/Titulos', 'TitulosController::index');
// crud de Titulos
$routes->get('/Titulos/(:any)', 'TitulosController::indexLibro/$1');
$routes->post('/Titulos/crear', 'TitulosController::crear');
$routes->get('/Titulo/obtener/(:any)', 'TitulosController::obtener/$1');
$routes->post('/Titulos/actualizar', 'TitulosController::actualizar');
$routes->get('/Titulos/eliminar/(:any)', 'TitulosController::eliminar/$1');

// Articulos routes
$routes->get('/Articulos', 'ArticulosController::index');
$routes->get('/Articulos/(:any)', 'ArticulosController::indexArt/$1');
// crud de Titulos
$routes->post('/Articulos/crear', 'ArticulosController::crear');
$routes->get('/Articulo/obtener/(:any)', 'ArticulosController::obtener/$1');
$routes->post('/Articulos/actualizar', 'ArticulosController::actualizar');
$routes->get('/Articulos/eliminar/(:any)', 'ArticulosController::eliminar/$1');

// Paragrafos routes
$routes->get('/Paragrafos', 'ParagrafosController::index');
// crud de Titulos
$routes->post('/Paragrafos/crear', 'ParagrafosController::crear');
$routes->get('/Paragrafos/(:any)', 'ParagrafosController::indexPara/$1');
$routes->get('/Paragrafo/obtener/(:any)', 'ParagrafosController::obtener/$1');
$routes->post('/Paragrafos/actualizar', 'ParagrafosController::actualizar');
$routes->get('/Paragrafos/eliminar/(:any)', 'ParagrafosController::eliminar/$1');

// Disposicion routes
$routes->get('/Disposicion', 'DisposicionController::index');
// crud de Titulos
$routes->post('/Disposicion/crear', 'DisposicionController::crear');
$routes->get('/Disposicion/obtener/(:any)', 'DisposicionController::obtener/$1');
$routes->post('/Disposicion/actualizar', 'DisposicionController::actualizar');
$routes->get('/Disposicion/eliminar/(:any)', 'DisposicionController::eliminar/$1');
$routes->get('/Disposicion/(:any)', 'DisposicionController::indexdispo/$1');

// Reformatorias routes
$routes->get('/Reformatorias', 'ReformatoriasController::index');
// crud de Reformatorias
$routes->post('/Reformatorias/crear', 'ReformatoriasController::crear');
$routes->get('/Reformatorias/obtener/(:any)', 'ReformatoriasController::obtener/$1');
$routes->post('/Reformatorias/actualizar', 'ReformatoriasController::actualizar');
$routes->get('/Reformatorias/eliminar/(:any)', 'ReformatoriasController::eliminar/$1');
$routes->get('/Reformatorias/(:any)', 'ReformatoriasController::indexdispo/$1');


// Disposicion routes
$routes->get('/Organismo', 'OrganismoController::index');
// crud de Titulos
$routes->post('/Organismo/crear', 'OrganismoController::crear');
$routes->get('/Organismo/obtenerTitulos/(:any)', 'OrganismoController::obtenerTitulos/$1');
$routes->post('/Organismo/actualizar', 'OrganismoController::actualizar');
$routes->get('/Organismo/eliminar/(:any)', 'OrganismoController::eliminar/$1');

// LeyesAgrupamiento routes
$routes->get('/LeyesAgrupamiento', 'LeyesAgrupamientoController::index');
// crud de Titulos
$routes->post('/LeyesAgrupamiento/crear', 'LeyesAgrupamientoController::crear');
$routes->get('/LeyesAgrupamiento/obtener/(:any)', 'LeyesAgrupamientoController::obtener/$1');
$routes->post('/LeyesAgrupamiento/actualizar', 'LeyesAgrupamientoController::actualizar');
$routes->get('/LeyesAgrupamiento/eliminar/(:any)', 'LeyesAgrupamientoController::eliminar/$1');

// TipoDocumento routes
$routes->get('/TipoDocumento', 'TipoDocumentoController::index');
// crud de Titulos
$routes->post('/TipoDocumento/crear', 'TipoDocumentoController::crear');
$routes->get('/TipoDocumento/obtener/(:any)', 'TipoDocumentoController::obtener/$1');
$routes->post('/TipoDocumento/actualizar', 'TipoDocumentoController::actualizar');
$routes->get('/TipoDocumento/eliminar/(:any)', 'TipoDocumentoController::eliminar/$1');

// crud de Juriprudencias
$routes->post('/Juriprudencias/crear', 'JuriprudenciaController::crear');
$routes->get('/Juriprudencias/obtener/(:any)', 'JuriprudenciaController::obtener/$1');
$routes->post('/Juriprudencias/actualizar', 'JuriprudenciaController::actualizar');
$routes->get('/Juriprudencias/eliminar/(:any)', 'JuriprudenciaController::eliminar/$1');
$routes->get('/Juriprudencias/(:any)', 'JuriprudenciaController::indexdispo/$1');

// RO routes
$routes->get('/TemasRO', 'TemasROController::index');
// crud de RO
$routes->post('/TemasRO/crear', 'TemasROController::crear');
$routes->get('/TemasRO/obtener/(:any)', 'TemasROController::obtener/$1');
$routes->post('/TemasRO/actualizar', 'TemasROController::actualizar');
$routes->get('/TemasRO/eliminar/(:any)', 'TemasROController::eliminar/$1');

// TipoAgrupamiento routes
$routes->get('/TipoAgrupamiento', 'TipoAgrupamientoController::index');
// crud de TipoAgrupamiento
$routes->post('/TipoAgrupamiento/crear', 'TipoAgrupamientoController::crear');
$routes->get('/TipoAgrupamiento/obtener/(:any)', 'TipoAgrupamientoController::obtener/$1');
$routes->post('/TipoAgrupamiento/actualizar', 'TipoAgrupamientoController::actualizar');
$routes->get('/TipoAgrupamiento/eliminar/(:any)', 'TipoAgrupamientoController::eliminar/$1');

// tipodispo routes
$routes->get('/TipoDisposicion', 'TipoDisposicionController::index');
// crud de tipodispo
$routes->post('/TipoDisposicion/crear', 'TipoDisposicionController::crear');
$routes->get('/TipoDisposicion/obtener/(:any)', 'TipoDisposicionController::obtener/$1');
$routes->post('/TipoDisposicion/actualizar', 'TipoDisposicionController::actualizar');
$routes->get('/TipoDisposicion/eliminar/(:any)', 'TipoDisposicionController::eliminar/$1');

// Login routes
$routes->get('/Login/ingresar', 'LoginController::ingresar');
$routes->post('/Login/login', 'LoginController::login');
$routes->get('/Login/salir', 'LoginController::salir');


$routes->get('/Leyes', 'LeyesController::index');
$routes->get('/Leyes/editar/(:any)', 'LeyesController::editar/$1');
$routes->post('/Leyes/insertar', 'LeyesController::insertar');
$routes->post('/Leyes/actualizar', 'LeyesController::actualizar/$1');

$routes->get('/mostrar/(:any)', 'LeyesController::indexClieLey/$1');
$routes->get('/MostrarLey/(:any)', 'LeyesController::LeyMOstrar/$1');

$routes->get('/Nosotros', 'NosotrosController::index');
$routes->post('/Nosotros/crear', 'NosotrosController::crear');
$routes->post('/Nosotros/actualizar', 'NosotrosController::actualizar');
$routes->get('/Nosotros/obtener/(:any)', 'NosotrosController::obtener/$1');

$routes->get('/Historia', 'HistoriaController::index');

$routes->get('/Diccionario', 'DiccionarioController::index');
$routes->post('/Diccionario/crear', 'DiccionarioController::crear');
$routes->get('/Diccionario/obtener/(:any)', 'DiccionarioController::obtener/$1');
$routes->post('/Diccionario/actualizar', 'DiccionarioController::actualizar');
$routes->get('/Diccionario/eliminar/(:any)', 'DiccionarioController::eliminar/$1');

$routes->get('/Registrarse', 'RegistrarseController::index');
$routes->post('/Registrarse/crear', 'RegistrarseController::crear');


$routes->get('/Personal', 'DetalleClienteController::indexPersonal');

$routes->get('/SubirArchivo', 'SubirArchivoController::index');
$routes->post('/SubirArchivo/cargar_archivos', 'SubirArchivoController::cargar_archivos');

// TipoAgrupamiento routes
$routes->get('/Favoritos', 'FavoritosController::index');
// crud de TipoAgrupamiento
$routes->post('/Favoritos/crear', 'FavoritosController::crear');
$routes->get('/Favoritos/obtener/(:any)', 'FavoritosController::obtener/$1');
$routes->post('/Favoritos/actualizar', 'FavoritosController::actualizar');
$routes->get('/Favoritos/eliminar/(:any)', 'FavoritosController::eliminar/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
