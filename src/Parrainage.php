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
        $filleuls = $this->con->query('SELECT * FROM filleuls '.$limit !== 0 ? 'LIMIT='.$limit : ''.'')->fetchAll();

        return $filleuls;
    }

    /**
     * getFilleulsHaveNotParrain.
     *
     * @param int limit
     */
    public function getFilleulsHaveNotParrain(int $limit = 0): array
    {
        $filleuls = $this->con->query('SELECT * FROM filleuls '.$limit !== 0 ? 'LIMIT='.$limit : ''.' WHERE IDPARRAIN = null')->fetchAll();

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
        $filleuls = $this->con->query('SELECT * FROM filleuls '.$limit !== 0 ? 'LIMIT='.$limit : ''.' WHERE IDPARRAIN = '.$parrain_id.'')->fetchAll();

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

    public function CountFilleuls()
    {
        return $this->con->query('SELECT COUNT(*) as total FROM filleuls')->fetchAll();
    }
}
