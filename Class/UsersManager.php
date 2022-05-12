<?php

class UsersManager{

    private $bdd;

    public function __construct($db){
        $this->setDb($db);
    }


    public function setDb(PDO $db){
        $this->bdd = $db;
    }

    public function createMessage(Users $user){
        $insertMessage = $this->bdd->prepare('INSERT INTO Users (nom, prenom, e_mail, sujet, message) 
        VALUES(:nom, :prenom, :e_mail, :sujet, :message)');
        
        $insertMessage->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        $insertMessage->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
        $insertMessage->bindValue(':e_mail', $user->getE_mail(), PDO::PARAM_INT);
        $insertMessage->bindValue(':sujet', $user->getSujet(), PDO::PARAM_INT);
        $insertMessage->bindValue(':message', $user->getMessage(), PDO::PARAM_INT);

        $insertMessage->execute();

    }
}