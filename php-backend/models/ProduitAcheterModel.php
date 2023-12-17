<?php

class ProduitAcheterModel{
    private $pdo;
    public function __construct($pdo) {
    $this->pdo = $pdo;
    }
   
    public function addProduitAcheter($id,$produitId) {
        $stmt = $this->pdo->prepare("INSERT INTO produitacheter (id,produitId) VALUES (?,?)");
        return $stmt->execute([$id,$produitId]);
        }

        public function getUserProduitAcheterById($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM produitacheter WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
            }
}

?>