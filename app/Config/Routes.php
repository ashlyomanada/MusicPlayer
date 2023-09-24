<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MusicController::index');
$routes->post('/save', 'MusicController::save');
$routes->get('/delete/(:num)','MusicController::delete/$1');
$routes->get('/edit/(:num)','MusicController::edit/$1');
$routes->get('/add','MusicController::add');
$routes->post('/upload','MusicController::upload');
$routes->post('/uploadPlaylist','MusicController::uploadPlaylist');
$routes->get('/search','MusicController::search');
$routes->get('/viewPlayList/(:num)','MusicController::viewPlayList/$1');
