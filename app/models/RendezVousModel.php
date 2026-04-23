<?php
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/RendezVous.php';

class RendezVousModel extends Model {

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM rendez_vous');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rdvs = [];
        foreach ($rows as $row) {
            $rdvs[] = new RendezVous(
                $row['id_rendezvous'],
                $row['id_patient'],
                $row['id_service'],
                $row['id_utilisateur'],
                $row['date_heure'],
                $row['statut'],
                $row['commentaire']
            );
        }
        return $rdvs;
    }

    public function create(RendezVous $rdv) {
        $stmt = $this->db->prepare('INSERT INTO rendez_vous (id_patient, id_service, id_utilisateur, date_heure, statut, commentaire) VALUES (:id_patient, :id_service, :id_utilisateur, :date_heure, :statut, :commentaire)');
        return $stmt->execute([
            ':id_patient'      => $rdv->getIdPatient(),
            ':id_service'      => $rdv->getIdService(),
            ':id_utilisateur'  => $rdv->getIdUtilisateur(),
            ':date_heure'      => $rdv->getDateHeure(),
            ':statut'          => $rdv->getStatut(),
            ':commentaire'     => $rdv->getCommentaire()
        ]);
    }

    public function updateStatut($id, $statut) {
        $stmt = $this->db->prepare('UPDATE rendez_vous SET statut = :statut WHERE id_rendezvous = :id');
        return $stmt->execute([':statut' => $statut, ':id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM rendez_vous WHERE id_rendezvous = :id');
        return $stmt->execute([':id' => $id]);
    }
}