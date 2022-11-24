<?php

declare(strict_types=1);

class Parrainage
{
    protected $con;

    /**
     * __construct.
     *
     * @param PDO con
     *
     * @return void
     */
    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    /**
     * getAllFilleuls.
     *
     * @param int limit
     */
    public function getAllFilleuls(int $limit = 0): array
    {
        $filleuls = [];
        if ($limit > 0) {
            $filleuls = $this->con->query("SELECT * FROM filleuls LIMIT '.$limit.'")->fetchAll();
        } else {
            $filleuls = $this->con->query('SELECT * FROM filleuls ')->fetchAll();
        }

        return $filleuls;
    }

    public function getAllFilleulsTI(int $limit = 0): array
    {
        $filleuls = [];
        if ($limit > 0) {
            $filleuls = $this->con->query("SELECT * FROM filleuls WHERE  FACULTY LIKE 'TI%'  AND LIMIT '.$limit.'")->fetchAll();
        } else {
            $filleuls = $this->con->query("SELECT * FROM filleuls WHERE  FACULTY LIKE 'TI%' ")->fetchAll();
        }

        return $filleuls;
    }

    /**
     * getFilleulsHaveNotParrain.
     *
     * @param int limit
     */
    public function getFilleulsHaveNotParrain(int $limit = 0): array
    {
        $filleuls = [];
        if ($limit !== 0) {
            $filleuls = $this->con->query('SELECT * FROM filleuls  WHERE IDPARRAIN IS NULL LIMIT '.$limit.'')->fetchAll();
        } else {
            $filleuls = $this->con->query('SELECT * FROM filleuls  WHERE IDPARRAIN IS NULL ')->fetchAll();
        }

        return $filleuls;
    }

    // recuperation de tout les filleuls de tic1 qui nont pas de parrain
    public function getFilleulTIC1sHaveNotParrain(int $limit = 0): array
    {
        $filleuls = [];
        if ($limit !== 0) {
            $filleuls = $this->con->query("SELECT * FROM filleuls  WHERE FACULTY LIKE 'TI%' AND IDPARRAIN IS NULL LIMIT '.$limit.'")->fetchAll();
        } else {
            $filleuls = $this->con->query("SELECT * FROM filleuls  WHERE FACULTY LIKE 'TI%' AND IDPARRAIN IS NULL ")->fetchAll();
        }

        return $filleuls;
    }

    // recuperation de tout les filleuls de prepa 3il qui nont pas de parrain
    public function getFilleul3IL1sHaveNotParrain(int $limit = 0): array
    {
        $filleuls = [];
        if ($limit !== 0) {
            $filleuls = $this->con->query("SELECT * FROM filleuls  WHERE FACULTY LIKE '3IL%' AND IDPARRAIN IS NULL LIMIT '.$limit.'")->fetchAll();
        } else {
            $filleuls = $this->con->query("SELECT * FROM filleuls WHERE FACULTY LIKE '3IL%' AND IDPARRAIN IS NULL ")->fetchAll();
        }

        return $filleuls;
    }

    // recuperation de tout les parrains
    public function getParrainHaveNotFilleuls(int $limit = 0): array
    {
        $filleuls = [];
        if ($limit !== 0) {
            $filleuls = $this->con->query("SELECT * FROM parrain WHERE FACULTY LIKE 'TI%'  AND IS NULL LIMIT '.$limit.'")->fetchAll();
        } else {
            $filleuls = $this->con->query("SELECT * FROM parrain WHERE FACULTY LIKE 'TI%' ")->fetchAll();
        }

        return $filleuls;
    }

    //recuperation des parrain qui non pas de filleuls
    public function getParrainHaveNotFilleuls3IL(int $limit = 0): array
    {
        $filleuls = [];
        if ($limit !== 0) {
            $filleuls = $this->con->query("SELECT * FROM parrain WHERE FACULTY LIKE '3IL%'  AND IS NULL LIMIT '.$limit.'")->fetchAll();
        } else {
            $filleuls = $this->con->query("SELECT * FROM parrain WHERE FACULTY LIKE '3IL%' ")->fetchAll();
        }

        return $filleuls;
    }

