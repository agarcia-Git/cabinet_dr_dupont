<?php
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/Horaire.php';

class HoraireModel extends Model {

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM horaire');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $horaires = [];
        foreach ($rows as $row) {
            $horaires[] = new Horaire(
                $row['id_horaire'],
                $row['jour_semaine'],
                $row['heure_ouverture'],
                $row['heure_fermeture']
            );
        }
        return $horaires;
    }

    public function update($id, $heure_ouverture, $heure_fermeture) {
        $stmt = $this->db->prepare('UPDATE horaire SET heure_ouverture = :ouverture, heure_fermeture = :fermeture WHERE id_horaire = :id');
        return $stmt->execute([
            ':ouverture'  => $heure_ouverture,
            ':fermeture'  => $heure_fermeture,
            ':id'         => $id
        ]);
    }
}