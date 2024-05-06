<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\BlogController;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BlogController::index');
$routes->post('/createBlog', 'BlogController::store');
$routes->get('/viewBlog/(:num)', 'BlogController::viewBlog/$1');
$routes->post('/updateBlog', 'BlogController::updateBlog');
$routes->post('/deleteBlog', 'BlogController::deleteBlog');