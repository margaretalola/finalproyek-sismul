<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Add these specific routes
$routes->get('/', 'Welcome::index');
$routes->get('welcome', 'Welcome::index');
$routes->get('welcome/index', 'Welcome::index');

// Critical routes for your button actions
$routes->get('welcome/view/(:any)', 'Welcome::view/$1');
$routes->get('welcome/edit/(:any)', 'Welcome::edit/$1');
$routes->get('welcome/delete/(:any)', 'Welcome::delete/$1');

// Form submission route for update
$routes->post('welcome/update/(:any)', 'Welcome::update/$1');

// Additional routes if needed
$routes->get('welcome/create', 'Welcome::create');
$routes->post('welcome/create', 'Welcome::create');

$routes->get('welcome/create', 'Welcome::createForm');
$routes->post('welcome/create', 'Welcome::create');

$routes->get('welcome/deleteAll', 'Welcome::deleteAll');