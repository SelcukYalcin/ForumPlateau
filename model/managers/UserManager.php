<?php
    namespace Model\Managers;
    use App\Manager;
    use App\DAO;

    // Classe fille Hérite en étendant la Classe Mère
    class UserManager extends Manager
    {
        protected $className = "Model\Entities\User";
        protected $tableName = "user";
        // CONSTRUCTEUR
        public function __construct()
        {
            parent::connect();
        }
        // RECUPERER UN USER SELON L'EMAIL
        public function findOneByEmail($email){
            $sql = "SELECT *
                    FROM ".$this->tableName." u
                    WHERE u.email = :email";
                    return $this->getOneOrNullResult(
                    DAO::select($sql, ['email' => $email], false), 
                    $this->className
                    );
        }
        // RECUPERER UN USER SELON LE PSEUDO (NICKNAME)
        public function findOneByUser($nickname)
        {
            $sql = "SELECT *
                    FROM ".$this->tableName." u
                    WHERE u.nickname = :nickname";
                    return $this->getOneOrNullResult(
                    DAO::select($sql, ['nickname' => $nickname], false), 
                    $this->className
                    );
        }
        // RECUPERER LE PASSWORD DE L'EMAIL
        public function retrievePassword($email){
            $sql = "SELECT *
                    FROM ".$this->tableName." u
                    WHERE u.email = :email";
                    return $this->getOneOrNullResult(
                    DAO::select($sql, ['email' => $email], false), 
                    $this->className
                    );
        }
    }