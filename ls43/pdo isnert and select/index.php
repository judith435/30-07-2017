<?php
    require_once 'connection.php';
    require_once 'content.php';
    require_once 'misc.php';

    $con = new Connection();
    $resultsSqlRows = $con->executeStatement('SELECT * FROM ls42_contents');
    $resultsObjects = [];

    while ($row = $resultsSqlRows->fetch()) {
        array_push($resultsObjects, new Content($row));
    }

    for ($i = 0; $i < count($resultsObjects); $i++) {
        echo $resultsObjects[$i]->printHtml();
    }
 
?>
