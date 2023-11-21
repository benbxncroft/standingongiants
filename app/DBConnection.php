<?php

namespace App;

use PDO;
use PDOException;

class DBConnection {
    private $pdo;

    private string $path = "FPA_FOD_20170508.sqlite";

    public function connect() {
        if (! $this->pdo) {
            try {
                $this->pdo = new PDO("sqlite:" . $this->path);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $this->pdo;
    }
}
