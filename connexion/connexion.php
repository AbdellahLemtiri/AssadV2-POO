 <?php
 require_once "../OOP/utilisateur.php";

if (
    $_SERVER['REQUEST_METHOD'] === "POST" &&
    isset($_POST['email'], $_POST['password'])
) 
{
    
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $user= new Utilisateur();
    if (!$user->setEmail($email)) {
        header("Location: ../index.php?error=invalid_email");
        exit();
    }
    if (!$user->setMotPasse($password)) {
        header("Location: ../index.php?error=weak_password");
        exit();
    }
    if($user->seconnecter()==="guide"){
      header('location: ../22-guide/');
      exit();
    }
    if($user->seconnecter()==="admin"){
      header('location: ../11-admin/index.php');
      exit();
    }
    if($user->seconnecter()==="visiteur"){
      header('location: ../33-visiteur/');
      exit();
    }
    if($user->seconnecter()==="notApproved"){
      header('location: booking.php');
      exit();
    }
 
}  else{
      header('location : booking.php');
      exit();
    }