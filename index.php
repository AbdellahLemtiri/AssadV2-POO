<?php
require_once "POO/utilisateur.php";

$user = new Utilisateur();

$user->setEmail("admin@admin.com");
$user->setMotPasse("admin");
$user->setIdUtilisateur(1);
$user->setNomUtilisateur("administrateur");
echo $user->__toString();
echo $user->seconnecter();