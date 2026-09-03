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