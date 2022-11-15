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
        // NICKNAME
        public function getNickname()
        {
                return $this->nickname;
        }
        public function setNickname($newNickname)
        {
                $this->nickname = $newNickname;
                return $this;
        }       
        // EMAIL
        public function getEmail()
        {
                return $this->email;
        }
        public function setEmail($newEmail)
        {
                $this->email = $newEmail;
                return $this;
        }
        // DATE_INSCRIPTION
        public function getDateInscription(){
            $formattedDate = $this->dateInscription->format("d/m/Y, H:i:s");
            return $formattedDate;
        }
        public function setDateInscription($date){
            $this->dateInscription = new \DateTime($date);
            return $this;
        }
        // PASSWORD
        public function getPassword()
        {
                return $this->password;
        }
        public function setPassword($newPassword)
        {
                $this->password = $newPassword;
                return $this;
        }
        // ROLE     
        public function getRole()
        {
                return $this->role;
        }
        public function setRole($newRole)
        {
                $this->role = $newRole;
                return $this;
        }
        public function hasRole($role)
        {
                if ($this->role == $role){
                       
                        return $this->role;
                } else 
                        return false;

        }
        // TO_STRING
        public function __toString()
        {
                return $this->nickname;
        }      
}
