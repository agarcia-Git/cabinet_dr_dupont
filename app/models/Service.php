<?php
class Service {
    private $id;
    private $nom;
    private $description;
    private $duree_minutes;
    private $actif;

    public function __construct($id, $nom, $description, $duree_minutes, $actif) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->duree_minutes = $duree_minutes;
        $this->actif = $actif;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getDescription() { return $this->description; }
    public function getDureeMinutes() { return $this->duree_minutes; }
    public function isActif() { return $this->actif; }
}