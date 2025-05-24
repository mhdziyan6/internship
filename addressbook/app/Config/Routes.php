<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Set contacts as the main landing page
$routes->get('/', 'ContactController::index');

// Address Book routes
$routes->get('create', 'ContactController::create');
$routes->post('store', 'ContactController::store');
$routes->get('edit/(:num)', 'ContactController::edit/$1');
$routes->post('update/(:num)', 'ContactController::update/$1');
$routes->get('delete/(:num)', 'ContactController::delete/$1');
$routes->get('export-pdf', 'ContactController::exportPDF');