<?php

namespace Models;

class Cinema extends AbstractModel
{

    protected string $nomDeLaTable = "cinemas";

    protected $id;
    protected $nom;
    protected $adresse;
    protected $ville;



    public function getId()
    {
        return $this->id ;
    }
    
    public function getNom()
    {
        return $this->nom ;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getAdresse()
    {
        return $this->adresse ;
    }

    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }
   
    public function getVille()
    {
        return $this->ville ;
    }

    public function setVille($ville){
        $this->ville = $ville;
    }


    public function save(Cinema $cinema)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
                (nom, adresse, ville) VALUES (:nom, :adresse, :ville)
        ");
        $sql->execute([
            "nom"=>$cinema->nom ,
            "adresse"=>$cinema->adresse ,
            "ville"=>$cinema->ville,
        ]);


    }

}