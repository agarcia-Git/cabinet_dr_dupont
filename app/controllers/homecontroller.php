<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/HoraireModel.php';

class HomeController extends Controller {
    public function index() {
        $horaireModel = new HoraireModel();
        $horaires = $horaireModel->getAll();
        $this->render('front/home', ['horaires' => $horaires]);
    }

    public function apropos() {
        $this->render('front/a-propos');
    }
}