<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// All Data DSS Routes
$routes->get('/view/alter', 'View::Alter');
$routes->get('/view/norm', 'View::NormalizedVector');
$routes->get('/view/pref', 'View::PrefData');
$routes->get('/view/res', 'View::ResultRanks');

// All Forms Routes
$routes->get('/forms/emp', 'Forms::viewFormEmp');
$routes->get('/forms/wp', 'Forms::viewFormWP');

// CRUD Forms Systems
$routes->post('forms/emp/add', 'Forms::addEmp');
$routes->post('forms/wp/add', 'Forms::addAlter');
$routes->post('forms/emp/edit', 'Forms::editEmp');
$routes->get('forms/emp/del/(:num)', 'Forms::delEmp/$1');
$routes->get('forms/wp/del/(:num)', 'Forms::delAlter/$1');