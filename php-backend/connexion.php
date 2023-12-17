<?php
session_start();

require_once("controllers/LoginController.php");
require_once("manager/dbManager.php");


$dbManager = DBManager::getInstance();
$controller = new LoginController($dbManager->getDBConnection());

header("Access-Control-Allow-Origin: *");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if(isset($_POST['email']) && isset($_POST['password'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        echo implode(" ",$controller->login($email, $password));
        
}
}

/*
if (isset($_SESSION["authentifie"]) && $_SESSION['authentifie'] === true) {
    header("location: accueil.php");
   exit;
}
*/


?>
