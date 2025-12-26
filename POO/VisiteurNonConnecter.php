<?php
require_once "utilisateur.php";

class VisiteurNonConnecter extends utilisateur 
{
    public function inscirire() : bool
    {
        $obj = new Connexion();
        $conn = $obj->connect();

        if($this->getRoleUtilisateur() === "guide")
        {
    
            $sql = "INSERT INTO `utilisateurs`(`nom_utilisateur`,`email`,`role`,`motpasse_hash`,`Approuver_utilisateur`) 
                    VALUES (:nom, :email, 'guide', :motPase, 0)";
        }
        elseif($this->getRoleUtilisateur() === "visiteur")
        {
           
            $sql = "INSERT INTO `utilisateurs`(`nom_utilisateur`,`email`,`role`,`motpasse_hash`) 
                    VALUES (:nom, :email, 'visiteur', :motPase)";
        }
        else 
        {
            return false;
        }

        try 
        {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $this->nom_utilisateur);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindValue(':motPase', password_hash($this->mot_passe, PASSWORD_BCRYPT));

            return $stmt->execute();
        } 
        catch (Exception $e) 
        {
            return false;
        }
    }
}