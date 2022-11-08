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
          
            $topicManager = new TopicManager();

                return [
                    "view" => VIEW_DIR."forum/listTopics.php",
                    "data" => [
                        "topics" => $topicManager->findTopicByCategorieID(["dateTopic", "DESC"])
                    ]
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
                        "topics" => $topicManager->findTopicByCategorieID($id)
                        
                    ]
                ];
        }
        
        

        public function listPosts($id){

            $postManager =new PostManager();
            $topicManager = new TopicManager();

                return [
                    "view" => VIEW_DIR. "forum/listPosts.php",
                    "data" => [
                        "posts" => $postManager->findPostsByTopicID($id, "datePost", "ASC")
                    ]

                ];

        }
    }