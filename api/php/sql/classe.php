<?php
require_once "./php/db/database.php";
function GetAllClasse(): array
{
    $statement = db()->prepare(
        "SELECT * FROM `classes`"
    );
    $statement->execute();
    return $statement->fetchAll();
}

function GetClasseByName(string $nom)
{
    $params = [
        ":nom" => $nom
    ];
    $statement = db()->prepare(
        "SELECT * FROM `classes`
        WHERE nom = :nom"
    );
    $statement->execute($params);
    return $statement->fetch();
}
