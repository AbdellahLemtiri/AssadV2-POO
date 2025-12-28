require_once "../../OOP/animaux.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    
    $id_animal    = (int)$_POST['animal_id'];
    $nom          =    ($_POST['nom']);
    $espece       =    ($_POST['espece']);
    $image        =    ($_POST['image']);
    $alimentation =    ($_POST['alimentation']);
    $id_habitat   = (int)$_POST['id_habitat'];
    $desc        = $_POST['description_courte'];
    $pays = ($_POST['pays_origine']);
    $obj = new Animal();
    $obj->setIdAnimal($id_animal);
    $obj->setNomAnimal($nom);
    $obj->setDescriptionAnimal($desc);
    $obj->setEspeceAnimal($espece);
    $obj->setImageUrl($image);
    $obj->setTypeAlimentation($alimentation);
    $obj->setIdHabitat($id_habitat);
    $obj->setPaysOrigine($pays);
 if($obj->modifierAnimal($id_animal)) {
        header("Location: ../admin_animaux.php?msg=success");
     exit();   
    } else {
         header("Location: ../admin_animaux.php?msg=Erreur");
     exit();  
    
    }
}