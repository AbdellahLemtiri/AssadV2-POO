<?php
require_once "connexion.php";
class utilisateur
{
    protected int $id_utilisateur;
    protected string $nom_utilisateur;
    protected string $email;
    protected string $mot_passe;

    public function setid($id){
      $this->id_utilisateur=$id;
    }
    pub
    public function seconnecter(): string
    {
        $cl = new Connexion();
        $conn = $cl->connect();
        $sql = "SELECT  * FROM utilisateurs  WHERE email = :email";

        try {
            $stmt = $conn->prepare($sql);
        } 
        
        catch (Exception $e) {
            return "erreur sur sql";
        }

        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $hashedPassword = $user['motpasse_hash'];
            if ($user["Approuver_utilisateur"]) {
                if (password_verify($this->mot_passe, $hashedPassword)) {
                    $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
                    $_SESSION['nom_utilisateur'] = $user['nom_utilisateur'];
                    $_SESSION['role_utilisateur'] = $user['role'];
                    return $user["role"];
                } else {
                    return "mot pass invalid";
                }
            } 
            else {
                return "l'utilisateur non approuve";
            }
        } 
        else {
            return "email n'exist pas ";
        }
    }
}
