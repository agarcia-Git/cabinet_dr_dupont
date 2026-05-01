<?php
require_once __DIR__ . '/../app/models/Service.php';

use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase {

    public function testConstructeur() {
        $service = new Service(1, 'Détartrage', 'Nettoyage complet des dents', 45, 1);
        
        $this->assertEquals(1, $service->getId());
        $this->assertEquals('Détartrage', $service->getNom());
        $this->assertEquals('Nettoyage complet des dents', $service->getDescription());
        $this->assertEquals(45, $service->getDureeMinutes());
        $this->assertTrue((bool)$service->isActif());
    }

    public function testServiceInactif() {
        $service = new Service(1, 'Détartrage', 'Nettoyage', 45, 0);
        $this->assertFalse((bool)$service->isActif());
    }

    public function testDureePositive() {
        $service = new Service(1, 'Détartrage', 'Nettoyage', 45, 1);
        $this->assertGreaterThan(0, $service->getDureeMinutes());
    }
}