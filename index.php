<?php

require_once './src/Database.php';
require './db/db.php';
$db = new DatabaseConfig();
header('location:setProfile.php');
