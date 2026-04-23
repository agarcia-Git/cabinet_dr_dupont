<?php
class Actualite {
    private $id;
    private $titre;
    private $contenu;
    private $image;
    private $date_publication;

    public function __construct($id, $titre, $contenu, $image, $date_publication) {
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->image = $image;
        $this->date_publication = $date_publication;
    }

    public function getId() { return $this->id; }
    public function getTitre() { return $this->titre; }
    public function getContenu() { return $this->contenu; }
    public function getImage() { return $this->image; }
    public function getDatePublication() { return $this->date_publication; }
}