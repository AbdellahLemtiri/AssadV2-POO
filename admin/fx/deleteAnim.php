<?php
require_once "../../OOP/animaux.php";
if($_SERVER['REQUEST_METHOD']==='GET'){
if(isset($_GET['id'])&& !empty($_GET['id'])){
  $id =(int) $_GET['id'];
  $obj = new Animal();
 if($obj->supprimerAnimal($id)){
         header("Location: ../admin_animaux.php?sup=success");
     exit();   
    } else {
         header("Location: ../admin_animaux.php?sup=Erreur");
     exit();  
    
    }
}}