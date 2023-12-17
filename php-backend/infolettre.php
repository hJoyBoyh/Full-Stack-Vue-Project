<?php


require_once("controllers/InfolettreController.php");
require_once("manager/dbManager.php");


$dbManager = DBManager::getInstance();
$controller = new InfolettreController($dbManager->getDBConnection());
header("Access-Control-Allow-Origin: *");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $data = [
            "courriel" => $email,
        ];
        
        $controller->addEmail($data);
    }
}
?>