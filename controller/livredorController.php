<?php
// chargement de configuration (pas de soucis si déjà appelé dans index.php car require_once)
require_once "../config.php";

// connexion à la DB
try{
    $db = new PDO(MY_DB_DRIVER.":host=".MY_DB_HOST.";dbname=".MY_DB_NAME.";charset=".MY_DB_CHARSET.";port=".MY_DB_PORT,MY_DB_LOGIN, MY_DB_PWD);
}catch(Exception $e){
    die($e->getMessage());
}

