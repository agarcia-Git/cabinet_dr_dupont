<?php
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/Patient.php';

class PatientModel extends Model {

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM patient');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $patients = [];
        foreach ($rows as $row) {
            $patients[] = new Patient(
                $row['id_patient'],
                $row['nom'],
                $row['prenom'],
                $row['email'],
                $row['telephone'],
                $row['date_naissance'],
                $row['adresse']
            );
        }
        return $patients;
    }

    public function findById($id) {
        $stmt = $this->db->prepare('SELECT * FROM patient WHERE id_patient = :id');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;
        return new Patient(
            $row['id_patient'],
            $row['nom'],
            $row['prenom'],
            $row['email'],
            $row['telephone'],
            $row['date_naissance'],
            $row['adresse']
        );
    }

    public function create(Patient $patient) {
        $stmt = $this->db->prepare('INSERT INTO patient (nom, prenom, email, telephone, date_naissance, adresse) VALUES (:nom, :prenom, :email, :telephone, :date_naissance, :adresse)');
        return $stmt->execute([
            ':nom'            => $patient->getNom(),
            ':prenom'         => $patient->getPrenom(),
            ':email'          => $patient->getEmail(),
            ':telephone'      => $patient->getTelephone(),
            ':date_naissance' => $patient->getDateNaissance(),
            ':adresse'        => $patient->getAdresse()
        ]);
    }

    public function update(Patient $patient) {
    $stmt = $this->db->prepare('
        UPDATE patient 
        SET nom = :nom, prenom = :prenom, email = :email, 
            telephone = :telephone, date_naissance = :date_naissance, adresse = :adresse
        WHERE id_patient = :id
    ');
    return $stmt->execute([
        ':nom'            => $patient->getNom(),
        ':prenom'         => $patient->getPrenom(),
        ':email'          => $patient->getEmail(),
        ':telephone'      => $patient->getTelephone(),
        ':date_naissance' => $patient->getDateNaissance(),
        ':adresse'        => $patient->getAdresse(),
        ':id'             => $patient->getId()
    ]);
}

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM patient WHERE id_patient = :id');
        return $stmt->execute([':id' => $id]);
    }
}