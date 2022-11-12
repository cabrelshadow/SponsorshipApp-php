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
            $filleuls = $this->con->query('SELECT * FROM filleuls LIMIT '.$limit.'')->fetchAll();
        } else {
            $filleuls = $this->con->query('SELECT * FROM filleuls ')->fetchAll();
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

    public function getParrainHaveNotFilleuls(int $limit = 0): array
    {
        $filleuls = [];
        if ($limit !== 0) {
            $filleuls = $this->con->query('SELECT * FROM parrain IS NULL LIMIT '.$limit.'')->fetchAll();
        } else {
            $filleuls = $this->con->query('SELECT * FROM parrain  ')->fetchAll();
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
            $filleuls = $this->con->query('SELECT * FROM filleuls  WHERE IDPARRAIN = '.$parrain_id.'')->fetchAll();
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
    public function CountFilleuls(): int
    {
        return intval($this->con->query('SELECT COUNT(*) as total FROM filleuls WHERE IDPARRAIN IS NULL ')->fetchAll()[0]['total']);
    }

    public function CountParrains(): int
    {
        return intval($this->con->query('SELECT COUNT(*) as total FROM parrain ')->fetchAll()[0]['total']);
    }

    public function setRandomParrain(closure $fun)
    {
        $getAllFilleuls = $this->getFilleulsHaveNotParrain();
        $getAllParrain = $this->getParrainHaveNotFilleuls();
        $countParrin = $this->CountParrains();
        $countFilleuls = $this->CountFilleuls();
        $newNbr = $countFilleuls > $countParrin ? ($countFilleuls - ($countFilleuls - $countParrin)) : ($countParrin - ($countParrin - $countFilleuls));
        shuffle($getAllFilleuls);
        shuffle($getAllParrain);
        for ($i = 0; $i < $newNbr; ++$i) {
            $this->con->query("UPDATE filleuls SET IDPARRAIN='".$getAllParrain[$i]['IDPARRAIN']."' WHERE IDFILLEUlS='".$getAllFilleuls[$i]['IDFILLEULS']."'");
            // var_dump($getAllParrain[$i]['IDPARRAIN']);
        }
        $fun($newNbr);
    }
}
