<?php
require_once "../../Fonctionalite_php/connect.php";

$sql = "SELECT * FROM habitats";
$res = $connect->query($sql);
$habitats = [];
if ($res) {
    $habitats = $res->fetch_all(MYSQLI_ASSOC);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $espece = $_POST['espece'];
    $alimentation = $_POST['alimentation'];
    $image = $_POST['image']; 
    $pays_origine = $_POST['pays_origine'];
    $description_courte = $_POST['description_courte'];
    $id_habitat = $_POST['id_habitat'];

    $sql2 = "INSERT INTO `animaux`(`nom`, `espece`, `alimentation`, `image`, `pays_origine`, `description_courte`, `id_habitat`) 
             VALUES ('$nom', '$espece', '$alimentation', '$image', '$pays_origine', '$description_courte', '$id_habitat')";

    if ($connect->query($sql2) === TRUE) {
        echo "<script>alert('Animal ajouté avec succès');</script>";
    } 
    else {
        echo "<script>alert('Erreur lors de l\'ajout de l\'animal');</script>";
    }

    header("Location: ../admin_animaux.php");
    exit;
}
?>