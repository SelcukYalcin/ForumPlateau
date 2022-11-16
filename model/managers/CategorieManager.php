<?php
    namespace Model\Managers;
    use App\Manager;
    use App\DAO;

    // Classe fille Hérite en étendant la Classe Mère
    class CategorieManager extends Manager
    {
        protected $className = "Model\Entities\Categorie";
        protected $tableName = "Categorie";
        // CONSTRUCTEUR
        public function __construct()
        {
            parent::connect();
        }
        // RECUPERER UNE CATEGORIE SELON LE LIBELLE
        public function findOneByLibelle($libelle)
        {
            parent::connect();
            $sql = "SELECT *
                    FROM ".$this->tableName." c
                    WHERE c.libelle = :libelle";           
                    return $this->getOneOrNullResult(
                        DAO::select($sql, ['libelle' => $libelle], false), 
                        $this->className
                    );
        }
        // EDITER UNE CATEGORIE
        public function editCategorie($libelle, $id)
        {
            $sql = "UPDATE categorie
                    SET libelle = :libelle
                    WHERE id_categorie = :id";
                    
                        DAO::update($sql, ["id"=>$id, "libelle" => $libelle]);

        }
    }