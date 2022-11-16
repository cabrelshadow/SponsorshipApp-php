<?php

require_once '../src/Database.php';
require_once '../src/Parrainage.php';
require '../db/db.php';

$db = new DatabaseConfig();

$parrain = new Parrainage($db->Con());
/*$nbr = $parrain->setRandomParrainTIC1_TIC2(function ($br) {
    var_dump($br);
});
var_dump($nbr);

$nbr = $parrain->setRandomParrain3il1_3il2(function ($br) {
    var_dump($br);
});
var_dump($nbr);*/

$parrainTi=$parrain->getAllFilleulsWithParrain();
print_r($parrainTi);

/*$parrain3il=$parrain->CountParrains3il2();
var_dump($parrain3il);*/