<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/UtilisateurModel.php';

class AuthController extends Controller {

    public function login() {
        $this->render('back/login');
    }

    public function loginPost() {
        if (session_status() === PHP_SESSION_NONE) {
           session_start();
}

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?url=login');
            exit;
        }

        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $utilisateurModel = new UtilisateurModel();
        $utilisateur = $utilisateurModel->findByEmail($email);

        if ($utilisateur && password_verify($password, $utilisateur->getPassword())) {
            $_SESSION['user_id'] = $utilisateur->getId();
            $_SESSION['nom']     = $utilisateur->getNom();
            $_SESSION['prenom']  = $utilisateur->getPrenom();
            $_SESSION['role']    = $utilisateur->getRole();
            header('Location: index.php?url=admin');
            exit;
        } else {
            $error = "Email ou mot de passe incorrect.";
            $this->render('back/login', ['error' => $error]);
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?url=login');
        exit;
    }
}