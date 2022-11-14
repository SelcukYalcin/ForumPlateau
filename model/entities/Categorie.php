<?php
    namespace Model\Entities;

    use App\Entity;
    
//     il n’est pas possible d’effectuer de l’héritage sur cette classe
    final class Categorie extends Entity{

        private $id;
        private $libelle;

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

        // LIBELLE
        public function getLibelle()
        {
                return $this->libelle;
        }
        public function setLibelle($libelle)
        {
                $this->libelle = $libelle;
                return $this;
        }

        // TO_STRING
        public function __toString()
        {
            return $this->libelle;
        }
    }