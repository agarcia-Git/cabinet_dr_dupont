<?php
require_once __DIR__ . '/../app/models/RendezVous.php';

use PHPUnit\Framework\TestCase;

class RendezVousTest extends TestCase {

    public function testConstructeur() {
        $rdv = new RendezVous(1, 2, 3, 1, '2026-05-01 09:00:00', 'en_attente', 'RAS');
        
        $this->assertEquals(1, $rdv->getId());
        $this->assertEquals(2, $rdv->getIdPatient());
        $this->assertEquals(3, $rdv->getIdService());
        $this->assertEquals(1, $rdv->getIdUtilisateur());
        $this->assertEquals('2026-05-01 09:00:00', $rdv->getDateHeure());
        $this->assertEquals('en_attente', $rdv->getStatut());
        $this->assertEquals('RAS', $rdv->getCommentaire());
    }

    public function testStatutEnAttente() {
        $rdv = new RendezVous(1, 2, 3, 1, '2026-05-01 09:00:00', 'en_attente', '');
        $this->assertEquals('en_attente', $rdv->getStatut());
    }

    public function testStatutConfirme() {
        $rdv = new RendezVous(1, 2, 3, 1, '2026-05-01 09:00:00', 'confirme', '');
        $this->assertEquals('confirme', $rdv->getStatut());
    }
}