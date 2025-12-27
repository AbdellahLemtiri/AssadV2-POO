<?php

require_once 'Connexion.php';

class Animal
{
    private int $id_animal;
    private string $nom_animal;
    private string $espece_animal;
    private string $type_alimentation;
    private string $pays_origine;
    private string $description_animal;
    private string $image_url;
    private int $id_habitat;
    private string $nom_habitat ; 

    public function __construct() {}

  
    public function getIdAnimal(): int 
    { 
        return $this->id_animal; 
    }
    public function getNomAnimal(): string
     {
         return $this->nom_animal; 
        }
    public function getEspeceAnimal(): string 
    { 
        return $this->espece_animal;
     }
    public function getTypeAlimentation(): string 
    { 
    return $this->type_alimentation;
    }
    public function getPaysOrigine(): string 
    { 
        return $this->pays_origine; 
    }
    public function getDescriptionAnimal(): string 
    {
         return $this->description_animal;
    }
    public function getImageUrl(): string
    {
         return $this->image_url; 
    }
    public function getIdHabitat(): int 
    { 
        return $this->id_habitat;
    }
    public function getNomHabitat(): string 
    {
         return $this->nom_habitat ; 
    }
    public function setNomHabitat(string $nom): void 
    {
         $this->nom_habitat = $nom; 
    }

    public function setNomAnimal(string $nom_animal): bool 
    {
        $this->nom_animal = $nom_animal; return true; 
    }

    public function setEspeceAnimal(string $espece_animal): bool
    {
        $this->espece_animal = $espece_animal; return true;
    }

    public function setTypeAlimentation(string $type_alimentation): bool 
    {
        $this->type_alimentation = $type_alimentation; return true;
    }

    public function setPaysOrigine(string $pays_origine): bool 
    {
        $this->pays_origine = $pays_origine; return true;
    }

    public function setDescriptionAnimal(string $description_animal): bool 
    {
        $this->description_animal = $description_animal; return true;
    }

    public function setImageUrl(string $image_url): bool 
    {
        $this->image_url = $image_url; return true;
    }

    public function setIdHabitat(int $id_habitat): bool 
    {
        if ($id_habitat > 0) 
         {
                 $this->id_habitat = $id_habitat; return true; 
        }
        return false;
    }

    public function setIdAnimal(int $id_animal): bool 
    {
        if ($id_animal > 0) { $this->id_animal = $id_animal; return true; }
        return false;
    }

    public function modifier_animal(): bool
    {
        $conn = (new Connexion())->connect();
        $sql = "UPDATE animaux SET nom_animal = :nom_animal, espece = :espece_animal, alimentation_animal = :type_alimentation, pays_origine = :pays_origine, description_animal = :description_animal, image_url = :image_url, id_habitat = :id_habitat WHERE id_animal = :id_animal";
        try
        {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_animal', $this->id_animal);
            $stmt->bindParam(':nom_animal', $this->nom_animal);
            $stmt->bindParam(":espece_animal", $this->espece_animal);
            $stmt->bindParam(":type_alimentation", $this->type_alimentation);
            $stmt->bindParam(":pays_origine", $this->pays_origine);
            $stmt->bindParam(":description_animal", $this->description_animal);
            $stmt->bindParam(":image_url", $this->image_url);
            $stmt->bindParam(":id_habitat", $this->id_habitat);

            return $stmt->execute();
        } 
        catch (Exception $e) {
            return false;
        }
    }
    
public function supprimerAnimal(int $id): bool
{
    $conn = (new Connexion())->connect();
    $sql  = "DELETE FROM animaux WHERE id_animal = :id";
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
       
        if ($stmt->execute()) {
          
            return true;
        }
        
        return false;
    } 
    catch (Exception $e) {
        return false;
    }
}
    static function getAnimaux(): array
    {
        $conn = (new Connexion())->connect();
        $sql = "SELECT a.*, h.nom_habitat FROM animaux a LEFT JOIN habitats h ON a.id_habitat = h.id_habitat";
        try 
        {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $animalList = [];
            foreach ($results as $row)
            {
                $animal = new self();
                $animal->setIdAnimal($row['id_animal']);
                $animal->setNomAnimal($row['nom_animal']);
                $animal->setEspeceAnimal($row['espece'] );
                $animal->setTypeAlimentation($row['alimentation_animal'] );
                $animal->setPaysOrigine($row['pays_origine'] ?? '');
                $animal->setDescriptionAnimal($row['description_animal']);
                $animal->setImageUrl($row['image_url'] );
                $animal->setIdHabitat($row['id_habitat']);
                $animal->setNomHabitat($row['nom_habitat']);
                $animalList[] = $animal;
            }
            return $animalList;
        }
        catch (Exception $e) 
        {
            return [];
        }
    }
}