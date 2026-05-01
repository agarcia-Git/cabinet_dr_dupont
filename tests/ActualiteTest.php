<?php
require_once __DIR__ . '/../app/models/Actualite.php';

use PHPUnit\Framework\TestCase;

class ActualiteTest extends TestCase {

    public function testConstructeur() {
        $actualite = new Actualite(1, 'Titre test', 'Contenu test', 'image.jpg', '2026-04-01');
        
        $this->assertEquals(1, $actualite->getId());
        $this->assertEquals('Titre test', $actualite->getTitre());
        $this->assertEquals('Contenu test', $actualite->getContenu());
        $this->assertEquals('image.jpg', $actualite->getImage());
        $this->assertEquals('2026-04-01', $actualite->getDatePublication());
    }

    public function testTitreNonVide() {
        $actualite = new Actualite(1, 'Titre test', 'Contenu', null, '2026-04-01');
        $this->assertNotEmpty($actualite->getTitre());
    }

    public function testImageNulle() {
        $actualite = new Actualite(1, 'Titre', 'Contenu', null, '2026-04-01');
        $this->assertNull($actualite->getImage());
    }
}