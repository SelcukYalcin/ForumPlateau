<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategorieManager;
    use Model\Managers\UserManager;

    class SecurityController extends AbstractController implements ControllerInterface{

        public function index(){        
        }
        // CREATION DE LA FONCTION INSCRIPTION---------->
        public function register()
        {
             // SI LA SUPERGLOBALE "$_POST" CONTIENT DES INFORMATIONS ALORS ON LES FILTRE---------->
            if(isset($_POST['subRegister'])) {
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $nickname = filter_input(INPUT_POST, "nickname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = $_POST["password"];
                $confirmPassword = $_POST["confirmPassword"];
                // SI LES FILTRES SONT VALIDES---------->
                if ($email && $nickname && $password && $confirmPassword) {
                    // RELIE A LA CLASSE USER_MANAGER---------->
                    $userManager = new UserManager();
                    // SI L'EMAIL (! = N'EXISTE PAS )---------->
                    if (!$userManager->findOneByEmail($email)) {
                        // SI LE NICKNAME (! = N'EXISTE PAS )---------->
                        if(!$userManager->findOneByUser($nickname)) {
                            // SI LES 2 PASSWORDS SONT IDENTIQUES( == ) ET QU'IL CONTIENT AU MINIMUM 6 CARACTERES---------->
                            if (($password == $confirmPassword) and strlen($password) >= 6){
                                // ON HASH LE PASSWORD---------->
                                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                                // ON AJOUTE L'USER EN BASE DE DONNEES VIA ADD---------->
                                $userManager->add(["email" => $email, "nickname" => $nickname, "password" => $passwordHash]);
                                Session::addFlash("success", "VOUS ETES ENREGISTRE");
                                // REDIRECTION VERS LOGIN (FORMULAIRE DE CONNEXION)---------->
                                // $this->redirectTo("security", "login");
                                return ["view" => VIEW_DIR."./security/login.php"];
                            } else Session::addFlash("error", "LES MOTS DE PASSES NE SE CORRESPONDENT PAS");                           
                        } else Session::addFlash("error", "CE PSEUDO EST DEJA UTLISE");
                    } else Session::addFlash("error", "CET EMAIL EST DEJA UTLISE");
                }
                $this->redirectTo("home");
            }
            return ["view" => VIEW_DIR . "/security/register.php"];
        }

        // CREATION DE LA FONCTION SE CONNECTER---------->
        public function login()
        {
            // RELIE A LA CLASSE USER_MANAGER---------->
            $userManager = new UserManager();
            // SI LA SUPERGLOBALE "$_POST" CONTIENT DES INFORMATIONS ALORS ON LES FILTRE---------->
            if(isset($_POST['subLogin'])){
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $password = $_POST["password"];                
                // SI LES FILTRES SONT VALIDES
                if ($email && $password)
                {
                    // RECUPERER LE PASSWORD DE L'USER CORRESPONDANT A L'EMAIL VIA LA METHODE (REQUETE) RETRIEVE_PASSWORD DANS USER_MANAGER---------->
                    $newPassword = $userManager->retrievePassword($email);
                    // SI LE MOT DE PASSE EST RECUPERE
                    if($newPassword)
                    {
                        // RECUPERATION DU MOT DE PASSE HACHE---------->
                        $passwordHash = $newPassword->getPassword();
                        // RETROUVER L'UTILISATEUR PAR SON EMAIL 
                        $user = $userManager->findOneByEmail($email);
                       
                        // VERIFICATION DU PASSWORD PAR RAPPORT AU PASSWORD HACHE---------->
                        if (password_verify($password, $passwordHash)){
                            // PLACER L'UTILISATEUR EN SESSION---------->
                            Session::setUser($user);
                            $this->redirectTo("home");
                        }   
                    }
                }
            }
            return ["view" => VIEW_DIR . "security/login.php"];       
        }
        // CREATION DE LA FONCTION DECONNEXION
        public function logout() 
        {       
            if (isset($_SESSION['user'])) 
            {
            $_SESSION['user'] = null ;
            Session::addFlash('success', 'DECONNEXION EFFECTUE');
            return ["view" => VIEW_DIR . "home.php"];
            }
        }
    }