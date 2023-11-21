<?php

namespace App;

use PDO;

class ForestFiresData {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getForests() {
        $query = $this->pdo->query('SELECT DISTINCT NWCG_REPORTING_UNIT_NAME FROM Fires');

        $forests = [];
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $forests[] = $row['NWCG_REPORTING_UNIT_NAME'];
        }

        return $forests;
    }

    public function getForestFires(string $forestName) {
        $query = $this->pdo->prepare(
            'SELECT FPA_ID,
            FIRE_NAME,
            DISCOVERY_DATE,
            DISCOVERY_TIME,
            STAT_CAUSE_DESCR
            FROM Fires
            WHERE NWCG_REPORTING_UNIT_NAME = :forest_name;'
        );

        $query->execute(['forest_name' => $forestName]);

        $fires = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $fires[] = [
                'id' => $row['FPA_ID'],
                'fire_name' => $row['FIRE_NAME'],
                'discovery_date' => $row['DISCOVERY_DATE'],
                'discovery_time' => $row['DISCOVERY_TIME'],
                'cause' => $row['STAT_CAUSE_DESCR'],
            ];
        }

        return $fires;
    }
}
