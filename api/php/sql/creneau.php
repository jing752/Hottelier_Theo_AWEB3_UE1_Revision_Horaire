<?php
require_once "./php/db/database.php";
function GetAllCreneau(): array
{
    $statement = db()->prepare(
        "SELECT * FROM `creneaux`"
    );
    $statement->execute();
    return $statement->fetchAll();
}

function GetCreneauByClasseName(string $name): array
{
    $params = [
        ":name" => $name
    ];
    $statement = db()->prepare(
        'SELECT 
        creneaux.jour,
        creneaux.heure_debut,
        creneaux.heure_fin,
        cours.nom,
        classes.nom as Classe
        FROM `creneaux`
        INNER JOIN classes ON classes.id = creneaux.classe_id
        INNER JOIN cours ON cours.id = creneaux.cours_id 
        WHERE classes.nom = :name;'
    );
    $statement->execute($params);
    return $statement->fetchAll();
}

function AddCreneau(int $classe_id, int $cours_id, string $jour, string $heure_debut, string $heure_fin, string $salle)
{
    
    $params = [
        ":classe_id" => $classe_id,
        ":cours_id" => $cours_id,
        ":jour" => $jour,
        ":heure_debut" => $heure_debut,
        ":heure_fin" => $heure_fin,
        ":salle" => $salle
    ];

    $statement = db()->prepare(
        "INSERT INTO `creneaux` (`id`, `classe_id`, `cours_id`, `jour`, `heure_debut`, `heure_fin`, `salle`)
        VALUES (NULL, :classe_id, :cours_id, :jour, :heure_debut, :heure_fin, :salle);"
    );

    $statement->execute($params);
}

function GetCreneauById(int $id) : array|false
{
    $params = [
        ":id" => $id
    ];
    $statement = db()->prepare(
        'SELECT * FROM creneaux WHERE creneaux.id = :id'
    );
    $statement->execute($params);
    return $statement->fetchAll();
}

function DeleteCreneauById(int $id)
{
    $params = [
        ":id" => $id
    ];
    $statement = db()->prepare(
        'DELETE FROM creneaux WHERE creneaux.id = :id'
    );
    $statement->execute($params);
}

function updateCreneau(int $id, int $classe_id, int$cours_id, string $jour, string$heure_debut, string $heure_fin, string$salle)
{
    $params = [
        ":id" => $id,
        ":classe_id" => $classe_id,
        ":cours_id" => $cours_id,
        ":jour" => $jour,
        ":heure_debut" => $heure_debut,
        ":heure_fin" => $heure_fin,
        ":salle" => $salle
    ];

    $statement = db()->prepare(
        "UPDATE `creneaux` 
         SET `classe_id` = :classe_id, 
             `cours_id` = :cours_id, 
             `jour` = :jour, 
             `heure_debut` = :heure_debut, 
             `heure_fin` = :heure_fin, 
             `salle` = :salle 
         WHERE `id` = :id;"
    );

    $statement->execute($params);
}