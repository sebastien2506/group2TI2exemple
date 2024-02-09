<?php
// chargement de configuration (pas de soucis si déjà appelé dans index.php car require_once)
require_once "../config.php";
require_once "../model/commentsModel.php";

// connexion à la DB
try{
    // création d'une instance de PDO - Connexion à la base de données
    $db = new PDO(MY_DB_DRIVER.":host=".MY_DB_HOST.";dbname=".MY_DB_NAME.";charset=".MY_DB_CHARSET.";port=".MY_DB_PORT,MY_DB_LOGIN, MY_DB_PWD);
}catch(Exception $e){
    die($e->getMessage());
}

// si le formulaire a été soumis
if(isset($_POST['nom'], $_POST['courriel'], $_POST['titre'], $_POST['texte'])){

    // on appelle la fonction setComments
    $insert = addComments($db, $_POST['nom'], $_POST['courriel'], $_POST['titre'], $_POST['texte']);
    // si l'insertion a réussi
    if($insert){
        // on redirige vers la page d'accueil
        header("Location: ./");
        exit();
    }else{
        // sinon on affiche un message d'erreur
        $message = "Erreur lors de l'insertion";
    }
}

// fermeture de la connexion
$db = null;