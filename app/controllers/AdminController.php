<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/RendezVousModel.php';
require_once __DIR__ . '/../models/PatientModel.php';
require_once __DIR__ . '/../models/ServiceModel.php';
require_once __DIR__ . '/../models/ActualiteModel.php';
require_once __DIR__ . '/../models/HoraireModel.php';

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
        $rdvModel     = new RendezVousModel();
        $patientModel = new PatientModel();
        $serviceModel = new ServiceModel();
        $this->render('back/dashboard', [
            'rdvs'     => $rdvModel->getAll(),
            'patients' => $patientModel->getAll(),
            'services' => $serviceModel->getAll()
        ]);
    }

    public function rendezVous() {
        $rdvModel = new RendezVousModel();
        $this->render('back/rendez-vous', ['rdvs' => $rdvModel->getAll()]);
    }

    public function confirmerRdv() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $rdvModel = new RendezVousModel();
            $rdvModel->updateStatut($id, 'confirme');
        }
        header('Location: index.php?url=admin/rendez-vous');
        exit;
    }

    public function annulerRdv() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $rdvModel = new RendezVousModel();
            $rdvModel->updateStatut($id, 'annule');
        }
        header('Location: index.php?url=admin/rendez-vous');
        exit;
    }

    public function patients() {
        $patientModel = new PatientModel();
        $this->render('back/patients', ['patients' => $patientModel->getAll()]);
    }

    public function ajouterPatient() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $patient = new Patient(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['date_naissance'],
            $_POST['adresse']
        );
        $patientModel = new PatientModel();
        $patientModel->create($patient);
        header('Location: index.php?url=admin/patients');
        exit;
    }
    $this->render('back/patient-form', ['patient' => null]);
}

public function modifierPatient() {
    $id = $_GET['id'] ?? null;
    $patientModel = new PatientModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $patient = new Patient(
            $id,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['date_naissance'],
            $_POST['adresse']
        );
        $patientModel->update($patient);
        header('Location: index.php?url=admin/patients');
        exit;
    }

    $patient = $patientModel->findById($id);
    if (!$patient) {
        header('Location: index.php?url=admin/patients');
        exit;
    }
    $this->render('back/patient-form', ['patient' => $patient]);
}

public function supprimerPatient() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $patientModel = new PatientModel();
        $patientModel->delete($id);
    }
    header('Location: index.php?url=admin/patients');
    exit;
}

    
    public function services() {
    $serviceModel = new ServiceModel();
    $this->render('back/services', ['services' => $serviceModel->getAll()]);
}

    public function ajouterService() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $service = new Service(
            null,
            $_POST['nom'],
            $_POST['description'],
            $_POST['duree_minutes'],
            isset($_POST['actif']) ? 1 : 0
        );
        $serviceModel = new ServiceModel();
        $serviceModel->create($service);
        header('Location: index.php?url=admin/services');
        exit;
    }
    $this->render('back/service-form', ['service' => null]);
}

    public function modifierService() {
    $id = $_GET['id'] ?? null;
    $serviceModel = new ServiceModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $service = new Service(
            $id,
            $_POST['nom'],
            $_POST['description'],
            $_POST['duree_minutes'],
            isset($_POST['actif']) ? 1 : 0
        );
        $serviceModel->update($service);
        header('Location: index.php?url=admin/services');
        exit;
    }

    $service = $serviceModel->findById($id);
    if (!$service) {
        header('Location: index.php?url=admin/services');
        exit;
    }
    $this->render('back/service-form', ['service' => $service]);
}

    public function supprimerService() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $serviceModel = new ServiceModel();
        $serviceModel->delete($id);
    }
    header('Location: index.php?url=admin/services');
    exit;
}

    public function actualites() {
    $actualiteModel = new ActualiteModel();
    $this->render('back/actualites', ['actualites' => $actualiteModel->getAll()]);
}

    public function ajouterActualite() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $actualite = new Actualite(
            null,
            $_POST['titre'],
            $_POST['contenu'],
            $_POST['image'],
            date('Y-m-d')
        );
        $actualiteModel = new ActualiteModel();
        $actualiteModel->create($actualite);
        header('Location: index.php?url=admin/actualites');
        exit;
    }
    $this->render('back/actualite-form', ['actualite' => null]);
}

    public function modifierActualite() {
    $id = $_GET['id'] ?? null;
    $actualiteModel = new ActualiteModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $actualite = new Actualite(
            $id,
            $_POST['titre'],
            $_POST['contenu'],
            $_POST['image'],
            date('Y-m-d')
        );
        $actualiteModel->update($actualite);
        header('Location: index.php?url=admin/actualites');
        exit;
    }

    $actualite = $actualiteModel->findById($id);
    if (!$actualite) {
        header('Location: index.php?url=admin/actualites');
        exit;
    }
    $this->render('back/actualite-form', ['actualite' => $actualite]);
}

    public function supprimerActualite() {
    $id = $_GET['id'] ?? null;
    if ($id) {
        $actualiteModel = new ActualiteModel();
        $actualiteModel->delete($id);
    }
    header('Location: index.php?url=admin/actualites');
    exit;
}
    

    public function horaires() {
        $horaireModel = new HoraireModel();
        $this->render('back/horaires', ['horaires' => $horaireModel->getAll()]);
    }
    
    public function modifierHoraire() {
    $id = $_GET['id'] ?? null;
    $horaireModel = new HoraireModel();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $horaireModel->update($id, $_POST['heure_ouverture'], $_POST['heure_fermeture']);
        header('Location: index.php?url=admin/horaires');
        exit;
    }

    $horaires = $horaireModel->getAll();
    $horaire = null;
    foreach ($horaires as $h) {
        if ($h->getId() == $id) {
            $horaire = $h;
            break;
        }
    }
    $this->render('back/horaire-form', ['horaire' => $horaire]);
}
}