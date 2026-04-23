<?php
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/Utilisateur.php';

class UtilisateurModel extends Model {

    public function findByEmail($email) {
        $stmt = $this->db->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;
        return new Utilisateur(
            $row['id_utilisateur'],
            $row['nom'],
            $row['prenom'],
            $row['email'],
            $row['mot_de_passe'],
            $row['role']
        );
    }

    public function create(Utilisateur $utilisateur) {
        $hash = password_hash($utilisateur->getPassword(), PASSWORD_BCRYPT);
        $stmt = $this->db->prepare('INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, role) VALUES (:nom, :prenom, :email, :password, :role)');
        return $stmt->execute([
            ':nom'      => $utilisateur->getNom(),
            ':prenom'   => $utilisateur->getPrenom(),
            ':email'    => $utilisateur->getEmail(),
            ':password' => $hash,
            ':role'     => $utilisateur->getRole()
        ]);
    }
}