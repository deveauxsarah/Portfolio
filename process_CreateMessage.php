<?php


require __DIR__."/config/autoload.php";
require __DIR__."/config/pdo.php";

$userManager = new UsersManager($pdo);
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['e_mail']) && isset($_POST['message']) && isset($_POST['sujet']) ){

    $user = new Users([
        'nom'=> $_POST['nom'], 
        'prenom' => $_POST['prenom'],
        'e_mail'=> $_POST['e_mail'],
        'message'=> $_POST['message'],
        'sujet' => $_POST['sujet']
    ]);
    

    $today = date("F j, Y, g:i a");
    $userManager->createMessage($user);
    $to = 'julienmartin42120@gmail.com';
    $subject = $_POST['sujet'];
    $message = "     <html>
    <head>
    </head>
    <body>
        <h2 class='card-title'>".$_POST['prenom']." ". $_POST['nom']."</h2>
        <h3 class='card-title'>".$_POST['sujet']."</h3>
        <p class='card-text'>".$_POST['message']."</p>
        <p class='card-text'><small class='text-muted'>".$today."</small></p>
        <img src='http://jm-portfoliodev-web.projets.simplon-roanne.com/images/output-onlinegiftools.gif' class='card-img-top' alt='...'>
    </body>
   </html>";
    // $message = wordwrap($message, 240, "\r\n");
    $headers = [
        'Content-Type'=> 'text/html; charset=utf-8',
        'From' => $_POST['e_mail']
    ];
    

    mail ($to , $subject , $message, $headers);

    header('Location:../index.php?message=Merci de ton message '.$_POST['prenom']." ".$_POST['nom']);
}