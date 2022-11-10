<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategorieManager;

    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
            
           
            return [
                "view" => VIEW_DIR."home.php"
            ];
        }

        public function listCategories(){
          
            $categorieManager = new CategorieManager();

                return [
                    "view" => VIEW_DIR."forum/listCategories.php",
                    "data" => [
                        "categories" => $categorieManager->findAll(["libelle", "ASC"])
                    ]
                ];
        
        }
        public function listTopics($id){
            $topicManager = new TopicManager();
            $categorieManager = new CategorieManager();

            

                return [
                    "view" => VIEW_DIR. "forum/listTopics.php",
                    "data" => [
                        "topics" => $topicManager->findTopicByCategorieID($id),
                        "categorie" => $categorieManager->findOneById($id),
                        
                    ]
                ];
        }
        
        

        public function listPosts($id){

            $postManager =new PostManager();
            $topicManager = new TopicManager();

            

                return [
                    "view" => VIEW_DIR. "forum/listPosts.php",
                    "data" => [
                        "posts" => $postManager->findPostsByTopicID($id, "datePost", "ASC"),
                        "topic" => $topicManager->findOneById($id),
                        ]

                ];

        }

        public function addTopic($id){

            $topicManager = new TopicManager();
            $postManager = new PostManager();

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = 1;
            
            if($title && $texte){

                $newTopic= ["title"=> $title, "user_id"=> $user, "categorie_id" => $id];
                $id_topic = $topicManager ->add($newTopic);

                $postManager->add(["topic_id" => $id_topic, "user_id" => $user, "texte" => $texte]);

                $this->redirectTo("forum", "listTopics", $id);
                
            }

        }

        public function addPost($id){

            $topicManager = new TopicManager();
            $postManager = new PostManager();

            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = 1;
            if($texte){

                $newPost= ["texte" => $texte, "user_id" => $user, "topic_id" => $id, ];
                $id_post = $postManager ->add($newPost);

                $this->redirectTo("forum", "listPosts", $id);
            }
        }
                


    
}