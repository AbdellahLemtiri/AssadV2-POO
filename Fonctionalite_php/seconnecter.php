<?php
require_once "../OOP/utilisateur.php";

$user = new Utilisateur();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = isset($_POST["email"]) ? strtolower(trim($_POST["email"])) : '';
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';

    if (!empty($email) && !empty($password)) {
        if(!$user->setEmail($email)){
        header("Location: ../index.php?error=email est invalide !");
        exit();
        } 
      if(!$user->setMotPasse($password)){
        header("Location: ../index.php?error=Mot pase est invalide !");
        exit();
      } 
   $msj= $user->seconnecter(); 
        header("Location: ../index.php?error=$msj");
        exit();
    }
}
else{
        header("Location: ../index.php?error=40404!");
        exit();
}
    