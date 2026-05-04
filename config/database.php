<?php
class Database {
    private $host     = 'mysql-cabinet-dr-dupont.alwaysdata.net';
    private $dbname   = 'cabinet-dr-dupont_db';
    private $username = 'cabinet-dr-dupont';
    private $password = 'password38300';
    private $pdo;

    public function getConnection() {
        try {
            $this->pdo = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8mb4',
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }
}