<?php

require_once '../OOP/reservation.php';
require_once "../OOP/utilisateur.php";
require_once  "../connexion/authinification.php";
checkRole("visiteur");
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_visite = (int)$_POST['id_visite'];
    $nb_personnes = (int)$_POST['nb_personnes'];
    $id_visiteur = $_SESSION['id_utilisateur'];
    $nvres = new Reservation();
    $nvres->setIdVisite($id_visite);
    $nvres->setIdVisiteur($id_visiteur);
    $nvres->setNombrePersonnes($nb_personnes);
    if ($nvres->reserver()) {
        header("Location: reservation.php?success=booked");
        exit();
    } else {
        header("Location: reservation.php?error=failed");
        exit();
    }
}

?>