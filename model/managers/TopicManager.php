<?php
    namespace Model\Managers;   
    use App\Manager;
    use App\DAO;
    use Model\Managers\TopicManager;

    // Classe fille Hérite en étendant la Classe Mère
    class TopicManager extends Manager
    {
        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";
        // CONSTRUCTEUR
        public function __construct()
        {
            parent::connect();
        }
        // RECUPERER UN TOPIC SELON LA CATEGORIE
        public function getTopicsByIdCategiorie($id)
        {
            parent::connect();
            $sql = "SELECT *
                    FROM ".$this->tableName." t 
                    WHERE t.categorie_id = :id
                    ORDER BY dateTopic DESC";
                    return $this->getMultipleResults(
                        DAO::select($sql,['id' => $id]),
                        $this->className
                    );
        }

        // public function editTopic($id, $title)
        // {
        //     parent::connect();
        //     $sql = "UPDATE topic
        //             SET title = :title
        //             WHERE id_topic = :id";
                    
            
        //     DAO::update($sql, ["id"=>$id,"title"=>$title]);
        // }
    }