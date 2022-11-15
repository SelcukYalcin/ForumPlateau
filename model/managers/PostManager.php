<?php
    namespace Model\Managers;   
    use App\Manager;
    use App\DAO;

    // Classe fille Hérite en étendant la Classe Mère
    class PostManager extends Manager
    {
        protected $className = "Model\Entities\Post";
        protected $tableName = "post";
        // CONSTRUCTEUR
        public function __construct()
        {
            parent::connect();
        }
        // RECUPERER UN POST SELON LE TOPIC
        public function findPostsByIdTopic($id) 
        {
            parent::connect();
            $sql = "SELECT * 
                    FROM ".$this->tableName." p 
                    WHERE p.topic_id = :id
                    ORDER BY datePost ASC ";                               
                    return  $this->getMultipleResults(
                        DAO::select($sql, ['id' => $id]), 
                        $this->className
                    );
        }
        // AJOUTER UN POST
        public function addPost($id) 
        {
            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $userId = 1;
            if($texte && $id && $userId)
            {
                $newPost=["texte"=>$texte, "topic_id"=>$id, "user_id"=>$userId];
                return $this->add($newPost);
            }
        }
    }