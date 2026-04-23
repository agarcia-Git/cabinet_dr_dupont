<?php
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/Service.php';

class ServiceModel extends Model {

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM service WHERE actif = 1');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $services = [];
        foreach ($rows as $row) {
            $services[] = new Service(
                $row['id_service'],
                $row['nom'],
                $row['description'],
                $row['duree_minutes'],
                $row['actif']
            );
        }
        return $services;
    }

    public function create(Service $service) {
        $stmt = $this->db->prepare('INSERT INTO service (nom, description, duree_minutes, actif) VALUES (:nom, :description, :duree_minutes, :actif)');
        return $stmt->execute([
            ':nom'           => $service->getNom(),
            ':description'   => $service->getDescription(),
            ':duree_minutes' => $service->getDureeMinutes(),
            ':actif'         => $service->isActif()
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM service WHERE id_service = :id');
        return $stmt->execute([':id' => $id]);
    }
}