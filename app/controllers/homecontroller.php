<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/HoraireModel.php';
require_once __DIR__ . '/../models/ServiceModel.php';
require_once __DIR__ . '/../models/ActualiteModel.php';
require_once __DIR__ . '/../models/RendezVousModel.php';
require_once __DIR__ . '/../models/PatientModel.php';
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/RendezVous.php';

class HomeController extends Controller {

    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index() {
        $horaireModel = new HoraireModel();
        $this->render('front/home', [
            'title'    => 'Accueil — Cabinet Dr. Dupont',
            'horaires' => $horaireModel->getAll()
        ]);
    }

    public function apropos() {
        $this->render('front/a-propos', [
            'title' => 'À propos — Cabinet Dr. Dupont'
        ]);
    }

    public function services() {
        $serviceModel = new ServiceModel();
        $this->render('front/services', [
            'title'    => 'Nos services — Cabinet Dr. Dupont',
            'services' => $serviceModel->getAll()
        ]);
    }

    public function actualites() {
        $actualiteModel = new ActualiteModel();
        $this->render('front/actualites', [
            'title'      => 'Actualités — Cabinet Dr. Dupont',
            'actualites' => $actualiteModel->getAll()
        ]);
    }

    public function actualiteDetail() {
    $id = $_GET['id'] ?? null;
    $actualiteModel = new ActualiteModel();
    $actualite = $actualiteModel->findById($id);
    $this->render('front/actualite-detail', [
        'title'     => $actualite ? $actualite->getTitre() . ' — Cabinet Dr. Dupont' : 'Actualité',
        'actualite' => $actualite
    ]);
}

    public function rendezVous() {
        $serviceModel = new ServiceModel();
        $this->render('front/rendez-vous', [
            'title'    => 'Prendre rendez-vous — Cabinet Dr. Dupont',
            'services' => $serviceModel->getAll()
        ]);
    }

    public function soumettreRdv() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $patientModel = new PatientModel();
            $rdvModel     = new RendezVousModel();

            $patient = new Patient(
                null,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $_POST['telephone'],
                $_POST['date_naissance'],
                $_POST['adresse'] ?? ''
            );
            $patientModel->create($patient);
            $id_patient = $this->db->lastInsertId();

            $date_heure = $_POST['date_rdv'] . ' ' . $_POST['heure_rdv'] . ':00';
            $rdv = new RendezVous(
                null,
                $id_patient,
                $_POST['id_service'],
                null,
                $date_heure,
                'en_attente',
                $_POST['commentaire'] ?? ''
            );
            $rdvModel->create($rdv);

            header('Location: index.php?url=rendez-vous-confirmation');
            exit;
        }
    }

    public function confirmation() {
        $this->render('front/confirmation', [
            'title' => 'Rendez-vous confirmé — Cabinet Dr. Dupont'
        ]);
    }
}