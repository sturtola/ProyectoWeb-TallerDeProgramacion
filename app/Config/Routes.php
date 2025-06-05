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



// Rutas para contacto
$routes->get('/Contacto', 'Contact::index');
$routes->post('/Contacto/send', 'Contact::send');

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

$routes->get('usuario', 'Usuario::index');
$routes->get('usuario/crear', 'Usuario::crear');
$routes->post('usuario/guardar', 'Usuario::guardar');
$routes->get('usuario/editar/(:num)', 'Usuario::editar/$1');
$routes->post('usuario/actualizar/(:num)', 'Usuario::actualizar/$1');
$routes->post('usuario/eliminar/(:num)', 'Usuario::eliminar/$1');
$routes->post('auth/registrar', 'Auth::registrar');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');



