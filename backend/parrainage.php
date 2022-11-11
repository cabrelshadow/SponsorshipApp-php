<?php

require_once '../src/Database.php';
require_once '../src/Parrainage.php';
require '../db/db.php';
$db = new DatabaseConfig();

$parrain = new Parrainage($db->Con());
$nbr = $parrain->CountFilleuls();
var_dump($nbr[0]['total']);
