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

function GetAllCreneauByClasseName(string $name) : array
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