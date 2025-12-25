<?php
require_once "utilisateur.php";
class VisiteurNonConnecter extends utilisateur 
{
    public function inscirire()
    {
    $obj= new Connexion();
    $conn= $obj->connect();
    if($this->getRoleUtilisateur() == "guide")
    {
        $sql = "INSERT INTO `utilisateurs`(`nom_utilisateur`,`email`,`role`,`motpasse_hash`,`Approuver_utilisateur`,`statut_utilisateur`) VALUES (:nom,:email,:role,:motpase,0,:status";
    }

    else
    {
        $sql = "INSERT INTO `utilisateurs`(`nom_utilisateur`,`email`,`role`,`motpasse_hash`,`Approuver_utilisateur`,`statut_utilisateur`) VALUES (:nom,:email,:role,:motpase,1,:status";
    }
    }
}
