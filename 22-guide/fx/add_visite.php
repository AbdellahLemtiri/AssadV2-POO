<?php

require_once "../../OOP/visite.php";
require_once "../../OOP/Etape.php";

if (isset($_POST['ajouter_visite'])) {
    $visite = new Visite();
    $date = $_POST['date_heure'];
    $visite->setTitreVisite($_POST['titre']);
    $visite->setLangueVisite($_POST['langue']);
    $visite->setPrixVisite((float)$_POST['prix']);
    $visite->setCapaciteMaxVisite((int)$_POST['capacite_max']);
    $visite->setStatutVisite(1);
    $visite->setIdGuide((int)$_SESSION['id_utilisateur']);
    $visite->setDateheureVisite ($date);
 
    $new_id = $visite->ajouterVisite(); 

    if ($new_id && isset($_POST['etape_titre'])) {
        foreach ($_POST['etape_titre'] as $i => $titre) {
            if (!empty($titre)) {
                $e = new Etape();
                $e->setTitreEtape($titre);
                $e->setDescriptionEtape($_POST['etape_desc'][$i]);
                $e->setOrdreEtape($i + 1);
                $e->setIdVisite($new_id);
                $e->ajouterEtape();
            }
        }
    }
    header("Location: ../index.php?msg=success");
    exit();
}