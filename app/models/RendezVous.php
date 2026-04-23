<?php
class RendezVous {
    private $id;
    private $id_patient;
    private $id_service;
    private $id_utilisateur;
    private $date_heure;
    private $statut;
    private $commentaire;

    public function __construct($id, $id_patient, $id_service, $id_utilisateur, $date_heure, $statut, $commentaire) {
        $this->id = $id;
        $this->id_patient = $id_patient;
        $this->id_service = $id_service;
        $this->id_utilisateur = $id_utilisateur;
        $this->date_heure = $date_heure;
        $this->statut = $statut;
        $this->commentaire = $commentaire;
    }

    public function getId() { return $this->id; }
    public function getIdPatient() { return $this->id_patient; }
    public function getIdService() { return $this->id_service; }
    public function getIdUtilisateur() { return $this->id_utilisateur; }
    public function getDateHeure() { return $this->date_heure; }
    public function getStatut() { return $this->statut; }
    public function getCommentaire() { return $this->commentaire; }
}