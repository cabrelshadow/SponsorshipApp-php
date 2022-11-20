<?php

declare(strict_types=1);
// require '../db/db.php';
class Profiles
{
    public function __construct()
    {
    }

    public function getProfile(PDO $con, string $tablename, int $number): array
    {
        return $con->query('SELECT * FROM '.$tablename." WHERE PHONE = '".$number."'")->fetch();
    }

    public function getUser(PDO $con, string $tablename, int $id)
    {
        if ($con->query('SELECT * FROM '.$tablename." WHERE IDPARRAIN = '".$id."'")->rowCount() > 0) {
            return $con->query('SELECT * FROM '.$tablename." WHERE IDPARRAIN = '".$id."'")->fetch();
        } elseif ($con->query('SELECT * FROM '.$tablename." WHERE IDFILLEULS = '".$id."'")->rowCount() > 0) {
            return $con->query('SELECT * FROM '.$tablename." WHERE IDFILLEULS = '".$id."'")->fetch();
        }
    }

    public function setProfile(PDO $con, string $tablename, int $number, string $filename)
    {
        return $con->query('UPDATE '.$tablename." SET PICTURE='".$filename."' WHERE PHONE='".$number."'");
    }

    public function isParrainOrFilleul(PDO $con, int $number): string
    {
        $status = '';
        $countF = $con->query("SELECT * FROM filleuls WHERE PHONE = '".$number."'")->rowCount();
        $countP = $con->query("SELECT * FROM parrain WHERE PHONE = '".$number."'")->rowCount();
        if ($countF > 0) {
            return 'Filleul';
        }
        if ($countP > 0) {
            return 'Parrain';
        }
    }
}
