<?php
require_once('./controllers/UserController.php');
require_once('./controllers/ProduitController.php');
require_once('./controllers/ProduitAcheterController.php');
require_once(dirname(__FILE__) . "/manager/dbManager.php");

$dbManager = DBManager::getInstance();

$userController = new UserController($dbManager->getDBConnection());
$produitController = new ProduitController($dbManager->getDBConnection());
$produitAcheterController = new ProduitAcheterController($dbManager->getDBConnection());

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

header("Access-Control-Allow-Origin: *");


    //user api-----------------------------------------------------
$action = '';

if (isset($_GET['action'])){
    $action = $_GET['action'];
}

if($action === "produit"){

header("Content-Type: application/json");
$produits = $produitController->getAllProduit();
echo json_encode($produits);
}
if($action === "produit-chemise"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByType('Chemises');
    echo json_encode($produits);
    }
if($action === "produit-cravate"){

        header("Content-Type: application/json");
        $produits = $produitController->getProduitByType('Cravates');
    echo json_encode($produits);
 }
 if($action === "produit-asc"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitSortByPrixASC();
    echo json_encode($produits);
}
if($action === "produit-desc"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitSortByPrixDESC();
    echo json_encode($produits);
}
if($action === "produit-rose"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByCouleur('Rose');
    echo json_encode($produits);
}
if($action === "produit-violet"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByCouleur('Violet');
    echo json_encode($produits);
}
if($action === "produit-vert"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByCouleur('Vert');
    echo json_encode($produits);
}
if($action === "produit-blanc"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByCouleur('Blanc');
    echo json_encode($produits);
}

if($action === "produit-unique"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByTaille('1');

    echo json_encode($produits);
}
if($action === "produit-quarantequatre"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByTaille('44');

    echo json_encode($produits);
}
if($action === "produit-quarantehuit"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByTaille('48');

    echo json_encode($produits);
}
if($action === "produit-cinquantequatre"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByTaille('54');

    echo json_encode($produits);
} 
if($action === "produit-cinquantesix"){

    header("Content-Type: application/json");
    $produits = $produitController->getProduitByTaille('56');

    echo json_encode($produits);
} 

// by id produit
if (preg_match('/produit-id[1-9]+/',$action)){
    


    header("Content-Type: application/json");
    $uriParts = explode('/', $action);
    $id = substr($uriParts[0],-1);

    $produits = $produitController->getProduitById($id);
    
    echo json_encode($produits);
}

// produit acheter par le user id
if (preg_match('/produitacheter-id[1-9]+/',$action)){
    


    header("Content-Type: application/json");
    $uriParts = explode('/', $action);
    $id = substr($uriParts[0],-1);
    
    $produitsAcheter = $produitAcheterController->getUserProduitAcheterById($id);
    
    echo json_encode($produitsAcheter);
}
 
?>