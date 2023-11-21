<?php include 'templates/top.php'; ?>

<div class="table-heading">
    <p>ID</p>
    <p>Name</p>
    <p>Discovered</p>
    <p>Cause</p>
</div>

<?php include 'app.php';
    $params = $_SERVER['QUERY_STRING'];
    $forestName = urldecode(explode('=', $params)[1]);
    $fires = $forestFiresData->getForestFires($forestName);

    foreach ($fires as $fire) {
        echo "
            <div class='table-row'>
                <p>{$fire['id']}</p>
                <p>{$fire['fire_name']}</p>
                <p>{$fire['discovery_date']} {$fire['discovery_time']}</p>
                <p>{$fire['cause']}</p>
            </div>
        ";
    }
?>

<?php include 'templates/bottom.php'; ?>
