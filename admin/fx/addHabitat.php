<?php
require_once "../../OOP/habitats.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom    = htmlspecialchars($_POST['nom']);
    $climat = htmlspecialchars($_POST['type_climat']);
    $zone   = htmlspecialchars($_POST['zone_zoo']);
    $desc   = htmlspecialchars($_POST['description']);

    $obj = new Habitat();
    $obj->setDescriptionHabitat($desc);
    $obj->setNomHabitat($nom);
    $obj->setZoneZoo($zone);
    $obj->setTypeClimat($climat);

   $s= $obj->ajouter_habitat();
   
    if ($s) 
        {
        header("Location: ../admin_habitats.php?add=success");
    } 
    else 
    {
        header("Location: ../admin_habitats.php?add=error");
    }
    exit();
}