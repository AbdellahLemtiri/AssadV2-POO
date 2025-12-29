<?php
require_once "connect.php";
if (isset($_POST['update_visite'],$_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $prix = $_POST['prix'];
    $date_heure = $_POST['date_heure'];
    $duree = $_POST['duree'];
    $capacite_max = $_POST['capacite_max'];
    $statuts = $_POST['statut'];
    $sql = "UPDATE `visites_guidees` SET `titre`='$titre',`date_heure`='$date_heure ',`capacite_max`='$capacite_max',`duree`=' $duree',`statut`= '$statuts',`prix`='$prix' WHERE id = $id ";
   $res = $connect->query($sql);
   if($res){
              header("Location: ../index.php");
     exit(1);
   }
}
else {
    header('location : ../index.php?erreur!!');
     exit(1);
}
if (isset($_POST['update_visite'], $_POST['id'])) {
    $id = $_POST['id'];


    mysqli_begin_transaction($connect);
    try {
       
        $sql = "UPDATE `visites_guidees` SET `titre`=?, `date_heure`=?, `capacite_max`=?, `duree`=?, `statut`=?, `prix`=? WHERE id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssiisdi", $titre, $date_heure, $capacite_max, $duree, $statuts, $prix, $id);
        $stmt->execute();

       
        $connect->query("DELETE FROM etapes_visite WHERE id_visite = $id");
        
        if (isset($_POST['etape_titre'])) {
            $stmt_e = $connect->prepare("INSERT INTO etapes_visite (titre_etape, description_etape, ordre_etape, id_visite) VALUES (?, ?, ?, ?)");
            foreach ($_POST['etape_titre'] as $k => $t) {
                if (!empty($t)) {
                    $o = $k + 1;
                    $d = $_POST['etape_desc'][$k];
                    $stmt_e->bind_param("ssii", $t, $d, $o, $id);
                    $stmt_e->execute();
                }
            }
        }

        mysqli_commit($connect);
        header("Location: ../index.php?msg=updated");
    } catch (Exception $e) {
        mysqli_rollback($connect);
        header("Location: ../index.php?msg=error");
    }
}