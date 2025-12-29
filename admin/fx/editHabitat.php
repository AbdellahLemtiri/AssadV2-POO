<?php
require_once "../../OOP/habitats.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id     = (int)$_POST['id'];
    $nom    = htmlspecialchars($_POST['nom']);
    $climat = htmlspecialchars($_POST['type_climat']);
    $zone   = htmlspecialchars($_POST['zone_zoo']);
    $desc   = htmlspecialchars($_POST['description']);

        $obj = new Habitat();
        $obj->setDescriptionHabitat($desc);
        $obj->setNomHabitat($nom);
        $obj->setTypeClimat($climat);
        $obj->setZoneZoo($zone);
        $obj->setIdHabitat($id);
        $s =$obj->modifierHabitat();
        

        if ($s) {
            header("Location: ../admin_habitats.php?edit=success");
        } else {
            header("Location: ../admin_habitats.php?edit=error");
            
        }
 
    exit();
}