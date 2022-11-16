<?php

require_once '../src/Database.php';
require_once '../src/Parrainage.php';
require '../db/db.php';

$db = new DatabaseConfig();

$parrain = new Parrainage($db->Con());

$sp = $parrain->getAllFilleulsWithParrain();

return printf(json_encode($sp, true));
