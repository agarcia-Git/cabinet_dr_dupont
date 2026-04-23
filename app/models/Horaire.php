<?php
class Horaire {
    private $id;
    private $jour_semaine;
    private $heure_ouverture;
    private $heure_fermeture;

    public function __construct($id, $jour_semaine, $heure_ouverture, $heure_fermeture) {
        $this->id = $id;
        $this->jour_semaine = $jour_semaine;
        $this->heure_ouverture = $heure_ouverture;
        $this->heure_fermeture = $heure_fermeture;
    }

    public function getId() { return $this->id; }
    public function getJourSemaine() { return $this->jour_semaine; }
    public function getHeureOuverture() { return $this->heure_ouverture; }
    public function getHeureFermeture() { return $this->heure_fermeture; }
}