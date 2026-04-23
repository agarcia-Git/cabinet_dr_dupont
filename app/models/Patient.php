<?php
class Patient {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $date_naissance;
    private $adresse;

    public function __construct($id, $nom, $prenom, $email, $telephone, $date_naissance, $adresse) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->date_naissance = $date_naissance;
        $this->adresse = $adresse;
    }

    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getEmail() { return $this->email; }
    public function getTelephone() { return $this->telephone; }
    public function getDateNaissance() { return $this->date_naissance; }
    public function getAdresse() { return $this->adresse; }
}