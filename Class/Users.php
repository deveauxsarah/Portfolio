<?php

class Users {
    private $id;
    private $nom;
    private $prenom;
    private $e_mail;
    private $message;
    private $sujet;
    


    public function __construct($arrayTo){
        $this->hydrate($arrayTo);
    }
    
    public function hydrate($donnees){
        foreach ($donnees as $key => $value)
        {
          $method = 'set'.ucfirst($key);
          
          if (method_exists($this, $method))
          {
            $this->$method($value);
          }
        }
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    
    public function getE_mail(){
        return $this->e_mail;
    }

    public function setE_mail($e_mail){
        $this->e_mail = $e_mail;
    }

    public function getSujet(){
        return $this->sujet;
    }

    public function setSujet($sujet){
        $this->sujet = $sujet;
    }

    public function getMessage(){
        return $this->message;
    }

    public function setMessage($message){
        $this->message = $message;
    }

}