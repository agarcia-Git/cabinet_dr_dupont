<?php
require_once 'app/core/Router.php';

$router = new Router();

// Routes front office
$router->add('', 'HomeController', 'index');
$router->add('rendez-vous', 'RendezVousController', 'index');
$router->add('services', 'ServiceController', 'index');
$router->add('a-propos', 'HomeController', 'apropos');
$router->add('actualites', 'ActualiteController', 'index');

// Routes back office
$router->add('login', 'AuthController', 'login');
$router->add('login-post', 'AuthController', 'loginPost');
$router->add('logout', 'AuthController', 'logout');
$router->add('admin', 'AdminController', 'index');
$router->add('admin/rendez-vous', 'AdminController', 'rendezVous');
$router->add('admin/patients', 'AdminController', 'patients');
$router->add('admin/actualites', 'AdminController', 'actualites');
$router->add('admin/horaires', 'AdminController', 'horaires');

$router->dispatch();