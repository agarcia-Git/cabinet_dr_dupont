<?php
require_once __DIR__ . '/../app/models/Horaire.php';

use PHPUnit\Framework\TestCase;

class HoraireTest extends TestCase {

    public function testConstructeur() {
        $horaire = new Horaire(1, 'Lundi', '09:00:00', '18:00:00');
        
        $this->assertEquals(1, $horaire->getId());
        $this->assertEquals('Lundi', $horaire->getJourSemaine());
        $this->assertEquals('09:00:00', $horaire->getHeureOuverture());
        $this->assertEquals('18:00:00', $horaire->getHeureFermeture());
    }

    public function testHeureOuvertureNonVide() {
        $horaire = new Horaire(1, 'Lundi', '09:00:00', '18:00:00');
        $this->assertNotEmpty($horaire->getHeureOuverture());
    }

    public function testJourSemaineNonVide() {
        $horaire = new Horaire(1, 'Lundi', '09:00:00', '18:00:00');
        $this->assertNotEmpty($horaire->getJourSemaine());
    }
}