<?php
require_once "../OOP/utilisateur.php";
require_once  "../connexion/authinification.php";
checkRole("visiteur");
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];
require_once '../OOP/commentaire.php';
if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_visite = (int)$_POST['id_visite'];
    $note = (int)$_POST['note'];
    $contenu = $_POST['commentaire'];
    $id_visiteur = $_SESSION['id_utilisateur'];
    $ncom = new Commentaire();
    $ncom->setIdVisite($id_visite);
    $ncom->setIdVisiteur($id_visiteur);
    $ncom->setNote($note);
    $ncom->setContenuCommentaire($contenu);
    $reflection = new ReflectionClass('Commentaire');
    $inf = $reflection->getProperty('date_commentaire');
    $inf->setValue($ncom, new DateTime());
    if ($ncom->ajouterCommentaire()) {
        header("Location: reservation.php?success=bien envie");
    } else {
        header("Location: reservation.php?error=errour d'envoiee");
    }
}
?>