    /**
     * getFilleulsByParrain.
     *
     * @param int limit
     * @param mixed parrain_id
     */
    public function getFilleulsByParrain(int $limit = 0, $parrain_id): array
    {
        $filleuls = [];
        if ($limit > 0) {
            $filleuls = $this->con->query('SELECT * FROM filleuls  WHERE IDPARRAIN = '.$parrain_id.' LIMIT '.$limit.'')->fetchAll();
        } else {
            $filleuls = $this->con->query('SELECT * FROM filleuls  WHERE IDPARRAIN = '.$parrain_id.'')->fetchAll();
        }

        return $filleuls;
    }

    /**
     * setParrain.
     *
     * @param int parrain_id
     *
     * @return void
     */
    public function setParrain(int $parrain_id)
    {
        $this->con->query("UPDATE filleuls SET IDPARRAIN='".$parrain_id."'");
        $countFilleuls = $this->con->query("SELECT COUNT(*) as total FROM filleuls WHERE IDPARRAIN='".$parrain_id."'")->fetchAll();
        $this->con->query("UPDATE filleuls SET NOMBREFILLEULS = '".$countFilleuls[0]['total']."' WHERE IDPARRAIN='".$parrain_id."'");

        return;
    }

    /**
     * CountFilleuls.
     */
    public function CountFilleulHasParrain()
    {
        return intval($this->con->query('SELECT COUNT(*) as total FROM filleuls WHERE IDPARRAIN NOT NULL ')->fetchAll()[0]['total']);
    }

    public function CountFilleuls(): int
    {
        return intval($this->con->query('SELECT COUNT(*) as total FROM filleuls WHERE IDPARRAIN IS NULL ')->fetchAll()[0]['total']);
    }

    // count filleuls ti 1
    public function CountFilleulsTi(): int
    {
        return intval($this->con->query("SELECT COUNT(*) as total FROM filleuls WHERE FACULTY LIKE 'TI%' AND IDPARRAIN IS NULL ")->fetchAll()[0]['total']);
    }

    //count filleul 3il 1
    public function CountFilleuls3IL(): int
    {
        return intval($this->con->query("SELECT COUNT(*) as total FROM filleuls WHERE FACULTY LIKE '3IL%' AND IDPARRAIN IS NULL ")->fetchAll()[0]['total']);
    }

    public function CountParrains(): int
    {
        return intval($this->con->query('SELECT COUNT(*) as total FROM parrain ')->fetchAll()[0]['total']);
    }

    //count parraint tic 2
    public function CountParrainsTI2(): int
    {
        return intval($this->con->query('SELECT COUNT(*) as total FROM parrain WHERE FACULTY LIKE "TI%" ')->fetchAll()[0]['total']);
    }

    //count parrain 3il 2
    public function CountParrains3il2(): int
    {
        return intval($this->con->query("SELECT COUNT(*) as total FROM parrain WHERE FACULTY LIKE '3IL%' ")->fetchAll()[0]['total']);
    }

    //founction ramdom pour toute les filliere confondue
    public function setRandomParrain(closure $fun)
    {
        $getAllFilleuls = $this->getFilleulsHaveNotParrain();
        $getAllParrain = $this->getParrainHaveNotFilleuls();
        $countParrin = $this->CountParrains();
        $countFilleuls = $this->CountFilleuls();
        $newNbr = $countFilleuls > $countParrin ? ($countFilleuls - ($countFilleuls - $countParrin)) : ($countParrin - ($countParrin - $countFilleuls));

        shuffle($getAllFilleuls); //mellange des filleus
        shuffle($getAllParrain); // mellange des parrain
        for ($i = 0; $i < $newNbr; ++$i) {
            $this->con->query("UPDATE filleuls SET IDPARRAIN='".$getAllParrain[$i]['IDPARRAIN']."' WHERE IDFILLEUlS='".$getAllFilleuls[$i]['IDFILLEULS']."'");
            // var_dump($getAllParrain[$i]['IDPARRAIN']);
        }
        $fun($this->getFilleulsByParrain(0, 9));
    }

