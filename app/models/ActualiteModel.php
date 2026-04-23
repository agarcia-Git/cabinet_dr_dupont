<?php
require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/Actualite.php';

class ActualiteModel extends Model {

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM actualite ORDER BY date_publication DESC');
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $actualites = [];
        foreach ($rows as $row) {
            $actualites[] = new Actualite(
                $row['id_actualite'],
                $row['titre'],
                $row['contenu'],
                $row['image'],
                $row['date_publication']
            );
        }
        return $actualites;
    }

    public function create(Actualite $actualite) {
        $stmt = $this->db->prepare('INSERT INTO actualite (titre, contenu, image) VALUES (:titre, :contenu, :image)');
        return $stmt->execute([
            ':titre'   => $actualite->getTitre(),
            ':contenu' => $actualite->getContenu(),
            ':image'   => $actualite->getImage()
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM actualite WHERE id_actualite = :id');
        return $stmt->execute([':id' => $id]);
    }
}