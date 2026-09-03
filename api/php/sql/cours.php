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

function GetCoursById(int $id) : array
{
        $param = [
        ":id" => $id
    ];
    $statement = db()->prepare(
        "SELECT * FROM `cours`
        WHERE :id = id"
    );
    $statement->execute();
    return $statement->fetchAll();
}