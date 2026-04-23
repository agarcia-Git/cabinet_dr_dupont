<?php
require_once __DIR__ . '/../core/Controller.php';

class AdminController extends Controller {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?url=login');
            exit;
        }
    }

    public function index() {
        $this->render('back/dashboard');
    }

    public function rendezVous() {
        $this->render('back/rendez-vous');
    }

    public function patients() {
        $this->render('back/patients');
    }

    public function actualites() {
        $this->render('back/actualites');
    }

    public function horaires() {
        $this->render('back/horaires');
    }
}