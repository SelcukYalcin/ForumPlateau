<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategorieManager;
    use Model\Managers\UserManager;

    class ForumController extends AbstractController implements ControllerInterface
    {
        public function index()
        {           
            $topicManager = new TopicManager();
            return [
                "view" => VIEW_DIR."forum/listTopicsByIdCategorie.php",
                "data" => [
                    "topics" => $topicManager->findAll(["dateTopic", "DESC"]),
                ]
            ];
        }

        public function ajoutCategorie()
        {
            $categorieManager = new CategorieManager();
            $libelle = filter_input(INPUT_POST, "libelle", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if($libelle)
            {
                $newCategorie = ["libelle"=> $libelle];
                $categorieId = $categorieManager->add($newCategorie);
                $this->redirectTo("forum", "listCategories");
            }

        }
        public function listCategories()
        {          
            $categorieManager = new CategorieManager();
            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categorieManager->findAll(["libelle", "ASC"])
                ]
            ];       
        }

        public function listTopicsByIdCategorie($id)
        {
            $topicManager = new TopicManager();
            $categorieManager = new CategorieManager();
            $topics = $topicManager->getTopicsByIdCategiorie($id);
            $categorie = $categorieManager->findOneById($id);
            return [
                "view" => VIEW_DIR. "forum/listTopicsByIdCategorie.php",
                "data" => [
                    "topics" => $topics,
                    "categorie" => $categorie                       
                ]
            ];
        }
        
        public function listPostsByIdTopic($id)
        {
            $postManager =new PostManager();
            $topicManager = new TopicManager();
            $posts = $postManager->findPostsByIdTopic($id);
            $topic = $topicManager->findOneById($id);
            return [
                "view" => VIEW_DIR. "forum/listPostsByIdTopic.php",
                "data" => [
                    "posts" => $posts,
                    "topic" => $topic
                    ]
            ];
        }

        public function addTopic($id)
        {
            $topicManager = new TopicManager();
            $postManager = new PostManager();
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = $id=1;
            
            if($title && $texte)
            {
                $newTopic = ["title"=> $title, "user_id"=> $user, "categorie_id" => $id];                   
                $topicId = $topicManager->add($newTopic);  
                $newPost=["texte"=>$texte, "topic_id"=>$topicId , "user_id"=>$user];
                $postManager->add($newPost);  
                $this->redirectTo("forum", "listTopicsByIdCategorie", $id);
            } else{}                           
        }

        public function addPost($id)
        {
            $topicManager = new TopicManager();
            $postManager = new PostManager();
            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = \App\Session::getUser()->getId(); var_dump($user); die;

            if($texte)
            {
                $newPost= ["texte" => $texte, "user_id" => $user, "topic_id" => $id];
                $postManager ->add($newPost);
                $this->redirectTo("forum", "listPostsByIdTopic", $id);
            }
        } 
        
        public function editCategorie($id)
        {
            $categorieManager = new CategorieManager();          
            $libelle = filter_input(INPUT_POST, "libelle", FILTER_SANITIZE_SPECIAL_CHARS);
            if($libelle) 
            {
                $categorieManager->editCategorie($id, $libelle); 
                $this->redirectTo("forum","listCategories"); 
            }

            return [
                "view" => VIEW_DIR."forum/editionCategorie.php",
                "data" => ["categorie" => $categorieManager->findOneById($id)]
            ];
        }

        public function editTopic($id)
        {
            $topicManager = new TopicManager();
            $topic = $topicManager->findOneById($id);
 
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
             
            if($title)
            {
                 $topicManager->editTopic($id,$title);
                 $this->redirectTo("forum","listTopicsByIdCategorie",$topic->getCategorie()->getId());
            }
            return[
             "view" => VIEW_DIR."forum/editionTopic.php",
             "data" => ["topic" => $topicManager->findOneById($id)]
            ];
        }
        
}