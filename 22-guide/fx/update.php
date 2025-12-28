<?php
require_once "../../OOP/visite.php";
require_once "../../OOP/etape.php";

if (isset($_POST['update_visite'])) {
    $id_visite = (int)$_POST['id'];

    
    $visite = new Visite();
    $visite->setIdVisite($id_visite);
    $visite->setTitreVisite($_POST['titre']);
    $visite->setPrixVisite($_POST['prix']);
    $visite->setStatutVisite($_POST['statut']);
    $visite->setDateheureVisite($_POST['date_heure']);
    $visite->setCapaciteMaxVisite($_POST['capacite_max']);
    
    $visite->modifierVisite();
    $etapeManager = new Etape();
    
    $etapeManager->supprimerEtapesViste($id_visite);
    if (isset($_POST['etape_titre'])) {
        foreach ($_POST['etape_titre'] as $index => $titre) {
            if (!empty($titre)) {
                $newEtape = new Etape();
                $newEtape->setTitreEtape($titre);
                $newEtape->setDescriptionEtape($_POST['etape_desc'][$index]);
                $newEtape->setOrdreEtape($index + 1);
                $newEtape->setIdVisite($id_visite);
                
                $newEtape->ajouterEtape();
            }
        }
    }


    header("Location: ../index.php?success=1");
    exit();
}