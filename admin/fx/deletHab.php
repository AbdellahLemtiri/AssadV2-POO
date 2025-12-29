<?php
require_once "../../OOP/habitats.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if(isset($_GET["id"])){
        $id = (int) $_GET["id"];
    $obj = new habitat();
   $s = $obj->supprimer_habitat($id);
     if ($s) 
        {
        header("Location: ../admin_habitats.php?sup=success");
    } 
    else 
    {
        header("Location: ../admin_habitats.php?sup=error");
    }
    exit();
}
}