<?php

require 'vendor/autoload.php';

use App\DBConnection;
use App\ForestFiresData;

$pdo = (new DBConnection())->connect();

$forestFiresData = new ForestFiresData($pdo);

if (!$pdo) {
    echo "Could not connect to database.";
}
