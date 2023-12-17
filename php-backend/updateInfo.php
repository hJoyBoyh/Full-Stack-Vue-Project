<?php
require_once("controllers/UserController.php");
require_once("manager/dbManager.php");



$dbManager = DBManager::getInstance();
$controller = new UserController($dbManager->getDBConnection());

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    if (isset($_POST['updateNom'])) {
        
        $nom = $_POST['nom'];

        $data = [
            "nom" => $nom,
        ];

        echo json_encode($controller->updateUserNom($id, $data));
        
    }
    if (isset($_POST['updateEmail'])) {
       
        $email = $_POST['courriel'];
        $data = [
            "courriel" => $email,
        ];
        
        echo json_encode($controller->updateUserEmail($id, $data));
    }
    if (isset($_POST['updatePassword'])) {
        
        $mdp= $_POST['mdp'];
        $data = [
            "mdp" => $mdp,
        ];
        
        echo json_encode($controller->updateUserPassword($id, $data));
    }
   
}
?>