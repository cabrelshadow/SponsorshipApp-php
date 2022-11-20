<?php

extract($_POST);

require_once '../src/Database.php';
require '../db/db.php';
$db = new DatabaseConfig();

var_dump($_POST);
// $add = $db->Con()->query("INSERT INTO filleuls (FULLNAME, PHONE,EMAIL,FACULTY) VALUES ('".$fullname."','".$tel."','".$email."','".$fac."')");
