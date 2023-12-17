<?php
require_once("controllers/UserController.php");
require_once("manager/dbManager.php");

$dbManager = DBManager::getInstance();
$controller = new UserController($dbManager->getDBConnection());

header("Access-Control-Allow-Origin: *");



if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $data = [
        "nom" => $nom,
        "courriel"=> $email,
        "mdp"=> $password,
        "permission" => 0
    ];

    $controller->createUser($data);
   
}

?>
