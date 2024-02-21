<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Data::index');

$routes->get('/employeeList/(:num)', 'EmployeeData::index/$1');

$routes->get('/', 'Home::index');

$routes->get('/addNewEmply/(:num)', 'EmployeeData::addEmployeeView/$1');

$routes->get('/addNewCompny', 'Data::addCompanyView');

$routes->post('/addNewEmply/add/(:num)', 'EmployeeData::addEmployee/$1');

$routes->post('/addNewCompny/add', 'Data::addCompany');

$routes->get('/editEmply/(:num)', 'EditController::editEmployee/$1');
$routes->post('/editEmply/update/(:num)', 'EditController::updateEmployee/$1');

$routes->get('/editCompny/(:num)', 'EditController::editCompany/$1');
$routes->post('/editCompny/update/(:num)', 'EditController::updateCompany/$1');

$routes->delete('/removeEmply/(:num)', 'EditController::removeEmployee/$1');
$routes->get('/removeEmply/(:any)', 'EditController::editEmployee/$1');

$routes->delete('/removeCompny/(:num)', 'EditController::removeCompany/$1');
$routes->get('/removeCompny/(:any)', 'EditController::editCompany/$1');

$routes->get('/employeeList/getEmployeeDetails/(:num)', 'EmployeeData::getEmployeeDetails/$1');
