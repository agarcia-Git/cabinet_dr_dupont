<?php
require_once __DIR__ . '/../app/models/Patient.php';

use PHPUnit\Framework\TestCase;

class PatientTest extends TestCase {

    public function testConstructeur() {
        $patient = new Patient(1, 'Dupont', 'Jean', 'jean@email.fr', '0612345678', '1990-01-01', 'Lyon');
        
        $this->assertEquals(1, $patient->getId());
        $this->assertEquals('Dupont', $patient->getNom());
        $this->assertEquals('Jean', $patient->getPrenom());
        $this->assertEquals('jean@email.fr', $patient->getEmail());
        $this->assertEquals('0612345678', $patient->getTelephone());
        $this->assertEquals('1990-01-01', $patient->getDateNaissance());
        $this->assertEquals('Lyon', $patient->getAdresse());
    }

    public function testNomVide() {
        $patient = new Patient(1, '', 'Jean', 'jean@email.fr', '0612345678', '1990-01-01', 'Lyon');
        $this->assertEmpty($patient->getNom());
    }

    public function testEmailFormat() {
        $patient = new Patient(1, 'Dupont', 'Jean', 'jean@email.fr', '0612345678', '1990-01-01', 'Lyon');
        $this->assertStringContainsString('@', $patient->getEmail());
    }
}