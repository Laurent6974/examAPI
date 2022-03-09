<?php
namespace Controllers;

class Cinema extends AbstractController
{

    protected $defaultModelName = \Models\Cinema::class ;

    public function index()
    {
        return $this->render("cinemas/index", [
            "pageTitle" => "accueil cinémas",
            "cinemas" => $this->defaultModel->findAll()
        ]);
    }

    public function show(){

        $id=null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){$id = $_GET['id'];}

        if(!$id){return $this->redirect(["type"=>"cinema",
                                            "action"=>"index"
        ]);}

        $cinema = $this->defaultModel->findById($id);
        if(!$cinema){return $this->redirect(["type"=>"cinema",
                                            "action"=>"index"
                                            ]);}

        return $this->render("cinemas/show", [
            "pageTitle"=> $cinema->getNom(),
            "cinema"=>$cinema,
           
        ]);
    }

    public function new()
    {
        $nom = null;
        $adresse = null;
        $ville = null;

        if(!empty($_POST['nom'])){$nom = htmlspecialchars( $_POST['nom']);}
        if(!empty($_POST['adresse'])){$adresse = htmlspecialchars( $_POST['adresse']);}      
        if(!empty($_POST['ville'])){$ville = htmlspecialchars( $_POST['ville']);}

        if($nom && $adresse && $ville){

                $cinema = new \Models\Cinema();
                
                $cinema->setnom($nom);
                $cinema->setadresse($adresse);
                $cinema->setville($ville);

                $this->defaultModel->save($cinema);

                return $this->redirect(["type"=>"cinema",
                "action"=>"index" ]);

        }

        return $this->render("cinemas/new", ["pageTitle"=> "Ajout cinema"]);
    }



    public function suppr(){

        $id = null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id = $_POST['id'];}
       
        if(!$id){return $this->redirect(["type"=>"cinema",
            "action"=>"index"
                ]);}

                $cinema = $this->defaultModel->findById($id);
                if($cinema){

                    $this->defaultModel->remove($cinema);

                }

                return $this->redirect(["type"=>"cinema",
                                        "action"=>"index"
                                            ]);


        
    }
}