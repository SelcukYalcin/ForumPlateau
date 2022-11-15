<?php
    namespace Model\Entities;
    use App\Entity;
    
//     il n’est pas possible d’effectuer de l’héritage sur cette classe
    final class Post extends Entity{
        private $id;
        private $texte;
        private $user;
        private $datePost;
        private $topic;
        // CONSTRUCTEUR
        public function __construct($data){         
            $this->hydrate($data);        
        } 
        // ID
        public function getId()
        {
                return $this->id;
        }
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
        // TEXTE
        public function getTexte()
        {
                return $this->texte;
        }
        public function setTexte($newTexte)
        {
                $this->texte = $newTexte;

                return $this;
        }
        // USER
        public function getUser()
        {
                return $this->user;
        }
        public function setUser($newUser)
        {
                $this->user = $newUser;
                return $this;
        }
        // DATE_POST
        public function getDatePost(){
            $formattedDate = $this->datePost->format("d/m/Y, H:i:s");
            return $formattedDate;
        }
        public function setDatePost($date){
            $this->datePost = new \DateTime($date);
            return $this;
        }
        // TOPIC
        public function getTopic()
        {
                return $this->topic;
        }
        public function setTopic($newTopic)
        {
                $this->topic = $newTopic;
                return $this;
        }        
        // TO_STRING
        public function __toString()
        {
            return $this->text;
        }
    }
