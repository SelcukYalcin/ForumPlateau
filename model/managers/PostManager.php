<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    // Classe fille Hérite en étendant la Classe Mère
    class PostManager extends Manager{

        protected $className = "Model\Entities\Post";
        protected $tableName = "post";

        // CONSTRUCTEUR
        public function __construct(){
            parent::connect();
        }

        // RECUPERER UN POST SELON LE TOPIC
        public function findPostsByTopicID($id) {
            $sql = "SELECT * 
                    FROM ".$this->tableName." p 
                    WHERE p.topic_id = :id
                    ORDER BY datePost ASC ";                               
            return  $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]), 
                $this->className
            );
        }
    }