    //parrainage entre les tic 1 et tic 2
    public function setRandomParrainTIC1_TIC2(closure $fun)
    {
        $getAllFilleuls = $this->getFilleulTIC1sHaveNotParrain();
        $getAllParrain = $this->getParrainHaveNotFilleuls();
        $countParrin = $this->CountParrainsTI2();
        $countFilleuls = $this->CountFilleulsTi();
        $newNbr = $countFilleuls > $countParrin ? ($countFilleuls - ($countFilleuls - $countParrin)) : ($countParrin - ($countParrin - $countFilleuls));

        shuffle($getAllFilleuls); //mellange des filleus
        shuffle($getAllParrain); // mellange des parrain
        for ($i = 0; $i < $newNbr; ++$i) {
            $req = $this->con->query("UPDATE filleuls SET IDPARRAIN='".$getAllParrain[$i]['IDPARRAIN']."' WHERE IDFILLEUlS='".$getAllFilleuls[$i]['IDFILLEULS']."'");
            // var_dump($getAllParrain[$i]['IDPARRAIN']);
        }
        $fun($req->fetchAll());
    }

    //parrainage entre les 3il 1 et 3il 2
    public function setRandomParrain3il1_3il2(closure $fun)
    {
        $getAllFilleuls = $this->getFilleul3IL1sHaveNotParrain();
        $getAllParrain = $this->getParrainHaveNotFilleuls3IL();
        $countParrin = $this->CountParrains3il2();
        $countFilleuls = $this->CountFilleuls3IL();
        $newNbr = $countFilleuls > $countParrin ? ($countFilleuls - ($countFilleuls - $countParrin)) : ($countParrin - ($countParrin - $countFilleuls));

        shuffle($getAllFilleuls); //mellange des filleus
        shuffle($getAllParrain); // mellange des parrain
        for ($i = 0; $i < $newNbr; ++$i) {
            $req = $this->con->query("UPDATE filleuls SET IDPARRAIN='".$getAllParrain[$i]['IDPARRAIN']."' WHERE IDFILLEUlS='".$getAllFilleuls[$i]['IDFILLEULS']."'");
            // var_dump($getAllParrain[$i]['IDPARRAIN']);
        }
        $fun($req->fetchAll());
    }

    //getAllFilleulsWithParrain
    public function getAllFilleulsWithParrain()
    {
        // $query = 'SELECT p.FULLNAME ,p.PHONE ,p.EMAIL ,p.FACULTY, P.PICTURE , f.FULLNAME ,f.PHONE ,
        //   f.EMAIL ,f.FACULTY ,f.PICTURE from parrain p JOIN filleuls f USING (IDPARRAIN)';

        // return $this->con->query($query)->fetchAll();
        $parrainAndFilleuls = [];
        $getParrain = $this->con->query('SELECT * FROM parrain')->fetchAll();
        foreach ($getParrain as $parrain) {
            $getFilleul = $this->getFilleulsByParrain(0, $parrain['IDPARRAIN']);
            $fdata = [
        'PARRAIN_ID' => $parrain['IDPARRAIN'],
        'PARRAIN_NAME' => $parrain['FULLNAME'],
        'PARRAIN_email' => $parrain['EMAIL'],
        'PARRAIN_phone' => $parrain['PHONE'],
        'PARRAIN_picture' => $parrain['PICTURE'],
        'PARRAIN_faculty' => $parrain['FACULTY'],
        'PARRAIN_filleuls' => $getFilleul,
     ];
            array_push($parrainAndFilleuls, $fdata);
        }

        return $parrainAndFilleuls;
    }
}