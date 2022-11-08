<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    // use Model\Managers\TopicManager;

    // Classe fille Hérite en étendant la Classe Mère
    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }

        public function findTopicByCategorieID($id){
            $sql = "SELECT *
                    FROM ".$this->tableName." t 
                    WHERE t.categorie_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql,['id' => $id]),
                $this->className
            );
        }


    }