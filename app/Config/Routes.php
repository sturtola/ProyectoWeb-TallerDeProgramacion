<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/nosotros', 'Nosotros::index');
$routes->get('comercializacion', 'Comercializacion::index');