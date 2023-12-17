<?php
require_once("controllers/ProduitAcheterController.php");
require_once("manager/dbManager.php");



$dbManager = DBManager::getInstance();
$controller = new ProduitAcheterController($dbManager->getDBConnection());

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $id = $_POST['id'];
    $data = $_POST['produitId'];


    echo json_encode($controller->addProduitAcheter($id, $data));
    
   
}
?>