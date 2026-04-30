<?php
require_once 'app/core/Router.php';

$router = new Router();

// Routes front office
$router->add('services',                 'HomeController', 'services');
$router->add('actualites',               'HomeController', 'actualites');
$router->add('a-propos',                 'HomeController', 'apropos');
$router->add('rendez-vous',              'HomeController', 'rendezVous');
$router->add('rendez-vous-soumission',   'HomeController', 'soumettreRdv');
$router->add('rendez-vous-confirmation', 'HomeController', 'confirmation');
$router->add('actualite',                'HomeController',  'actualiteDetail');

// Routes back office
$router->add('login', 'AuthController', 'login');
$router->add('login-post', 'AuthController', 'loginPost');
$router->add('logout', 'AuthController', 'logout');
$router->add('admin', 'AdminController', 'index');
$router->add('admin/rendez-vous', 'AdminController', 'rendezVous');
$router->add('admin/patients', 'AdminController', 'patients');
$router->add('admin/actualites', 'AdminController', 'actualites');
$router->add('admin/horaires', 'AdminController', 'horaires');

$router->add('admin/rdv-confirmer', 'AdminController', 'confirmerRdv');
$router->add('admin/rdv-annuler', 'AdminController', 'annulerRdv');

$router->add('admin/patient-ajouter', 'AdminController', 'ajouterPatient');
$router->add('admin/patient-modifier', 'AdminController', 'modifierPatient');
$router->add('admin/patient-supprimer', 'AdminController', 'supprimerPatient');

$router->add('admin/services',          'AdminController', 'services');
$router->add('admin/service-ajouter',   'AdminController', 'ajouterService');
$router->add('admin/service-modifier',  'AdminController', 'modifierService');
$router->add('admin/service-supprimer', 'AdminController', 'supprimerService');

$router->add('admin/actualites',           'AdminController', 'actualites');
$router->add('admin/actualite-ajouter',    'AdminController', 'ajouterActualite');
$router->add('admin/actualite-modifier',   'AdminController', 'modifierActualite');
$router->add('admin/actualite-supprimer',  'AdminController', 'supprimerActualite');

$router->add('admin/horaires',         'AdminController', 'horaires');
$router->add('admin/horaire-modifier', 'AdminController', 'modifierHoraire');

$router->dispatch();