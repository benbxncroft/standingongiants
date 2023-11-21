<?php include 'templates/top.php'; ?>

<?php include 'app.php';
    $forests = $forestFiresData->getForests();

    foreach ($forests as $forest) {
        echo "<a class='list-link' href='/fires.php?forest-name={$forest}'>{$forest}</a>";
    }
?>

<?php include 'templates/bottom.php'; ?>
