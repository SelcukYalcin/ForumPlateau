<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

// Classe fille Hérite en étendant la Classe Mère
class CategorieManager extends Manager
{

    protected $className = "Model\Entities\Categorie";
    protected $tableName = "Categorie";


    public function __construct()
    {
        parent::connect();
    }

    public function findOneByLibelle($libelle){

        $sql = "SELECT *
                FROM ".$this->tableName." c
                WHERE c.libelle = :libelle";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['libelle' => $libelle], false), 
            $this->className
        );
    }

}