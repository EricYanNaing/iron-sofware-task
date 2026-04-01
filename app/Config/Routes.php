<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('projects', 'Projects::index', ['as' => 'projects.index']);
$routes->get('projects/(:segment)', 'Projects::show/$1', ['as' => 'projects.show']);
