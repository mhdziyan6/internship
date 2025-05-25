<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Set contacts as the main landing page
$routes->get('/', 'ContactController::index');

// Address Book routes
$routes->get('contacts', 'ContactController::index');
$routes->get('contacts/create', 'ContactController::create');
$routes->post('contacts/store', 'ContactController::store');
$routes->get('contacts/edit/(:num)', 'ContactController::edit/$1');
$routes->post('contacts/update/(:num)', 'ContactController::update/$1');
$routes->get('contacts/delete/(:num)', 'ContactController::delete/$1');
$routes->get('contacts/export-pdf', 'ContactController::exportPDF');