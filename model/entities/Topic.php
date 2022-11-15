<?php
    namespace Model\Entities;
    use App\Entity;
    
//     il n’est pas possible d’effectuer de l’héritage sur cette classe
    final class Topic extends Entity{
        private $id;
        private $title;
        private $user;
        private $dateTopic;
        private $closed;
        private $nbPosts;
        private $categorie;
        // CONSTRUCTEUR
        public function __construct($data)
        {         
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
        // TITLE
        public function getTitle()
        {
                return $this->title;
        } 
        public function setTitle($newTitle)
        {
                $this->title = $newTitle;
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
        // DATE_TOPIC
        public function getDateTopic()
        {
            $formattedDate = $this->dateTopic->format("d/m/Y, H:i:s");
            return $formattedDate;
        }
        public function setDateTopic($date)
        {
            $this->dateTopic = new \DateTime($date);
            return $this;
        }
        // NB_POSTS
        public function getNbPosts()
        {
                return $this->nbPosts;
        }
        public function setNbPosts($nbPosts)
        {
                $this->nbPosts = $newNbPosts;
                return $this;
        }
        // CLOSED
        public function getClosed()
        {
                return $this->closed;
        }
        public function setClosed($newClosed)
        {
                $this->closed = $newClosed;
                return $this;
        }
        // CATEGORIE
        public function getCategorie()
        {
                return $this->categorie;
        }
        public function setCategorie($newCategorie)
        {
                $this->categorie = $newCategorie;
                return $this;
        }
        // TO_STRING
        public function __toString()
        {
                return $this->title;
        }
    }