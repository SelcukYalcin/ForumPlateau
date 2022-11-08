<?php
    namespace Model\Entities;

    use App\Entity;
    
//     il n’est pas possible d’effectuer de l’héritage sur cette classe
    final class User extends Entity{

        private $id;
        private $nickname;
        private $email;
        private $dateInscription;
        private $password;
        private $role;

        public function __construct($data){         
            $this->hydrate($data);        
        } 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }
        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;
                return $this;
        }
        /**
         * Get the value of nickname
         */ 
        public function getNickname()
        {
                return $this->nickname;
        }
        /**
         * Set the value of nickname
         *
         * @return  self
         */ 
        public function setNickname($newNickname)
        {
                $this->nickname = $newNickname;
                return $this;
        }
        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }
        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($newEmail)
        {
                $this->email = $newEmail;
                return $this;
        }
       public function getDateInscription(){
            $formattedDate = $this->dateInscription->format("d/m/Y, H:i:s");
            return $formattedDate;
        }
        public function setDateInscription($date){
            $this->dateInscription = new \DateTime($date);
            return $this;
        }
        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }
        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($newPassword)
        {
                $this->password = $newPassword;
                return $this;
        }
        // * Get the value of role      
        public function getRole()
        {
                return $this->role;
        }
        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($newRole)
        {
                $this->role = $newRole;
                return $this;
        }
        public function __toString()
        {
                return $this->nickname;
        }
}
