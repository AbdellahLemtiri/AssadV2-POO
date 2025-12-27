<?php
require_once "../../OOP/animaux.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    
    $id_animal    = (int)$_POST['animal_id'];
    $nom          = htmlspecialchars($_POST['nom']);
    $espece       = htmlspecialchars($_POST['espece']);
    $image        = htmlspecialchars($_POST['image']);
    $alimentation = htmlspecialchars($_POST['alimentation']);
    $id_habitat   = (int)$_POST['id_habitat'];
 
    $obj = new Animal();
    $obj->setIdAnimal($id_animal);
    $obj->setNomHabitat($nom);
    $obj->set
}