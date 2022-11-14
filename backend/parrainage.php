<?php

require_once '../src/Database.php';
require_once '../src/Parrainage.php';
require '../db/db.php';

$db = new DatabaseConfig();

$parrain = new Parrainage($db->Con());
$nbr = $parrain->setRandomParrain(function ($br) {
    var_dump($br);
});
var_dump($nbr);
