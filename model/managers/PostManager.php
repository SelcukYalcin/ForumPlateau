<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    // Classe fille Hérite en étendant la Classe Mère
    class PostManager extends Manager{

        protected $className = "Model\Entities\Post";
        protected $tableName = "post";


        public function __construct(){
            parent::connect();
        }

        public function findPostsByTopicID($id) {

            $sql = "SELECT * 
                    FROM ".$this->tableName." p 
                    WHERE p.topic_id = :id
                    ";
                    // ORDER BY datePost asc
                    
           
            return  $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]), 
                $this->className
            );
        }
    }