<?php

require_once 'Connexion.php';
class Utilisateur
{
    protected int $id_utilisateur;
    protected string $nom_utilisateur;
    protected string $email;
    protected string $mot_passe;
    protected string $role;


    public function __construct() {}

    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }
    public function getNomUtilisateur()
    {
        return $this->nom_utilisateur;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMotPasse()
    {
        return $this->mot_passe;
    }
    public  function getRoleUtilisateur()
    {
        return $this->role;
    }
    public function setRoleUtilisateur(string $role)
    {
        if ($role == "visiteur") {
            $this->role = $role;
            return true;
        } elseif ($role == "guide") {
            $this->role = $role;
            return true;
        } 
        return false;
    }
    public function  setIdUtilisateur($id_utilisateur): bool
    {
        if (is_int($id_utilisateur) && $id_utilisateur > 0) {
            $this->id_utilisateur = $id_utilisateur;
            return true;
        }
        return false;
    }
    public function setNomUtilisateur($nom_utilisateur): bool
    {
        $regex = "/^[a-zA-ZÀ-ÿ\s'-]{5,50}$/";
        if (preg_match($regex, $nom_utilisateur)) {
            $this->nom_utilisateur = $nom_utilisateur;
            return true;
        }
        return false;
    }
  public function setEmail($email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->email = $email;
        return true;
    }
    return false;
}
    public function setMotPasse($mot_passe): bool
    {
        if(filter_var($mot_passe, FILTER_VALIDATE_EMAIL)){
            $this->mot_passe = $mot_passe;
            return true;
        }
        return false;
    }
    public function __toString()
    {
        return " id_utilisateur :" . $this->id_utilisateur . " nom_utilisateur :" . $this->nom_utilisateur . " email :" . $this->email .  " mot_passe :" . $this->mot_passe;
    }
    public function seconnecter(): string
    {
        $conn = (new Connexion())->connect();
        $sql = "SELECT  * FROM utilisateurs  WHERE email = :email";

        try {
            $stmt = $conn->prepare($sql);
        } 
        catch (Exception $e) {
            return "erreurSQL";
        }
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) 
        {
            $hashedPassword = $user['motpasse_hash'];
            if ($user["Approuver_utilisateur"]&&$user['statut_utilisateur']) {
                if (password_verify($this->mot_passe, $hashedPassword)) 
                    {
                    $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
                    $_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];
                    $_SESSION['role_utilisateur'] = $user['role'];
                    return $user["role"];
                    } 
                    else 
                    {
                        return "passwordInvalid";
                    }
            }
            else
            {
                return "notApproved";
            }
        
        } else {
            return "userNotFound";
        }
    }
    public function deconnecter(): void
    {
        session_unset();
        session_destroy();
    }

    
}

// $user = new Utilisateur();

// $user->setEmail("admin@admin.com");
// $user->setMotPasse("admin");
// $user->setIdUtilisateur(1);
// $user->setNomUtilisateur("administrateur");
// $user->setPaysUtilisateur("Maroc");

// echo  $user;