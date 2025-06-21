<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Rutas de páginas estáticas
$routes->get('/', 'Pages::index');
$routes->get('/QuienesSomos', 'Pages::about');
$routes->get('/TerminosYUsos', 'Pages::terms');
$routes->get('/Comercializacion', 'Pages::comercialization');
$routes->get('/Mantenimiento', 'Pages::mantenimiento');
$routes->get('/IniciarSesion', 'Pages::login');
$routes->get('/Registrarse', 'Pages::register');
$routes->get('/Productos', 'Pages::catalogo');
$routes->get('/Contacto', 'Pages::contacto');
//Cambios lauta para vista previa
$routes->get('admin', 'Admin::index');
$routes->get('listadoproductos', 'Listadoproductos::index');
$routes->get('agregar', 'Agregar::index');
$routes->get('clientes', 'Clientes::index');
$routes->get('consultas', 'Consultas::index');
$routes->get('usuario', 'Usuario::index');
$routes->get('modificarusuario', 'Modificarusuario::index');

// Establecer controlador por defecto
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');

// Manejo de 404 personalizado
$routes->set404Override(function() {
    return view('templates/main_layout', [
        'title' => 'Página no encontrada - Mi Tienda',
        'content' => view('errors/custom_404')
    ]);
});

$routes->post('auth/registrar', 'Auth::registrar');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('usuario_controller', 'usuario_controller::index');
$routes->get('usuario_controller/agregar', 'usuario_controller::agregar');
$routes->post('usuario_controller/guardar', 'usuario_controller::guardar');
$routes->get('usuario_controller/editar/(:num)', 'usuario_controller::editar/$1');
$routes->post('usuario_controller/actualizar/(:num)', 'usuario_controller::actualizar/$1');
$routes->get('usuario_controller/eliminar/(:num)', 'usuario_controller::eliminar/$1');

$routes->get('producto_controller', 'producto_controller::index');
$routes->get('producto_controller/agregar', 'producto_controller::agregar');
$routes->post('producto_controller/guardar', 'producto_controller::guardar');
$routes->get('producto_controller/editar/(:num)', 'producto_controller::editar/$1');
$routes->post('producto_controller/actualizar/(:num)', 'producto_controller::actualizar/$1');
$routes->get('producto_controller/eliminar/(:num)', 'producto_controller::eliminar/$1');

$routes->post('consulta_controller/guardar', 'consulta_controller::guardar'); // Para guardar consulta
$routes->get('consulta_controller', 'consulta_controller::index');             // Para listar consultas (admin)
$routes->get('consulta_controller/eliminar/(:num)', 'consulta_controller::eliminar/$1'); // Para eliminar consulta

$routes->get('/catalogo', 'Catalogo::index');
