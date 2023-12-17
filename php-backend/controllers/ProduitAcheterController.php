<?php

require_once(__DIR__ . "/../models/ProduitAcheterModel.php");
class ProduitAcheterController{
private $model;
public function __construct($pdo)
{
    $this->model = new ProduitAcheterModel($pdo);
}


public function addProduitAcheter($id,$data) {
   
    return $this->model->addProduitAcheter($id,$data);
}
public function getUserProduitAcheterById($id) {
    return $this->model->getUserProduitAcheterById($id);
}
}
?>