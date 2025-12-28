 <?php
 require_once "../OOP/VisiteurNonConnecter.php";
 echo 'helo';
if (
    $_SERVER['REQUEST_METHOD'] === "POST" &&
    isset($_POST['nom'], $_POST['role'], $_POST['email'], $_POST['password'])
) {
    $fullName = trim($_POST['nom']);
    $role = $_POST['role'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];
 $user= new VisiteurNonConnecter();
    if (!$user->setNomUtilisateur($fullName)) {
        header("Location: ../index.php?error=invalid_name");
        exit();
    }
    if (!$user->setEmail($email)) {
        header("Location: ../index.php?error=invalid_email");
        exit();
    }
    if (!$user->setMotPasse($password)) {
        header("Location: ../index.php?error=weak_password");
        exit();
    }
    if(!$user->setRoleUtilisateur($role)){
           header("Location: ../index.php?error=invalid_role");
        exit();
    }
    if(!$user->inscirire()){
          header("Location: ../index.php?error=invalid_role");
        exit();
    }
    else{
        echo "<script>alert ('inscription avec succces');</script>";
        header("Location:../index.php?error=succus");
        exit();
    }
 
     
    }

    else{
         header("Location: ../index.php?error=form");
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <script>alert ('inscription avec succces')</script>
    </body>
    </html>
