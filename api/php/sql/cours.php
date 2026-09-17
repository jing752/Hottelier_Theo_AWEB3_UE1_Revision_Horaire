<?php
require_once "./php/db/database.php";
function GetAllCours(): array
{
    $statement = db()->prepare(
        "SELECT * FROM `cours`"
    );
    $statement->execute();
    return $statement->fetchAll();
}

function GetCoursByName(string $nom)
{
    $params = [
        ":nom" => $nom
    ];
    $statement = db()->prepare(
        "SELECT * FROM `cours`
        WHERE code = :nom"
    );
    $statement->execute($params);
    return $statement->fetch();
}