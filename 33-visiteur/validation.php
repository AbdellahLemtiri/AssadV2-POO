<?php


require_once "../Fonctionalite_php/connect.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (!isset($_SESSION['id'])) {
        header("Location: ../../login.php?error=Veuillez vous connecter");
        exit();
    }

    $id_visite = $_POST['id_visite'];
    $id_utilisateur = $_SESSION['id']; 
    $nb_personnes = $_POST['nb_personnes'];

    $sql_check = "SELECT v.capacite_max, 
                 (v.capacite_max - COALESCE(SUM(r.nb_personnes), 0)) AS places_restantes
                 FROM visites_guidees v
                 LEFT JOIN reservations r ON v.id = r.id_visite
                 WHERE v.id = ?
                 GROUP BY v.id";
    
    $stmt = $connect->prepare($sql_check);
    $stmt->bind_param("i", $id_visite);
    $stmt->execute();
    $result = $stmt->get_result();
    $visite = $result->fetch_assoc();

    if ($visite) {
        if ($nb_personnes > 0 && $nb_personnes <= $visite['places_restantes']) {
          
            $sql_insert = "INSERT INTO reservations (id_visite, id_utilisateur, nb_personnes) VALUES (?, ?, ?)";
            $stmt_in = $connect->prepare($sql_insert);
            $stmt_in->bind_param("iii", $id_visite, $id_utilisateur, $nb_personnes);
            
            if ($stmt_in->execute()) {
                
                header("Location: reservation.php?success=Réservation confirmée !");
                exit();
            } else {
                header("Location: reservation.php?error=Erreur lors de l'enregistrement");
                exit();
            }
            
        } else {
            header("Location: reservation.php?error=Places insuffisantes");
            exit();
        }
    } else {
        header("Location: reservation.php?error=Visite introuvable");
        exit();
    }

} else {
    header("Location: ../reservation.php");
    exit();
}