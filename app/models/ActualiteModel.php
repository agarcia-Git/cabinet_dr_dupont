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

    public function findById($id) {
    $stmt = $this->db->prepare('SELECT * FROM actualite WHERE id_actualite = :id');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$row) return null;
    return new Actualite(
        $row['id_actualite'],
        $row['titre'],
        $row['contenu'],
        $row['image'],
        $row['date_publication']
    );
}

    public function update(Actualite $actualite) {
    $stmt = $this->db->prepare('
        UPDATE actualite 
        SET titre = :titre, contenu = :contenu, image = :image
        WHERE id_actualite = :id
    ');
    return $stmt->execute([
        ':titre'   => $actualite->getTitre(),
        ':contenu' => $actualite->getContenu(),
        ':image'   => $actualite->getImage(),
        ':id'      => $actualite->getId()
    ]);
}
}