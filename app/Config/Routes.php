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